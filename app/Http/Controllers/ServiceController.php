<?php

namespace App\Http\Controllers;

use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        auth()->user()->authorizedRoles('admin');

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
        auth()->user()->authorizedRoles('admin');

        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        auth()->user()->authorizedRoles('admin');

        $request->validate([
            'name' => 'required|max:20',
            'warranty' => 'required|numeric|max:150000',
            'cost' => 'required|numeric|max:50000'
        ]);

        Service::create($request->all());

        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);

        return view('services.show')->withService($service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        auth()->user()->authorizedRoles('admin');

        $service = Service::findOrFail($id);

        return view('services.edit')->withService($service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        auth()->user()->authorizedRoles('admin');

        $request->validate([
            'name' => 'required|max:20',
            'warranty' => 'required|numeric|max:150000',
            'cost' => 'required|numeric|max:50000'
        ]);

        Service::findOrFail($id)->update($request->all([
            'name', 'time_required', 'warranty', 'cost'
        ]));

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
        auth()->user()->authorizedRoles('admin');

        Service::destroy($id);

        session()->flash('message', 'You have deleted one record');

        return back();
    }
}
