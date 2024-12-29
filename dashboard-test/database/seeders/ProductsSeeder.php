<?php
namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            Product::factory()->count(10)->create(['category_id' => $category->id]);
        }
    }
}
