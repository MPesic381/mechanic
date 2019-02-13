<?php

namespace App\Http\Controllers;

use App\Car;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
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
        auth()->user()->authorizedRoles(['admin', 'client']);

        if (auth()->user()->is('admin')) {
            $cars = Car::all();
        }

        if (auth()->user()->is('client')) {
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
        auth()->user()->authorizedRoles(['admin', 'client']);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        auth()->user()->authorizedRoles(['admin', 'client']);

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
        auth()->user()->authorizedRoles(['admin', 'client']);

        $car = Car::findOrFail($id);

        if (Gate::denies('action', $car)) {
            abort(403, 'You don\'t have access to view this');
        }

        return view('cars.edit')->withCar($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CarUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarUpdateRequest $request, $id)
    {
        auth()->user()->authorizedRoles(['admin', 'client']);

        $car = auth()->user()->cars()->find($id);

        if (Gate::denies('action', $car)) {
            abort(403, 'You don\'t have access to view this');
        }

        $car->update($request->all());

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
        auth()->user()->authorizedRoles(['admin', 'client']);

        $car = auth()->user()->cars()->find($id);

        if (Gate::denies('action', $car)) {
            abort(403, 'You don\'t have access to view this');
        }

        $car->delete();

        session()->flash('message', 'Car successfully deleted');

        return back();
    }
}
