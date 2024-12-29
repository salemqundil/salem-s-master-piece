<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $pageTitle = 'All Products';
    
        // إنشاء استعلام المنتجات
        $query = Product::with(['category', 'productImages'])->orderBy('id', 'desc');
    
        // تحقق من وجود category_id في الطلب
        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }
    
        // تنفيذ التصفية مع الترقيم
        $products = $query->paginate(getPaginate(20))->appends($request->all());
    
        // جلب الفئات
        $categories = Category::all();
    
        return view('admin.products.index', compact('products', 'pageTitle', 'categories'));
    }
    public function shope(Request $request)
    {
        $pageTitle = 'Shop';
        
        // إنشاء استعلام المنتجات
        $query = Product::with(['category', 'productImages'])->orderBy('id', 'desc');
    
        // تحقق من وجود category_id في الطلب
        if ($request->has('category') && $request->category) {
            $query->where([
                ['category_id', '=', $request->category],
                ['status', '=', 1],
                ['quantity', '>', 0],
            ]);
            
        }
        if ($request->has('category_id') && $request->category_id != '') {
            if($request->category_id == '0'){
                $query->where([
                    ['status', '=', 1],
                    ['quantity', '>', 0],
                ]);;
            }else{
                $query->where([
                ['category_id', '=', $request->category_id],
                ['status', '=', 1],
                ['quantity', '>', 0],
            ]);
            }
            $products = $query->paginate(getPaginate(20))->appends($request->all());
            return response()->json($products);
        }
        // تنفيذ التصفية مع الترقيم
        $products = $query->paginate(getPaginate(20))->appends($request->all());
    
        // جلب الفئات
        $categories = Category::withCount('products')->get();
    
        return view('pages.shop', compact('products', 'pageTitle', 'categories'));
    }
    
    public function filter(Request $request)
    {
        $query = Product::with(['category', 'productImages']);
        
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('price') && $request->price != '') {
            $priceRange = explode('-', $request->price);
            $query->whereBetween('price', [$priceRange[0], $priceRange[1]]);
        }

        // جلب المنتجات بعد تطبيق الفلاتر
        $products = $query->paginate(20);

        return response()->json($products);
    }

    public function details($id){
        $product = Product::find($id);
        $productImage = ProductImage::where('product_id', $id)->get();
        $categories = Category::where('status',1)->get();
        return view('pages.product-details',compact('productImage','categories','product'));
     
    }


    public function ajaxSearch(Request $request)
    {
        $query = $request->input('query'); // Get the search input

        // Search in 'name' and 'description'
        $products = Product::with('productImages')->where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")->take(5)
            ->get();

        // Return JSON response
        return response()->json($products);
    }
     public function importExcelData(Request $request)
{
    // $request->validate([
    //     'import_file' => 'required|mimes:xlsx,xls,csv'
    // ]);

    try {
        Excel::import(new ProductImport, $request->file('import_file')->store('temp'));
        $notify[] = ['success', 'Product has been created successfully'];
        return back()->withNotify($notify);
        // return redirect()->back()->with('success', 'Products imported successfully');
    } catch (\Exception $e) {
        $notify[] = ['error', 'Error importing file: ' . $e->getMessage()];
        return back()->withNotify($notify);
        // return redirect()->back()->with('error', 'Error importing file: ' . $e->getMessage());
    }
}

     public function create (){
        $pageTitle ='Add Product';
        $categories = Category::where('status',1)->get();

        return view('admin.products.create',compact('pageTitle','categories'));
     }

     public function store(Request $request)
{
    // Validate input data
    $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'quantity' => 'required|integer|min:1',
        'images' => 'required',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'discount' => 'nullable|numeric',
        'description' => 'required|string|max:500',
        'is_featured' => 'nullable|boolean',
    ]);

    // Create the product
    $product = new Product();
    $product->category_id = $request->category_id;
    $product->name = $request->name;
    $product->price = $request->price;
    $product->discount = $request->discount ?? 0;
    $product->quantity = $request->quantity;
    $product->description = $request->description;
    $product->status = 1;

    // Save product first to get the ID for images
    $product->save();

    // Handle the image uploads
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            // Create a new ProductImage instance
            $productImage = new ProductImage();
            $productImage->product_id = $product->id;

            // Generate a unique filename and move the image to the desired folder
            $filename = date('YmdHi') . '_' . $image->getClientOriginalName();
            $image->move(public_path('upload/products'), $filename);

            // Save the filename in the database
            $productImage->image = $filename;
            $productImage->save();
        }
    }

    // Handle the featured product logic
    if ($request->is_featured) {
        // Reset other featured products
        Product::where('is_featured', 1)->update(['is_featured' => 0]);
        $product->is_featured = 1;
    }

    // Save changes to the product
    $product->save();

    // Return success message with Toaster notification
    $notify[] = ['success', 'Product has been created successfully'];
    return back()->withNotify($notify);
}


     public function edit($id){
        $pageTitle = 'Update';
        $product = Product::find($id);
        $productImage = ProductImage::where('product_id', $id)->get();
        $categories = Category::where('status',1)->get();
        return view('admin.products.edit',compact('pageTitle','productImage','categories','product'));
     }

     public function update(Request $request, $id){

        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'images.*' => ['required', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        $product = Product::findOrFail($id);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->quantity = $request->quantity;

        $product->description = $request->description;
        $product->status = $request->status ? 1: 0;
        if( $request->is_featured){
            Product::where('is_featured',1)->update(['is_featured'=> 0]);
            $product->is_featured = $request->is_featured;
        }
        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Create a new ProductImage instance
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
    
                // Generate a unique filename and move the image to the desired folder
                $filename = date('YmdHi') . '_' . $image->getClientOriginalName();
                $image->move(public_path('upload/products'), $filename);
    
                // Save the filename in the database
                $productImage->image = $filename;
                $productImage->save();
            }
        }

        $notify[] = ['success', 'Product has been  updated successfully'];
        return back()->withNotify($notify);

     }


     public function imageRemove(Request $request){
        $request->validate([
          'id' => 'required'
      ]);

      $image =  ProductImage::findOrFail($request->id);

      $path  = getFilePath('product').'/'.$image->image;
      fileManager()->removeFile($path);
      $image->delete();

      $notify[] = ['success','Product Image has been deleted'];
      return back()->withNotify($notify);

    }



}