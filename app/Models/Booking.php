<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'journey_id', 'user_id', 'transaction_code', 'status'
    ];

    public function journey()
    {
        return $this->belongsTo(Journey::class);
    }

    public function passenger()
    {
        return $this->belongsTo(User::class);
    }
}
