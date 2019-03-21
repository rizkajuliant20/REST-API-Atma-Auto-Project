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
            $table->string('ID_PEGAWAI',20)->primary();
            $table->string('ID_CABANG')->nullable();
            $table->foreign('ID_CABANG')->references('ID_CABANG')->on('branches')->onUpdate('cascade');
            $table->string('NAMA_PEGAWAI',50);
            $table->string('ALAMAT_PEGAWAI',50);
            $table->string('TELEPON_PEGAWAI',20);
            $table->string('GAJI_PEGAWAI',20);
            $table->string('USERNAME',20);
            $table->string('PASSWORD',9);
            $table->string('ROLE',20);
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
        Schema::dropIfExists('pegawai');
    }
}
