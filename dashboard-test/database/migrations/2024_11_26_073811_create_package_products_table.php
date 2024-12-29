<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_products', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('package_id')->constrained('packages')->onDelete('cascade'); // Foreign key to packages table
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Foreign key to products table
            $table->integer('quantity'); // Quantity of the product in the package
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_products');
    }
}
