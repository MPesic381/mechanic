<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingCheckRequest;
use App\Http\Requests\BookingStoreRequest;
use App\Services\BookingService;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * @var BookingService
     */
    protected $service;
    
    /**
     * BookingController constructor.
     */
    public function __construct()
    {
        $this->service = new BookingService();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param BookingCheckRequest $request
     * @return \Illuminate\Http\Response
     */
    public function availabilityCheck(BookingCheckRequest $request)
    {
        $book =  Booking::nextAvailable($request->start_time, $request->service_id);

        return response()->json('Next available time for your service is at ' . $book, 200);
    }
    
    /**
     * Checking availability and storing the booking
     * into the database if time is available
     *
     * @param BookingStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BookingStoreRequest $request)
    {
        if ($request->user()->id != \App\Car::find($request->car_id)->user_id) {
            return response()->json('This is not your car', 200);
        }
        
        $start_time = new Carbon(Booking::nextAvailable($request->start_time, $request->service_id));
        
        if (new Carbon($request->start_time) != $start_time) {
            return response()->json('The booking time you choosen is not available. Next available is ' . $start_time, 200);
        }
        
        $end_time = Booking::ends($request->start_time, $request->service_id);
        
        $parameters = [
            'car_id' => $request->car_id,
            'service_id' => $request->service_id,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'note' => $request->note,
        ];
        
        $this->service->make($parameters);
        
        return response()->json('You booked a service at ' . $start_time, 200);
    }
}
