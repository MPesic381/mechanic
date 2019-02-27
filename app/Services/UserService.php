<?php
    
namespace App\Services;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function make($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => Role::where('name', 'client')->first()->id
        ]);
    }
}