<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key to categories table
            $table->string('name'); // Product name
            $table->text('description')->nullable(); // Product description (nullable)
            $table->decimal('price', 10, 2); // Product price with two decimal places
            $table->integer('quantity'); // Product quantity in stock
            $table->decimal('discount', 5, 2)->default(0); // Discount percentage, default 0
            $table->boolean('status')->default(true); // Status (default to active)
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
        Schema::dropIfExists('products');
    }
}