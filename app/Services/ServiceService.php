<?php

namespace App\Services;

use App\Service;

class ServiceService implements CrudableInterface
{
    
    /**
     * Display a listing of the all resources.
     *
     * @return Service[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Service::all();
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param $parameters
     *
     * @return void
     */
    public function make($parameters): void
    {
        Service::create($parameters);
    }
    
    /**
     * Update existing resource to storage
     *
     * @param $parameters
     * @param $model
     *
     * @return void
     */
    public function update($parameters, $model): void
    {
        $model->update($parameters);
    }
    
    /**
     * Soft delete existing resource from storage
     *
     * @param $model
     * @throws \Exception
     *
     * @return void
     */
    public function delete($model): void
    {
        $model->delete($model);
    }
}