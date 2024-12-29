<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;

class CheckoutController extends Controller
{

    public function index(){
        $user = Auth::user(); // Get the currently authenticated user
        $cart = json_decode(Cookie::get('cart', json_encode([])), true);
        $cartPrice = 0;
        $cartItems = [];

        if (!empty($cart)) {
            // Loop through each product ID in the cart
            foreach ($cart as $productId => $item) {
                // Get product data from the database
                $product = Product::find($productId);

                if ($product) {
                    // Add the product data to the cart item
                    $cartItems[] = [
                        'product' => $product,
                        'quantity' => $item['quantity'],
                        'total_price' => $product->price * $item['quantity']
                    ];
                    $cartPrice = $cartPrice + ($product->price * $item['quantity']);
                }
            }
        }

        return view('pages.checkout',compact('cartItems','user','cartPrice'));
    }

}