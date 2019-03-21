<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetailPemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pemesanan', function (Blueprint $table) {
            $table->increments('ID_DETAIL_PEMESANAN');
            $table->string('ID_SPAREPARTS');
            $table->foreign('ID_SPAREPARTS')->references('ID_SPAREPARTS')->on('sparepart')->onUpdate('cascade');
            $table->integer('ID_PEMESANAN')->unsigned();
            $table->foreign('ID_PEMESANAN')->references('ID_PEMESANAN')->on('pemesanan_sparepart')->onUpdate('cascade');
            $table->integer('JUMLAH_PEMESANAN');
            $table->double('HARGA_BELI_PEMESANAN');
            $table->string('SATUAN',20);
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
        Schema::dropIfExists('detail_pemesanan');
    }
}
