<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Supplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->increments('ID_SUPPLIER');
            $table->string('NAMA_SUPPLIER',40);
            $table->string('ALAMAT_SUPPLIER',60);
            $table->string('TELEPON_SUPPLIER',13);
            $table->string('NAMA_SALES',40);
            $table->string('TELEPON_SALES',13);
        
           
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
        Schema::dropIfExists('supplier');
    }
}
