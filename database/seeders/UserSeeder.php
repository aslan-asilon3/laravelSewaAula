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

                'name'=>'admin',

                'email'=>'admin@gmail.com',

                 'is_admin'=>'admin',

                'password'=> bcrypt('admin'),

            ],

            [

               'image'=>'avatar.png',

               'name'=>'reservator',

               'email'=>'reservator@gmail.com',

                'is_admin'=>'reservator',

               'password'=> bcrypt('reservator'),

            ],
            [

               'image'=>'avatar.png',

               'name'=>'kepalapuskesmas',

               'email'=>'kepalapuskesmas@gmail.com',

                'is_admin'=>'kepalapuskesmas',

               'password'=> bcrypt('kepalapuskesmas'),

            ],

            [

               'image'=>'avatar.png',

               'name'=>'penyewa',

               'email'=>'penyewa@gmail.com',

                'is_admin'=>'user',

               'password'=> bcrypt('penyewa'),

            ],

        ];



        foreach ($user as $key => $value) {

            User::create($value);

        }

    }
}
