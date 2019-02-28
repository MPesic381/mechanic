<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'car_id', 'service_id', 'kilometrage', 'serviced_at',
    ];
    
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
