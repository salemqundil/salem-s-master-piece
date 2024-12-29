<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'coupon_id' => null,
            'total_price' => $this->faker->randomFloat(2, 50, 1000),
            'address' => $this->faker->address,
            'status' => 'pending',
        ];
    }
}
