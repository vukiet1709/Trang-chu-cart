<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('users') ->insert([
            [
                'username'=>'user1',
                'email'=>'user1@gmail.com',
                'password'=>Hash::make('123'),
                'role'=>'admin'
            ],
            [
                'username'=>'user2',
                'email'=>'user2@gmail.com',
                'password'=>Hash::make('123456'),
                'role'=>'customer'
            ]
        ]

        );
    }
}
