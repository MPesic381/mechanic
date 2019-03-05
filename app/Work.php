<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Work
 *
 * @package App
 * @property int $id
 * @property int $car_id
 * @property int $service_id
 * @property int $kilometrage
 * @property Carbon $serviced_at
 */
class Work extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_id', 'service_id', 'kilometrage', 'serviced_at',
    ];
    
    /**
     * Relationship with services
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    
    /**
     * Relationship with cars
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
