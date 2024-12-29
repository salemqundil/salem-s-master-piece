<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\CategoriesSeeder;
use Database\Seeders\ProductsSeeder;
use Database\Seeders\ProductImagesSeeder;
use Database\Seeders\OrdersSeeder;
use Database\Seeders\OrderProductsSeeder;
use Database\Seeders\CouponsSeeder;
use Database\Seeders\ReviewsSeeder;
use Database\Seeders\WishlistsSeeder;
use Database\Seeders\PackagesSeeder;
use Database\Seeders\PackageProductsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            CategoriesSeeder::class,
            ProductsSeeder::class,
            ProductImagesSeeder::class,
            OrdersSeeder::class,
            OrderProductsSeeder::class,
            CouponsSeeder::class,
            ReviewsSeeder::class,
            PackagesSeeder::class,
            PackageProductsSeeder::class,
        ]);
    }
}
