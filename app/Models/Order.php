<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['user_id', 'total_amount'];

public function item() {
    return $this->hasMany(OrderItem::class);
}
}
