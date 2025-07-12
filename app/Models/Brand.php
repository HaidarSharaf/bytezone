<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $table = 'brands';

    protected $fillable = ['name', 'logo'];

    public function getRouteKeyName(){
        return 'name';
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
