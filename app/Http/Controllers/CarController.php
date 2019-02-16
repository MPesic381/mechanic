<?php

namespace App\Http\Controllers;

use App\Car;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;

class CarController extends Controller
{

    /**
     * CarController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin,client']);

        $this->authorizeResource(Car::class, 'car');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cars = Car::all();

        if (auth()->user()->hasRole('client')) {
            $cars = auth()->user()->cars()->get();
        }

        return view('cars.index')->withCars($cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CarStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarStoreRequest $request)
    {
        auth()->user()->cars()->save(
            new Car($request->all())
        );

        session()->flash('message', 'You successfully inserted new car');

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Car $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('cars.show')->withCar($car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Car $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('cars.edit')->withCar($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CarUpdateRequest $request
     * @param Car $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarUpdateRequest $request, Car $car)
    {
        $car->update($request->all());

        session()->flash('message', 'Car successfully updated');

        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Car $car
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Car $car)
    {
        $car->delete();

        session()->flash('message', 'You have deleted one record');

        return back();
    }
}
