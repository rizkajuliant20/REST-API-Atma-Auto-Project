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
            $table->string('ID_TRANSAKSI',8)->primary();
            $table->string('ID_CABANG')->nullable();
            $table->foreign('ID_CABANG')->references('ID_CABANG')->on('branches')->onUpdate('cascade');
            $table->string('ID_PELANGGAN')->nullable();
            $table->foreign('ID_PELANGGAN')->references('ID_PELANGGAN')->on('pelanggan')->onUpdate('cascade');
            $table->date('TGL_TRANSAKSI');
            $table->double('SUBTOTAL');
            $table->double('DISKON');
            $table->double('GRANDTOTAL');
            $table->string('STATUS_TRANSAKIS',20);
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
        Schema::dropIfExists('transaksi_penjualan');
    }
}
