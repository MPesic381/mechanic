<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Car;
use App\Http\Requests\BookingStoreRequest;
use App\Service;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,client');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::with('car')->get();

        if(auth()->user()->hasRole('client')) {
            $bookings = auth()->user()->bookings()->with('car') ->get();
        }

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
    public function store(BookingStoreRequest $request)
    {
        $start_time = new Carbon(Booking::setAvailable($request->start_time, $request->service_id));

        $service = Service::findOrFail($request->service_id);

        Booking::create([
            'car_id' => $request->car_id,
            'service_id' => $request->service_id,
            'start_time' => $start_time,
            'end_time' => $start_time->addHours($service->time_required),
        ]);

        session()->flash('message', 'You have just book your service');

        return redirect('/bookings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('bookings.shows');
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
    }
}
