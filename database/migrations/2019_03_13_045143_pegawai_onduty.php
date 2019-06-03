<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PegawaiOnduty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_onduty', function (Blueprint $table) {
            $table->increments('ID_PEGAWAI_ONDUTY');
            $table->string('ID_TRANSAKSI');
            $table->integer('ID_PEGAWAI')->unsigned();
            $table->timestamps();
            $table->foreign('ID_TRANSAKSI')->references('ID_TRANSAKSI')->on('transaksi_penjualan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ID_PEGAWAI')->references('ID_PEGAWAI')->on('pegawai')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai_onduty');
    }
}
