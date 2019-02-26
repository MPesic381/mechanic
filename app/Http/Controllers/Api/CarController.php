<?php

namespace App\Http\Controllers\Api;

use App\Car;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = request('user_id');
        $model = request('model');
    
        $cars = Car::where('user_id', $user)->where('model', 'like', $model . '%')->get();
    
        return response()->json($cars, 200);
    }
}
