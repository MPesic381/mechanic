<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Service
 *
 * @package App
 * @property int $id
 * @property string $name
 * @property string $time_required
 * @property int $warranty
 * @property int $cost
 */
class Service extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'time_required', 'warranty', 'cost',
    ];
    
    /**
     * Carbon instance
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     * Relationship with bookings
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    
    /**
     * Relationship with works
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function works()
    {
        return $this->hasMany(Work::class);
    }
}
