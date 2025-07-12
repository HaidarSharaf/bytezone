<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    protected $fillable = ['name', 'slug', 'price', 'description', 'images', 'category_id', 'brand_id', 'stock', 'discount'];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    protected $casts = [
        'images' => 'array',
    ];
}
