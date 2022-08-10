<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use Carbon\Carbon;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $transaksi = [
            [
                'image'=>'avatar.png',
                'noktp'=>'7432309234298412',
                'namapenyewa'=>'sulaslan setiawan',
                'nohppenyewa'=> '085243070700',
                'emailpenyewa'=>'sulaslansetiawan1@gmail.com',
                'alamatpenyewa'=>'Jl Jaksa, Jakarta pusat',
                'tanggalpemakaiandari'=>Carbon::parse('2022-07-07'),
                'tanggalpemakaiansampai'=>Carbon::parse('2022-07-08'),
                'namaruangan'=>'Aula-Utama-I',
                'keperluan'=>'seminar',
                'totalbayar'=> 2500000,
                'keterangan'=>'-',

            ],
            [
                'image'=>'avatar.png',
                'noktp'=>'0335059282744952',
                'namapenyewa'=>'Nikita Willy',
                'nohppenyewa'=> '082238489121',
                'emailpenyewa'=>'nikitawilly@gmail.com',
                'alamatpenyewa'=>'Jl Pesangrahan, Jakarta pusat',
                'tanggalpemakaiandari'=>Carbon::parse('2022-07-12'),
                'tanggalpemakaiansampai'=>Carbon::parse('2022-07-14'),
                'namaruangan'=>'Aula-Utama-II',
                'keperluan'=>'rapat/pertemuan',
                'totalbayar'=> 2500000,
                'keterangan'=>'-',

            ],
            [
                'image'=>'avatar.png',
                'noktp'=>'0335059282744952',
                'namapenyewa'=>'Andi',
                'nohppenyewa'=> '082238489121',
                'emailpenyewa'=>'andi@gmail.com',
                'alamatpenyewa'=>'Jl Medan Merdeka, Jakarta pusat',
                'tanggalpemakaiandari'=>Carbon::parse('2022-07-12'),
                'tanggalpemakaiansampai'=>Carbon::parse('2022-07-14'),
                'namaruangan'=>'Aula-Utama-II',
                'keperluan'=>'bimtek/diklat',
                'totalbayar'=> 2500000,
                'keterangan'=>'-',

            ],
            [
                'image'=>'avatar.png',
                'noktp'=>'0335059282744952',
                'namapenyewa'=>'Dina',
                'nohppenyewa'=> '082238489121',
                'emailpenyewa'=>'Dina@gmail.com',
                'alamatpenyewa'=>'Jl Raya Bogor, Jakarta barat',
                'tanggalpemakaiandari'=>Carbon::parse('2022-07-12'),
                'tanggalpemakaiansampai'=>Carbon::parse('2022-07-14'),
                'namaruangan'=>'Aula-Utama-I',
                'keperluan'=>'wisuda/yudisium',
                'totalbayar'=> 2500000,
                'keterangan'=>'-',

            ],
            [
                'image'=>'avatar.png',
                'noktp'=>'0335059282744952',
                'namapenyewa'=>'Erik',
                'nohppenyewa'=> '082238489121',
                'emailpenyewa'=>'Erik@gmail.com',
                'alamatpenyewa'=>'Jl Raya Bogor, Jakarta barat',
                'tanggalpemakaiandari'=>Carbon::parse('2022-07-12'),
                'tanggalpemakaiansampai'=>Carbon::parse('2022-07-14'),
                'namaruangan'=>'Aula-Utama-I',
                'keperluan'=>'Pernikahan',
                'totalbayar'=> 2500000,
                'keterangan'=>'-',

            ],

        ];



        foreach ($transaksi as $key => $value) {

            Transaksi::create($value);

        }


    }
}
