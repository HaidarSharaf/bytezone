<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';

    protected $fillable = ['name', 'logo'];

    public function getRouteKeyName(){
        return 'name';
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

}
