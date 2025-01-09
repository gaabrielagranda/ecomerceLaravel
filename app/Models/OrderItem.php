<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable=['cart_id', 'product_id', 'quantity', 'price'];

public function order() {
    return $this->has(Order::class);
}

public function product() {
    return $this->has(Product::class);
}
}
