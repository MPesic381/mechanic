<?php

namespace App\Http\Controllers\Api;

use App\Car;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateKilometrageRequest;

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
    
    public function updateKilometrage(UpdateKilometrageRequest $request)
    {
        $car = Car::find(request()->route()->parameters()['car']);
        $car->kilometrage += $request['kilometrage'];

        $car->save();
        
        return response()->json('Car kilometrage updated', 200);
    }
}
