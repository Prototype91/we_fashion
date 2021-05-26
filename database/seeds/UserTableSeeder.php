<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'edouard',
                'email' => 'edouard@edouard.fr',
                'password' => Hash::make('edouard'),
                'elevation' => 'admin'
            ], 
            [
                'name' => 'dylan',
                'email' => 'dylan@dylan.fr',
                'password' => Hash::make('dylan'),
                'elevation' => 'user'
            ]
        ]);
    }
}
