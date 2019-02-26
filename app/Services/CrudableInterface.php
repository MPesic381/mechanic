<?php
    
namespace App\Services;

interface CrudableInterface
{
    /**
     * Display a listing of the all resources.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();
    
    /**
     * Store a newly created resource in storage.
     *
     * @param $parameters
     *
     * @return void
     */
    public function make($parameters): void;
    
    /**
     * Update existing resource to storage
     *
     * @param $parameters
     * @param $model
     *
     * @return void
     */
    public function update($parameters, $model): void;
    
    /**
     * Soft delete existing resource from storage
     *
     * @param $model
     * @throws \Exception
     *
     * @return void
     */
    public function delete($model) : void;
}