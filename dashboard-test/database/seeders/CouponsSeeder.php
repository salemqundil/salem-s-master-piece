<?php
namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponsSeeder extends Seeder
{
    public function run()
    {
        Coupon::factory()->count(5)->create();
    }
}
