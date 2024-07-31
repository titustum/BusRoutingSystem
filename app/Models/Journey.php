<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    protected $fillable = [
        'user_id',
        'origin',
        'destination',
        'origin_coordinates',
        'destination_coordinates',
        'price',
        'distance',
        'departure_date',
        'departure_time'
    ];

    protected $casts = [
        'departure_date' => 'date',
        'departure_time' => 'datetime',
        'price' => 'decimal:2',
    ];

    // Relationship with User model (assuming a journey belongs to a driver)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    // Accessor to get full departure datetime
    public function getDepartureDatetimeAttribute()
    {
        return $this->departure_date->setTimeFromTimeString($this->departure_time);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
