<?php
namespace Database\Seeders\AppSeeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class WishlistsSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            foreach (Product::inRandomOrder()->take(3)->get() as $product) {
                Wishlist::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                ]);
            }
        }
    }
}
