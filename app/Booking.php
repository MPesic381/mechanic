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

    private static function isAvailable($start, $duration)
    {
        $end_time = (new Carbon($start))->addMinutes($duration);

        $booking = self::where([
            ['start_time', '>', $start],
            ['start_time', '<', $end_time->toDateTimeString()]
        ])->get();

        return !count($booking);
    }

    public static function setAvailable($start, $duration)
    {
        if (self::isAvailable($start, $duration)) {
            return $start;
        }

        $bookings = self::where('start_time', '=', $start)->get();

        if (count($bookings) === 1) {
            return $bookings[0]->end_time;
        }

        foreach ($bookings as $booking) {
            $start = new Carbon($booking->start_time);
            $end = new Carbon($booking->end_time);

            $difference = $end->diffInMinutes($start);

            if ($difference > $duration) {
                return $booking->end_time;
            }
        }

        return 'fdlskglfk';
    }
}
