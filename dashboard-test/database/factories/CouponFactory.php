<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    public function definition()
    {
        return [
            'coupon' => $this->faker->word,
            'discount' => $this->faker->numberBetween(5, 50),
            'validity_days' => $this->faker->numberBetween(1, 365),  // Add validity_days
            'expire_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'status' => $this->faker->boolean,
        ];
    }
}
