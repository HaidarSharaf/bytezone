<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $table = 'carts';

    protected $fillable = ['user_id', 'products', 'total_price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'products' => 'json',
    ];

}
