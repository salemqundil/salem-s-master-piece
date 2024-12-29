<?php
namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackagesSeeder extends Seeder
{
    public function run()
    {
        Package::factory()->count(5)->create();
    }
}
