<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'document_name',
        'service_type', 
        'file',
        'quantity', 
        'comments',
        'status'
    ];

    // Relationship with orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
