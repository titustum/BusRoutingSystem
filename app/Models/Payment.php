<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'journey_id',
        'phone_number',
        'transaction_code',
        'mpesa_receipt_number',
        'amount',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class);
    }
    public function journey()
    {
        return $this->belongsTo(Journey::class);
    }
}
