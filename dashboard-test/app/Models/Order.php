<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        // Set a default user_id if none is provided
        static::creating(function ($order) {
            if (is_null($order->user_id)) {
                $order->user_id = 1; // Default user ID, change to whatever suits your needs
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')
                    ->withPivot('quantity', 'price');
    }
}
