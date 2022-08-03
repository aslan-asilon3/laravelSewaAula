<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;


    protected $fillable = [
        'image',
        'noktp',
        'namapenyewa',
        'nohppenyewa',
        'emailpenyewa',
        'alamatpenyewa',
        'tanggalpemakaiandari',
        'tanggalpemakaiansampai',
        'namaruangan',
        'keperluan',
        'diskon',
        'totalbayar',
        'keterangan',
    ];

    // public static function getBatch()
    // {
    //     return Transaksi::select('namaruangan')->groupBy('namaruangan')->orderBy('namaruangan', 'asc')->get();
    // }
}
