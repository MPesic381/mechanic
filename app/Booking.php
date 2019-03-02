<?php

namespace App;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'car_id', 'service_id', 'start_time', 'end_time'
    ];
    
    /**
     * Relationship with car model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    
    /**
     * Relationship with Service model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    
    /**
     * Check if given user owns booking
     *
     * @param $user
     * @return bool
     */
    public function ownedBy($user) {
        return $user->id == $this->car->user->id;
    }
    
    /**
     * Calculate the time when current booking service ends
     *
     * @param $start_time
     * @param $service_id
     * @return Carbon
     */
    public static function ends($start_time, $service_id) {
        $start_time = new Carbon($start_time);
        $service = Service::findOrFail($service_id);
        $time = explode(':', $service->time_required);
        return $start_time->copy()->addHours($time[0])->addMinutes($time[1]);
    }
    
    /**
     * Check if booking schedule is available
     *
     * @param $start
     * @param $duration
     * @return bool
     */
    protected static function isAvailable($start, $duration)
    {
        $end = (new Carbon($start))->addMinutes($duration);

        $booking = self::where([['start_time', '>=', $start], ['start_time', '<', $end->toDateTimeString()]])
            ->orwhere([['end_time', '>', $start], ['end_time', '<=', $end->toDateTimeString()]])
            ->orWhere([['start_time', '<', $start], ['end_time', '>', $start]])
            ->get();

        return !count($booking);
    }
    
    /**
     * Set the booking time
     *
     * @param $start
     * @param $service_id
     * @return Carbon
     */
    public static function setAvailable($start, $service_id)
    {
        $time = explode(':', Service::findOrFail($service_id)->time_required);

        $duration = $time[0] * 60 + $time[1];

        if (self::isAvailable($start, $duration)) {
            return $start;
        }

        $bookings = self::where('start_time', '>=', $start)
            ->orWhere('end_time', '>=', $start)
            ->orderBy('start_time', 'ASC')
            ->get();

        if (count($bookings) === 1) {
            return $bookings[0]->end_time;
        }

        for ($i = 0, $n = count($bookings); $i < $n - 1; $i++) {
            $startTime = new Carbon($bookings[$i + 1]->start_time);
            $endTime = new Carbon($bookings[$i]->end_time);

            $difference = $endTime->diffInMinutes($startTime);

            if ($difference > $duration) {
                return $bookings[$i]->end_time;
            }
        }

        return new Carbon($bookings[count($bookings) - 1]->end_time);
    }
    
    
    /**
     * Soft deletes the current booking if schedule
     * is not in the next 24 hrs
     *
     * @return bool|void|null
     * @throws Exception
     */
    public function delete()
    {
        if ( $this->start_time < Carbon::now()->addDay()) {
            session()->flash('message', 'You can\'t delete booking that is in the next 24hrs');
            return;
        }

        parent::delete();

        session()->flash('message', 'You have deleted one record');
    }
}
