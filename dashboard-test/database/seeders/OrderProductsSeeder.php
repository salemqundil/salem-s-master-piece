<?php
namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Database\Seeder;

class OrderProductsSeeder extends Seeder
{
    public function run()
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            $products = Product::inRandomOrder()->take(3)->get();
            foreach ($products as $product) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => rand(1, 5),
                    'price' => $product->price,
                ]);
            }
        }
    }
}
