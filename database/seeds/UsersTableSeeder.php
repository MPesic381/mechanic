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
        $admin->password = bcrypt('admin');
        $admin->role()->associate($role_admin);
        $admin->save();

        $client = new User();
        $client->name = 'Abdul Dzabar';
        $client->email = 'dzabulani@habibi.com';
        $client->password = bcrypt('leskovac123');
        $client->role()->associate($role_client);
        $client->save();

        factory(App\User::class, 10)->create();
    }
}
