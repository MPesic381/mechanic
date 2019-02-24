<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Service;

class ServiceController extends Controller
{

    /**
     * ServiceController constructor.
     */
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return view('services.index')->withServices($services);
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
        Service::create($request->all());

        return redirect()->route('services.index');
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
        $service->update($request->all());

        session()->flash('message', 'Service successfully updated');

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::destroy($id);

        session()->flash('message', 'You have deleted one record');

        return back();
    }
}
