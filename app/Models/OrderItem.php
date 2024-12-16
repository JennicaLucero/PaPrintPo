<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'supply_id',
        'quantity',
        'price',
    ];

    // Relationship: An order item belongs to an order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relationship: An order item belongs to a supply
    public function supply()
    {
        return $this->belongsTo(PrintingSupply::class);
    }
}
