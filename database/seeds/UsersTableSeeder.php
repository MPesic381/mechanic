<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_client = Role::where('name', 'client')->first();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@mechanic.com';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->role()->associate($role_admin);

        $client = new User();
        $client->name = 'Abdul Dzabar';
        $client->email = 'dzabulani@habibi.com';
        $client->password = bcrypt('secret');
        $client->save();
        $client->role()->associate($role_client);
    }
}
