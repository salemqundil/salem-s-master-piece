<?php
namespace Database\Seeders;

use App\Models\Package;
use App\Models\Product;
use App\Models\PackageProduct;
use Illuminate\Database\Seeder;

class PackageProductsSeeder extends Seeder
{
    public function run()
    {
        $packages = Package::all();

        foreach ($packages as $package) {
            foreach (Product::inRandomOrder()->take(5)->get() as $product) {
                PackageProduct::create([
                    'package_id' => $package->id,
                    'product_id' => $product->id,
                    'quantity' => rand(1, 10),
                ]);
            }
        }
    }
}
