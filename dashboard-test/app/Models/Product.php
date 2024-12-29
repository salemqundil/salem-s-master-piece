<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category_id',
        'quantity',
    ];

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_products')
                    ->withPivot('quantity');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products')
                    ->withPivot('quantity', 'price');
    }

}
