<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Retrieve a user based on given parameter
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $name = request('name');
    
        $user = User::where('name', 'like', '%' . $name . '%')->get();
    
        return response()->json($user, 200);
    }
}
