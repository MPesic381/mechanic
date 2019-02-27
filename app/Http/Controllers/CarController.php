<?php

namespace App\Http\Controllers;

use App\Car;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Services\CarService;

class CarController extends Controller
{
    protected $service;

    /**
     * CarController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin,client']);
        $this->authorizeResource(Car::class, 'car');
        
        $this->service = new CarService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cars = $this->service->all();
        
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
        $this->service->make($request->validated());
        
        return redirect()->route('cars.index')
            ->withMessage('You successfully inserted new car');
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
        $this->service->update($request->validated(), $car);
        
        $car->update($request->all());

        return redirect()->route('cars.index')
            ->withMessage('Car successfully updated');
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
        $this->service->delete($car);

        return back()
            ->withMessage('You have deleted one record');
    }
}
