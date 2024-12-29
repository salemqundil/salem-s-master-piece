<?php
namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            Order::factory()->count(2)->create(['user_id' => $user->id]);
        }
    }
}
