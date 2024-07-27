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
        'departure_date',
        'departure_time'
    ];

    protected $casts = [
        'departure_date' => 'date',
        'departure_time' => 'datetime',
        'price' => 'decimal:2',
    ];

    // Relationship with User model (assuming a journey belongs to a driver)
    public function driver()
    {
        return $this->belongsTo(User::class);
    }

    // You might also want to add a relationship for passengers if applicable
    public function passengers()
    {
        return $this->belongsToMany(User::class);
    }

    // Accessor to get full departure datetime
    public function getDepartureDatetimeAttribute()
    {
        return $this->departure_date->setTimeFromTimeString($this->departure_time);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
