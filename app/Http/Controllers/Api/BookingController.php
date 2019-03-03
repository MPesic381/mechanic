<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingCheckRequest;
use App\Http\Requests\BookingStoreRequest;
use App\Service;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $start
     * @param $service_id
     * @return \Illuminate\Http\Response
     */
    public function availabilityCheck(BookingCheckRequest $request)
    {
        $book =  Booking::setAvailable($request->start_time, $request->service_id);

        return response()->json('Next available time for your service is at ' . $book, 200);
    }
    
    public function store(BookingStoreRequest $request)
    {
        $start_time = new Carbon(Booking::setAvailable($request->start_time, $request->service_id));
        
        if (new Carbon($request->start_time) != $start_time) {
            return response()->json('The booking time you choosen is not available. Next available is ' . $start_time, 200);
        }
        
        $service = Service::findOrFail($request->service_id);
        $time = explode(':', $service->time_required);
        $end_time = $start_time->copy()->addHours($time[0])->addMinutes($time[1]);
    
        $booking = Booking::create([
            'car_id' => $request->car_id,
            'service_id' => $request->service_id,
            'start_time' => $start_time,
            'end_time' => $end_time
        ]);;
        
        return response()->json('You booked a service at ' . $booking->start_time, 200);
    }
}
