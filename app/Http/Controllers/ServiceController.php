<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Service;
use App\Services\ServiceService;

class ServiceController extends Controller
{
    /**
     * @var ServiceService
     */
    protected $service;
    
    /**
     * ServiceController constructor.
     */
    public function __construct()
    {
        $this->middleware('role:admin');
        
        $this->service = new ServiceService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = $this->service->all();

        return view('services.index')
            ->withServices($services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ServiceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceStoreRequest $request)
    {
        $this->service->make($request->validated());
        
        return redirect()->route('services.index')
            ->withMessage('New service successfully inserted');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('services.edit')->withService($service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ServiceUpdateRequest $request
     * @param Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceUpdateRequest $request, Service $service)
    {
        $this->service->update($request->validated(), $service);
        
        return redirect()
            ->route('services.index')
            ->withMessage('Service successfully updated');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Service $service)
    {
        $this->service->delete($service);

        return back()
            ->withMessage('You have deleted one record');
    }
}
