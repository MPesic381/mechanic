<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CarController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        auth()->user()->authorizedRoles('client');

        $cars = auth()->user()->cars()->get();

        return view('cars.index')->withCars($cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        auth()->user()->authorizedRoles('client');

        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        auth()->user()->authorizedRoles('client');


        $attributes = $request->validate([
            'plate' => 'required|min:3|max:10',
            'manufacturer' => 'required|max:30',
            'model' => 'required|max:30',
            'year' => 'required|integer|between:1980,2019|',
            'kilometrage' => 'required|integer|between:1,500000',
            'hp' => 'required|integer|between:10,999',
            'cc' => 'required|integer|between:50,7000'
        ]);

        auth()->user()->cars()->save(
            new Car($attributes)
        );

        session()->flash('message', 'You successfully inserted new car');

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        auth()->user()->authorizedRoles('client');

        $car = Car::findOrFail($id);

        if (Gate::denies('action', $car)) {
            abort(403, 'You don\'t have access to view this');
        }

        return view('cars.show')->withCar($car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        auth()->user()->authorizedRoles('client');

        $car = Car::findOrFail($id);

        if (Gate::denies('action', $car)) {
            abort(403, 'You don\'t have access to view this');
        }

        return view('cars.edit')->withCar($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        auth()->user()->authorizedRoles('client');

        $attributes = $request->validate([
            'plate' => 'required|min:3|max:10',
            'manufacturer' => 'required|max:30',
            'model' => 'required|max:30',
            'year' => 'required|integer|between:1980,2019|',
            'kilometrage' => 'required|integer|between:1,500000',
            'hp' => 'required|integer|between:10,999',
            'cc' => 'required|integer|between:50,7000'
        ]);

        $car = auth()->user()->cars()->find($id);

        if (Gate::denies('action', $car)) {
            abort(403, 'You don\'t have access to view this');
        }

        $car->update($attributes);

        session()->flash('message', 'Car successfully updated');

        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        auth()->user()->authorizedRoles('client');

        $car = auth()->user()->cars()->find($id);

        if (Gate::denies('action', $car)) {
            abort(403, 'You don\'t have access to view this');
        }

        $car->delete();

        session()->flash('message', 'Car successfully deleted');

        return back();
    }
}
