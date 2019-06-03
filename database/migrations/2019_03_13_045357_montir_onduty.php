<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MontirOnduty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('montir_onduty', function (Blueprint $table) {
            $table->increments('ID_MONTIR_ONDUTY');
            $table->integer('ID_PEGAWAI')->unsigned();
            $table->integer('ID_KENDARAAN_PEL')->unsigned();    
            $table->timestamps();
            $table->foreign('ID_PEGAWAI')->references('ID_PEGAWAI')->on('pegawai')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ID_KENDARAAN_PEL')->references('ID_KENDARAAN_PEL')->on('kendaraan_pelanggan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('montir_onduty');
    }
}
