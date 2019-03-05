<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Car
 *
 * @package App
 * @property int $id
 * @property string $plate
 * @property string $manufacturer
 * @property string $model
 * @property int $year
 * @property int $kilometrage
 * @property int $hp
 * @property int $cc
 */
class Car extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plate', 'manufacturer', 'model', 'year', 'kilometrage', 'hp', 'cc'
    ];
    
    /**
     * Carbon instance
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Relationship with user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
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
