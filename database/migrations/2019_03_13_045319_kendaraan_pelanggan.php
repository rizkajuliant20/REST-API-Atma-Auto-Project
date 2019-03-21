<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KendaraanPelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan_pelanggan', function (Blueprint $table) {
            $table->string('ID_KENDARAAN_PEL',20)->primary();
            $table->string('ID_MOTOR')->nullable();
            $table->foreign('ID_MOTOR')->references('ID_MOTOR')->on('motor')->onUpdate('cascade');
            $table->string('ID_PELANGGAN')->nullable();
            $table->foreign('ID_PELANGGAN')->references('ID_PELANGGAN')->on('pelanggan')->onUpdate('cascade');
            $table->string('NO_PLAT',20);
           
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
        Schema::dropIfExists('kendaraan_pelanggan');
    }
}
