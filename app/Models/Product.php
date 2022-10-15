<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category() 
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function images(){
       return $this->hasMany(ProductImage::class);
    }

    public function productColors(){
       return $this->hasMany(ProductColor::class,'product_id','id');
    }
}
