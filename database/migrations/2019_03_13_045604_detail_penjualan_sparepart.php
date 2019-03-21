<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetailPenjualanSparepart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penjualan_sparepart', function (Blueprint $table) {
            $table->string('ID_PENJUALAN_SPAREPART',20)->primary();
            $table->string('ID_TRANSAKSI')->nullable();
            $table->foreign('ID_TRANSAKSI')->references('ID_TRANSAKSI')->on('transaksi_penjualan')->onUpdate('cascade');
            $table->string('ID_SPAREPARTS')->nullable();
            $table->foreign('ID_SPAREPARTS')->references('ID_SPAREPARTS')->on('sparepart')->onUpdate('cascade');
            $table->string('ID_MONTIR_ONDUTY')->nullable();
            $table->foreign('ID_MONTIR_ONDUTY')->references('ID_MONTIR_ONDUTY')->on('montir_onduty')->onUpdate('cascade');
           $table->integer('JUMLAH_SPAREPART');
           $table->double('SUBTOTAL_SPAREPART');
            $table->double('HARGA_TAMPUNG_JUAL');
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
        Schema::dropIfExists('detail_penjualan_sparepart');
    }
}
