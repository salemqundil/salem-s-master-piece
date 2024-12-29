<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    protected $model = Package::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'status' => $this->faker->boolean,
        ];
    }
}
