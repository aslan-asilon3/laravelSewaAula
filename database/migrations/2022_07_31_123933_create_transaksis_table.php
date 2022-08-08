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
            // $table->unsignedBigInteger('id_user');
            $table->string('image')->default('avatar.jpg');
            $table->string('noktp')->default('7432309234298412');
            $table->string('namapenyewa');
            $table->string('nohppenyewa')->default('085243070700');
            $table->string('emailpenyewa');
            $table->string('alamatpenyewa');
            $table->date('tanggalpemakaiandari');
            $table->date('tanggalpemakaiansampai');
            $table->enum('namaruangan', ['Aula-Utama-I','Aula-Utama-II']);
            $table->enum('keperluan', ['wisuda/yudisium','test/ujian','rapat/pertemuan','perpisahan','pentas seni','bimtek/diklat','pernikahan','seminar']);
            $table->integer('diskon')->default(0);
            $table->integer('totalbayar')->default(2500000);
            $table->string('keterangan');
            $table->timestamps();

            // $table->foreign('id_user')->references('id')->on('users');
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
