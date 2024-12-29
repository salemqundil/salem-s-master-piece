<?php
namespace Database\Seeders;

use App\Models\Review;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    public function run()
    {
        $products = Product::all();
        $users = User::all();

        foreach ($users as $user) {
            foreach ($products->random(5) as $product) {
                Review::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'text' => 'This is a review.',
                    'rating' => rand(1, 5),
                    'status' => true,
                ]);
            }
        }
    }
}
