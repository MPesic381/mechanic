<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only(['create', 'store']);
    }

    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|max:20',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed'
        ]);


        $user = new User();

        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));

        $user->save();

        // Nije mi jasno zasto ovo nece

//        $user = User::create(request([
//            'name' => request('name'),
//            'email' => request('email'),
//            'password' => bcrypt(request('password')),
//        ]));


        auth()->login($user);

        return redirect('/');
    }
}
