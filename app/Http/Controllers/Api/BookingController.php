<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $start
     * @param $duration
     * @return \Illuminate\Http\Response
     */
    public function checkAvailable($start, $duration)
    {
        $book =  Booking::setAvailable($start, $duration);

        return response()->json($book, 200);
    }
}
