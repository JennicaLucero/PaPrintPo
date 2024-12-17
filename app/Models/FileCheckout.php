<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileCheckout extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the plural of the model name
    protected $table = 'file_checkouts';

    // Define the fillable fields (optional, for mass assignment protection)
    protected $fillable = [
        'user_id',
        'service_id',
        'name',
        'address',
        'mobile_number',
        'delivery_type',
        'payment_type',
        'price',
        'order_status',
    ];

    // Add any relationships if needed, for example:
    // public function user() {
    //     return $this->belongsTo(User::class);
    // }
}
