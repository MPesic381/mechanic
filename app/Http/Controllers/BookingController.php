<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Car;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();

//        $bookings = Booking::join('cars', 'bookings.car_id', 'cars.id')
//            ->join('users', 'cars.user_id', 'users.id')
//            ->join('services', 'bookings.service_id', 'services.id')
//            ->where('bookings.start_time', '>', $now)
//            ->where('users.id', auth()->user()->id)
//            ->orderBy('bookings.start_time', 'ASC')
//            ->get(['cars.plate', 'bookings.end_time', 'services.name']);

//        return $bookings;

//        $bookings = auth()->user()->cars()->with('booking')->get();
        $bookings = Car::find(4)->bookings()->with('service')->get();

        return $bookings;

        return view('bookings.index')->withCars($bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
