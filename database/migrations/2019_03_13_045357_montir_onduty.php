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
            $table->string('ID_MONTIR_ONDUTY',20)->primary();
            $table->string('ID_PEGAWAI')->nullable();
            $table->foreign('ID_PEGAWAI')->references('ID_PEGAWAI')->on('pegawai')->onUpdate('cascade');
            $table->string('ID_KENDARAAN_PEL')->nullable();
            $table->foreign('ID_KENDARAAN_PEL')->references('ID_KENDARAAN_PEL')->on('kendaraan_pelanggan')->onUpdate('cascade');
           
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
        Schema::dropIfExists('montir_onduty');
    }
}
