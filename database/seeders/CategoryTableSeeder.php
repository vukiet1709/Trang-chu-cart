<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category') ->insert([
            [
                'category_name'=>Str::random(4) . ' ' . Str::random(5),
                'description'=> Str::random(20)
            ],
            [

                'category_name'=>Str::random(4) . ' ' . Str::random(5),
                'description'=> Str::random(20)
            ]
        ]

        );
    }
}
