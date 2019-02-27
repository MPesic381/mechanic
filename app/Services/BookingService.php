<?php
    
namespace App\Services;

use App\Booking;
use App\Car;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookingService implements CrudableInterface
{
    
    /**
     * Display a listing of the all resources.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        if(auth()->user()->hasRole('client')) {
            return $bookings = auth()->user()
                ->bookings()
                ->where('start_time', '>', Carbon::now())
                ->orderBy('start_time')
                ->with('car')
                ->get();
        } else if (auth()->user()->hasRole('admin')) {
            return $bookings = Booking::with('car')
                ->where('start_time', '>', Carbon::now())
                ->orderBy('start_time')
                ->get();
        } else {
            return abort(403);
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param $parameters
     *
     * @return void
     */
    public function make($parameters) : void
    {
        Booking::create($parameters);
    }
    
    public function makeWithUser($parameters)
    {
        DB::beginTransaction();
    
        $user = (new UserService())
            ->make($parameters);
    
        $car = $user->cars()->save(
            new Car($parameters)
        );
        $car->bookings()->save(
            new Booking($parameters)
        );
    
        DB::commit();
    }
    
    /**
     * Update existing resource to storage
     *
     * @param $parameters
     * @param $model
     *
     * @return void
     */
    public function update($parameters, $model): void
    {
        // TODO: Implement update() method.
    }
    
    /**
     * Soft delete existing resource from storage
     *
     * @param $model
     * @throws \Exception
     *
     * @return void
     */
    public function delete($model): void
    {
        $model->delete($model);
    }
}