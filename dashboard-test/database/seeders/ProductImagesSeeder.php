<?php
namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImagesSeeder extends Seeder
{
    public function run()
    {
        $products = Product::all();

        foreach ($products as $product) {
            ProductImage::factory()->count(3)->create(['product_id' => $product->id]);
        }
    }
}
