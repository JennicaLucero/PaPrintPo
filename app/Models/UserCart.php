<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'supply_id', 'quantity',
    ];

    public function supply() {
        return $this->belongsTo(PrintingSupply::class);
    }
}

