<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransaksiPenjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_penjualan', function (Blueprint $table) {
            $table->string('ID_TRANSAKSI',20)->primary();
            $table->integer('ID_CABANG')->unsigned();
            $table->integer('ID_PELANGGAN')->unsigned();
            $table->date('TGL_TRANSAKSI');
            $table->double('SUBTOTAL');
            $table->double('DISKON');
            $table->double('GRANDTOTAL');
            $table->string('STATUS_TRANSAKSI',20);
            $table->string('JENIS_TRANSAKSI',2);
            $table->timestamps();
            $table->foreign('ID_CABANG')->references('ID_CABANG')->on('branches')->onUpdate('cascade');
            $table->foreign('ID_PELANGGAN')->references('ID_PELANGGAN')->on('pelanggan')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_penjualan');
    }
}
