<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->onDelete('set null'); // Foreign key to coupons table
            $table->decimal('total_price', 10, 2); // Total price of the order
            $table->text('address'); // Delivery address
            $table->enum('status', ['pending', 'processing', 'completed', 'canceled'])->default('pending'); // Order status
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
        Schema::dropIfExists('orders');
    }
}
