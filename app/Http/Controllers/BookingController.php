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
        $this->middleware('auth');
        $this->middleware('role:admin')->except('index', 'show');
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
        } else if (auth()->user()->hasRole('admin')) {
            $bookings = Booking::with('car')
                ->where('start_time', '>', Carbon::now())
                ->orderBy('start_time')
                ->get();
        } else {
            return abort(403);
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
        return view('bookings.create');
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
        $end_time = Booking::ends($start_time, $request->service_id);

        if($request->bookWithRegister) {
            
            
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => \App\Role::where('name', 'client')->first()->id
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
            
            session()->flash('message', 'You created new user and car and made a booking for him');
        } else {
            Booking::create([
                'car_id' => $request->car_id,
                'service_id' => $request->service_id,
                'start_time' => $start_time,
                'end_time' => $end_time
            ]);

            session()->flash('message', 'You made a booking for existing user');
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
