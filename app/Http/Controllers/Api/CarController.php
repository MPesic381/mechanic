<?php

namespace App\Http\Controllers\Api;

use App\Car;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateKilometrageRequest;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * CarController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Return a collection of cars associated with
     * a logged user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $user = $request->user() ?? \App\User::find(2);
        
        $user = $request->user_id ? \App\User::find($request->user_id) : $request->user();
        
        $cars = $user->cars()->where(function ($query) use ($request) {
            $query->where('model', 'like', '%' . $request->parameter . '%')
            ->orWhere('manufacturer', 'like', '%' . $request->parameter . '%')
            ->orWhere('plate', 'like', '%' . $request->parameter . '%');
        })->get();
        
        return response()->json($cars, 200);
    }
    
    /**
     * Update kilometrage of a specific car
     *
     * @param UpdateKilometrageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateKilometrage(UpdateKilometrageRequest $request)
    {
        $car = Car::find(request()->route()->parameters()['car']);
        $car->kilometrage += $request['kilometrage'];

        $car->save();
        
        return response()->json('Car kilometrage updated', 200);
    }
}
