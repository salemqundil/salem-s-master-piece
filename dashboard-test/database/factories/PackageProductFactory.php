<?php

namespace Database\Factories;

use App\Models\PackageProduct;
use App\Models\Package;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageProductFactory extends Factory
{
    protected $model = PackageProduct::class;

    public function definition()
    {
        return [
            'package_id' => Package::factory(),
            'product_id' => Product::factory(),
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
