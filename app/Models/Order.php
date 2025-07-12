<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'orders';

    protected $fillable = ['user_id', 'products', 'address', 'total_price', 'status', 'payment_method', 'payment_status'];

    protected $casts = [
        'products' => 'json',
        'address' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
