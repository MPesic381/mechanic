<?php

namespace App\Http\Controllers\Api;

use App\Car;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateKilometrageRequest;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $user = $request->user();
        
        $cars = $user->cars()->where(function ($query) use ($request) {
            $query->where('model', 'like', '%' . $request->parameter . '%')
            ->orWhere('manufacturer', 'like', '%' . $request->parameter . '%')
            ->orWhere('plate', 'like', '%' . $request->parameter . '%');
        })->get();
        
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
