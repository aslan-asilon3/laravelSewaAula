<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('noktp')->default('7432309234298412');
            $table->string('namapenyewa');
            $table->string('nohppenyewa')->default('085243070700');
            $table->string('emailpenyewa');
            $table->string('alamatpenyewa');
            $table->date('tanggalpemakaiandari');
            $table->date('tanggalpemakaiansampai');
            $table->enum('namaruangan', ['Aula-Utama-I','Aula-Utama-II']);
            $table->enum('keperluan', ['wisuda/yudisium','test/ujian','seminar','rapat/pertemuan','perpisahan','pentas seni','bimtek/diklat']);
            $table->integer('diskon')->default(0);
            $table->integer('totalbayar')->default(0);
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
