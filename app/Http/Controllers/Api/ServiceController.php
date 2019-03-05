<?php

namespace App\Http\Controllers\Api;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * ServiceController constructor.
     */
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
        $name = request('name');
        
        $services = Service::where('name', 'like', '%' . $name . '%')->get();

        return response()->json($services, 200);
    }
}
