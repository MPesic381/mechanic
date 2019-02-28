<?php

namespace App\Http\Controllers;

use App\Car;
use App\Http\Requests\WorkStoreRequest;
use App\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Car $car, WorkStoreRequest $request)
    {
//        return $request->all();
        
        $car->works()->save(
            new Work($request->all())
        );
        
//        return redirect('/cars/' . $car->id);
        
        return redirect()->route('cars.show', compact('car'));
    }
}
