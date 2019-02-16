<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'time_required', 'warranty', 'cost',
    ];

    protected $dates = ['deleted_at'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
