<?php

namespace App\Http\Controllers;

use App\Car;
use App\Http\Requests\WorkStoreRequest;
use App\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * WorkController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Work::class, 'work');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @param Car $car
     * @return \Illuminate\Http\Response
     */
    public function create(Car $car)
    {
        return view('works.create')
            ->withCar($car);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param Car $car
     * @param WorkStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Car $car, WorkStoreRequest $request)
    {
        $car->works()->save(
            new Work($request->all())
        );
        
        return redirect()->route('cars.show', compact('car'));
    }
}
