<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name', 'time_required', 'warranty', 'cost',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
