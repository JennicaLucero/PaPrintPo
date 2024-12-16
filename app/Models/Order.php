<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'payment_method',
        'items',
        'total_price',
        'status'
    ];

    protected $casts = [
        'items' => 'array', // Store cart items as JSON
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship between Order and OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);  // One Order has many OrderItems
    }
}
