<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'vehicle_number',
        'vehicle_model',
        'vehicle_type',
    ];


    /**
     * Get the user that owns the Driver
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function journeys()
    {
        return $this->hasMany(Journey::class);
    }
}
