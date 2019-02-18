<?php

namespace App;

use Carbon\Carbon;
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

    protected static function isAvailable($start, $duration)
    {
        $end = (new Carbon($start))->addMinutes($duration);

        $booking = self::where([['start_time', '>=', $start], ['start_time', '<', $end->toDateTimeString()]])
            ->orwhere([['end_time', '>', $start], ['end_time', '<=', $end->toDateTimeString()]])
            ->orWhere([['start_time', '<', $start], ['end_time', '>', $start]])
            ->get();

        return !count($booking);
    }

    public static function setAvailable($start, $service_id)
    {
        $duration = Service::find($service_id)->time_required;

        if (self::isAvailable($start, $duration)) {
            return $start;
        }

        $bookings = self::where('start_time', '>=', $start)
            ->orWhere('end_time', '>=', $start)
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

        return $bookings[count($bookings) - 1]->end_time;
    }
}
