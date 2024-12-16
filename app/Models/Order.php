<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'service_id', 'status', 'total_price'];

    // Relationship with users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with services
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
