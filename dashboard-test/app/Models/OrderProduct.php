<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_products';

    // If you want to define the primary key and it's not 'id'
    // protected $primaryKey = 'your_primary_key'; 

    // By default, Laravel assumes the table uses the plural form of the model name ('order_products')
    // If your table name is different, you can set the $table property like above.

    // Specify which columns can be mass-assigned
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    /**
     * Relationship with Order model
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relationship with Product model
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
