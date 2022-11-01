<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
        [
            'name'=>'admin', 
            'email'=>'admin@gmail.com',
            'role_id'=> 1,
            'password'=> Hash::make('admin1234'),

        ]
        );
    //    DB::table('admin')->insert(
    //     [
    //         'name'=>'admin2',
    //         'email'=>'admin2@gmail.com',
    //         'password'=>bcrypt('admin2@gmail.com'),

    //     ]

    //    );
    }
}
