<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{

    public function run()

    {

        $user = [
            [
                'image'=>'avatar.png',

                'name'=>'aslanadmin',

                'email'=>'aslanadmin@gmail.com',

                 'is_admin'=>'admin',

                'password'=> bcrypt('aslanadmin'),

            ],

            [

               'image'=>'avatar.png',

               'name'=>'aslanreservator',

               'email'=>'aslanreservator@gmail.com',

                'is_admin'=>'reservator',

               'password'=> bcrypt('aslanreservator'),

            ],
            [

               'image'=>'avatar.png',

               'name'=>'aslankepalapuskesmas',

               'email'=>'aslankepalapuskesmas@gmail.com',

                'is_admin'=>'kepalapuskesmas',

               'password'=> bcrypt('aslankepalapuskesmas'),

            ],

            [

               'image'=>'avatar.png',

               'name'=>'aslanpenyewa',

               'email'=>'aslanpenyewa@gmail.com',

                'is_admin'=>'user',

               'password'=> bcrypt('aslanpenyewa'),

            ],

        ];



        foreach ($user as $key => $value) {

            User::create($value);

        }

    }
}
