<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index(){
        $user = Auth::user(); // Get the currently authenticated user
        $products = $user->favorites()->with(['productImages','category'])->get();
        // dd($products);
        return view('pages.wishlist',compact('products'));
    }


    public function update(Request $request){

        $user = Auth::user(); // Get the currently authenticated user
        $productId = $request->input('product_id'); // Get the product ID from the request
    
        // Check if the product exists in the user's favorites
        if (!$user->favorites()->where('product_id', $productId)->exists()) {
            $user->favorites()->syncWithoutDetaching([$productId]);
            return response()->json(['success' => true, 'message' => 'Product added to favorites.','delete'=> 1]);
        }
    
        // Remove the product from the favorites
        $user->favorites()->detach($productId);
    
        return response()->json(['success' => true, 'message' => 'Product removed from favorites.']);
    }


    public function cssIcons(Request $request){

         // Get the currently authenticated user
        if(Auth::check()){
            $user = Auth::user();
            $productIds = $user->favorites->pluck('id');
            return response()->json(['success' => true, 'message' => 'Product removed from favorites.','products'=>$productIds]);
        }
        return response()->json(['success' => true, 'message' => 'Not Login','products'=>'']);

        // استرجاع جميع الـ IDs للمنتجات المفضلة
    
        
    }
    
}