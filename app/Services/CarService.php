<?php
    
namespace App\Services;

use App\Car;

class CarService implements CrudableInterface
{
    /**
     * Display a listing of the all cars.
     *
     * @return Car[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        if (auth()->user()->hasRole('client')) {
            return auth()->user()->cars()->get();
        } else {
            return Car::all();
        }
    }
    
    /**
     * Store a newly created car in storage.
     * @param $parameters
     *
     * @return void
     */
    public function make($parameters) : void
    {
        auth()->user()->cars()->save(
            new Car($parameters)
        );
    }
    
    /**
     * Update existing car to database
     *
     * @param $parameters
     * @param $model
     *
     * @return void
     */
    public function update($parameters, $model) : void
    {
        $model->update($parameters);
    }
    
    /**
     * Soft delete existing car from database
     *
     * @param $model
     * @throws \Exception
     *
     * @return void
     */
    public function delete($model) : void
    {
        $model->delete($model);
    }
}