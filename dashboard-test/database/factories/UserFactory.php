<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // default password
            'address1' => $this->faker->address,
            'address2' => $this->faker->secondaryAddress,
            'phone' => $this->faker->phoneNumber,
            'image' => $this->faker->imageUrl(200, 200, 'people', true),
            'is_active' => $this->faker->boolean,
            'remember_token' => Str::random(10),
        ];
    }
}
