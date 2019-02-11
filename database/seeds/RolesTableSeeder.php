<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('utc')->toDateTimeString();

        $data = [
            [
                'name' => 'admin',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'client',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'blocked',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ];

        DB::table('roles')->insert($data);
    }
}
