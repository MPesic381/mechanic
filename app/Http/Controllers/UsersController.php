<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
    }

    public function create()
    {
        return view('register');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|max:20',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed'
        ]);

        $user = User::create(request([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]));

        auth()->login($user);

        return redirect('/');
    }
}
