<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    // public function index(){
    //     return view('pages.cart');
    //  }

     public function index()
    {
        // Retrieve cart data from cookies
        $cart = json_decode(Cookie::get('cart', json_encode([])), true);
        $cartItems = [];

        if (!empty($cart)) {
            // Loop through each product ID in the cart
            foreach ($cart as $productId => $item) {
                // Get product data from the database
                $product = Product::with(['category', 'productImages'])->find($productId);

                if ($product) {
                    // Add the product data to the cart item
                    $cartItems[] = [
                        'product' => $product,
                        'quantity' => $item['quantity'],
                        'total_price' => $product->price * $item['quantity']
                    ];
                }
            }
        }

        // Pass cart items with product data to the view
        return view('pages.cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        // Get the product id and quantity from the request
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); // Default quantity is 1

        // Retrieve the current cart from cookies or initialize an empty array if not available
        $cart = json_decode(Cookie::get('cart', json_encode([])), true);

        // Add or update the product in the cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;  // Increase quantity if product exists
        } else {
            $cart[$productId] = ['product_id' => $productId, 'quantity' => $quantity];
        }

        // Store the updated cart back in the cookie
        Cookie::queue('cart', json_encode($cart), 60 * 24);  // Expires in 1 day

        // Return a JSON response
        return response()->json([
            'message' => 'Product added to cart!',
            'cart' => $cart
        ]);
    }

    public function removeItem(Request $request)
{
    $productId = $request->input('product_id');

    // Retrieve the cart from cookies
    $cart = json_decode(Cookie::get('cart', json_encode([])), true);

    // Remove the item from the cart
    if (isset($cart[$productId])) {
        unset($cart[$productId]);
        Cookie::queue('cart', json_encode($cart), 60 * 24);  // Store the updated cart in cookies
        return response()->json(['message' => 'Item removed from cart','cart' => $cart]);
    }

    return response()->json(['message' => 'Item not found in cart'], 404);
}

public function updateQuantity(Request $request)
{
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');

    // Retrieve the cart from cookies
    $cart = json_decode(Cookie::get('cart', json_encode([])), true);

    // Check if the product exists in the cart and update its quantity
    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] = $quantity;
        Cookie::queue('cart', json_encode($cart), 60 * 24);  // Store the updated cart in cookies

        // Assuming you also have a way to calculate the total for the product
        $newTotal = $this->calculateProductTotal($cart[$productId]);
        
        return response()->json(['newTotal' => $newTotal]);
    }

    return response()->json(['message' => 'Item not found in cart'], 404);
}

private function calculateProductTotal($product)
{
    // Assuming you have product price available
    $productPrice = 125.00;  // Example static price, you should retrieve the actual price from your database
    return $productPrice * $product['quantity'];
}




}