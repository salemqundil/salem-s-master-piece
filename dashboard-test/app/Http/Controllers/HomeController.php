<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        // $products = Product::select('id', 'name')->get();
        // foreach($products as $product){
        //     print_r($product->id);
        //     echo '=>';
        //     print_r($product->name);
        //     echo '<br>';
        // }
        // die();
// dd(response()->json($products));
        $currentDate = Carbon::now();
        $banners = [
            ["assets/pages/images/thumbs/promotional-banner-img1.png", "Everyday Fresh Meat", "shop.html"],
            ["assets/pages/images/thumbs/promotional-banner-img2.png", "Daily Fresh Vegetables", "shop.html"],
            ["assets/pages/images/thumbs/promotional-banner-img3.png", "Everyday Fresh Milk", "shop.html"],
            ["assets/pages/images/thumbs/promotional-banner-img4.png", "Everyday Fresh Fruits", "shop.html"]
        ];
        $categories = Category::withCount('products')->get();
        $products = Product::with(['productImages'])->orderBy('id','desc')->paginate(getPaginate(8));
        $productsSale = Product::with('productImages')
            // ->where('created_at', '>', $currentDate) // التحقق من أن تاريخ النهاية لم ينتهِ
            ->paginate(getPaginate(8));
        return view('pages.home',compact('products', 'categories','productsSale','banners'));
     }

     public function login(){
        return response()->json(['logged_in' => Auth::check()]);
     }

}
