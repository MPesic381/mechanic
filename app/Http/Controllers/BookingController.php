<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Car;
use App\Http\Requests\BookingStoreRequest;
use App\Service;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,client');
        $this->authorizeResource(Booking::class, 'booking');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('client')) {
            $bookings = auth()->user()
                ->bookings()
                ->where('start_time', '>', Carbon::now())
                ->orderBy('start_time')
                ->with('car')
                ->get();
        } else {
            $bookings = Booking::with('car')
                ->where('start_time', '>', Carbon::now())
                ->orderBy('start_time')
                ->get();
        }

        return view('bookings.index')
            ->withBookings($bookings);
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
     * @param BookingStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingStoreRequest $request)
    {
        $start_time = new Carbon(Booking::setAvailable($request->start_time, $request->service_id));
        $service = Service::findOrFail($request->service_id);
        $time = explode(':', $service->time_required);
        $end_time = $start_time->copy()->addHours($time[0])->addMinutes($time[1]);


        if($request->bookWithRegister) {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => \App\Role::where('name', 'client')->first()
            ]);

            $car = $user->cars()->save(
                new Car($request->all())
            );

            $car->bookings()->save(
                new Booking([
                    'car_id' => $request->car_id,
                    'service_id' => $request->service_id,
                    'start_time' => $start_time,
                    'end_time' => $end_time
                ])
            );

            DB::commit();
        } else {

            Booking::create([
                'car_id' => $request->car_id,
                'service_id' => $request->service_id,
                'start_time' => $start_time,
                'end_time' => $end_time
            ]);

            session()->flash('message', 'You have just book your service');

        }

        return redirect('/bookings');
    }

    /**
     * Display the specified resource.
     *
     * @param Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('bookings.show')
            ->withBooking($booking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Booking $booking
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return back();
    }
}
