<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetailPenjualanJasa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penjualan_jasa', function (Blueprint $table) {
            $table->string('ID_DETAIL_PENJUALAN_JASA',20)->primary();
            $table->string('ID_TRANSAKSI')->nullable();
            $table->foreign('ID_TRANSAKSI')->references('ID_TRANSAKSI')->on('transaksi_penjualan')->onUpdate('cascade');
            $table->integer('ID_JASA')->unsigned();
            $table->foreign('ID_JASA')->references('ID_JASA')->on('jasa_service')->onUpdate('cascade');
            $table->integer('ID_MONTIR_ONDUTY')->unsigned();
            $table->foreign('ID_MONTIR_ONDUTY')->references('ID_MONTIR_ONDUTY')->on('montir_onduty')->onUpdate('cascade');
            $table->double('SUBTOTAL_JASA');
            $table->string('STATUS_JASA',20);
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
        Schema::dropIfExists('detail_penjualan_jasa');
    }
}
