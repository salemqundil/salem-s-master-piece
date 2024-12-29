<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('coupon')->unique(); // Coupon name (unique)
            $table->decimal('discount', 5, 2); // Discount percentage or amount
            $table->decimal('validity_days',5,2); // validity days
            $table->date('expire_date'); // Expiration date of the coupon
            $table->boolean('status')->default(true); // Status (active or inactive)
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
        Schema::dropIfExists('coupons');
    }
}
