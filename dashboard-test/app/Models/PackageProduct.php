<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageProduct extends Model
{
    use HasFactory;

    protected $table = 'package_products';  // Explicitly define the pivot table name.

    // If you want to define a custom primary key for the pivot table (e.g., if it's not 'id')
    // protected $primaryKey = 'your_primary_key'; 

    // Allow mass assignment on these fields
    protected $fillable = [
        'package_id',
        'product_id',
        'quantity',
    ];

    /**
     * Relationship with Package model
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Relationship with Product model
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
