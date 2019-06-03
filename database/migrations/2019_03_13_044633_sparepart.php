<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sparepart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sparepart', function (Blueprint $table) {
            $table->string('ID_SPAREPARTS',20)->primary();
            $table->string('KODE_PENEMPATAN');
            $table->string('NAMA_SPAREPART',20);
            $table->double('HARGA_BELI');
            $table->double('HARGA_JUAL');
            $table->integer('STOK_MINIMAL');
            $table->integer('STOK_BARANG');
            $table->string('GAMBAR',255)->nullable();
            $table->string('TIPE',20);
        
            $table->timestamps();
            $table->foreign('KODE_PENEMPATAN')->references('KODE_PENEMPATAN')->on('posisi')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sparepart');
    }
}
