<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PemesananSparepart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_sparepart', function (Blueprint $table) {
            $table->increments('ID_PEMESANAN');
            $table->integer('ID_SUPPLIER')->unsigned();
            $table->date('TGL_PEMESANAN');
            $table->double('GRANDTOTAL_PEMESANAN');
            $table->string('STATUS_PEMESANAN');
            $table->timestamps();

            $table->foreign('ID_SUPPLIER')->references('ID_SUPPLIER')->on('supplier')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan_sparepart');
    }
}
