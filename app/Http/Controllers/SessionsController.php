<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
    }

    public function create()
    {
        return view('login');
    }

    public function store()
    {
        if (! auth()->attempt(request(['name', 'password']))) {
            return back()->withErrors([
                'message' => 'Please check your credentials'
            ]);
        }

        return redirect('/');
    }
}
