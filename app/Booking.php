<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
