<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->increments('ID_PEGAWAI');
            $table->string('NAMA_PEGAWAI',50);
            $table->string('ALAMAT_PEGAWAI',50);
            $table->string('TELEPON_PEGAWAI',20);
            $table->string('GAJI_PEGAWAI',20);
            $table->integer('id')->unsigned()->nullable();
            $table->integer('ID_CABANG')->unsigned();
            $table->string('ROLE',20);
            
            $table->timestamps();
            
            $table->foreign('id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ID_CABANG')->references('ID_CABANG')->on('branches')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
