<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaanKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan_kas', function (Blueprint $table) {
            $table->increments('kd_terima_kas');
            $table->string('kd_pendapatan_sewa')->nullable();
            $table->foreign('kd_pendapatan_sewa')->references('kd_pendapatan_sewa')->on('pendapatan_sewa')->onDelete('cascade');
            $table->string('kd_pendapatan_lain')->nullable();
            $table->foreign('kd_pendapatan_lain')->references('kd_pendapatan_lain')->on('pendapatan_lain')->onDelete('cascade');
            $table->date('tgl_transaksi')->nullable();
            $table->string('ket_transaksi')->nullable();
            $table->double('jml_transaksi')->nullable();
            $table->timestamps(); 
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penerimaan_kas');
    }
}