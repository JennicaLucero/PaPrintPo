<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'status', 'total_price'];

    // Relationship with users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship: An order has many order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
