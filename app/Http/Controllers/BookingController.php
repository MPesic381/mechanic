<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Car;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = auth()->user()->cars()->with('bookings')->get();

        $bookings = [];

        foreach ($cars as $car) {
            foreach($car->bookings as $booking) {
                if ($booking->start_time > Carbon::now()) {
                    $bookings[] = [
                        'bookingId' => $booking->id,
                        'plate' => $car->plate,
                        'start_time' => $booking->start_time,
                        'end_time' => $booking->end_time,
                    ];
                }
            }
        }

        array_multisort(array_map(function($element) {
            return $element['start_time'];
        }, $bookings), SORT_ASC, $bookings);

        return view('bookings.index')->withBookings($bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = auth()->user()->cars()->get();

        $services = Service::all();

        return view('bookings.create')
            ->withCars($cars)
            ->withServices($services);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
