<?php

namespace App\Imports;

use App\Models\ProductImage;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    public function model(array $row)
    {
        
        $product = new Product();
        $product->category_id = $row[2];
        $product->name = $row[1];
        $product->price = $row[3];
        $product->quantity = 10;
        $product->save();
        $productImage = new ProductImage();
        $productImage->product_id = $product->id;
        $productImage->image = $row[0];
        $productImage->save();
        return $product;
    }
}