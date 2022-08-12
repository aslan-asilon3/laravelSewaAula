<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ruang;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ruangan = [
            [
                'image'         =>'avatar.png',
                'namaruangan'   =>'Aula-Utama-I',
            ],
            [
                'image'         =>'avatar.png',
                'namaruangan'   =>'Aula-Utama-II',
            ],



        ];



        foreach ($ruangan as $key => $value) {

            Ruang::create($value);

        }
    }
}
