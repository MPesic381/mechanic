<?php
    
namespace App\Services;

use App\Booking;
use Carbon\Carbon;

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
    public function make($parameters): void
    {
        // TODO: Implement make() method.
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
        // TODO: Implement delete() method.
    }
}