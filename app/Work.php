<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
