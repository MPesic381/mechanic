<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Http\Controllers\Controller;
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
    public function checkAvailable($start, $service_id)
    {
        $book =  Booking::setAvailable($start, $service_id);

        return response()->json($book, 200);
    }
    
    public function store(BookingStoreRequest $request)
    {
        $start_time = new Carbon(Booking::setAvailable($request->start_time, $request->service_id));
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
