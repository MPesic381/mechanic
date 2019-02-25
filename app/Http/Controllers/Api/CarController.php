<?php

namespace App\Http\Controllers\Api;

use App\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function index()
    {
        $user = request('user_id');
    
        $cars = Car::where('user_id', $user)->get();
    
        
        return response()->json($cars, 200);
    }
}
