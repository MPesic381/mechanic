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
     * @param $service_id
     * @return \Illuminate\Http\Response
     */
    public function checkAvailable($start, $service_id)
    {
        $book =  Booking::setAvailable($start, $service_id);

        return response()->json($book, 200);
    }
}
