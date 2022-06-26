<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaranKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaran_kas', function (Blueprint $table) {
            $table->increments('kd_keluar_kas');
            $table->string('kd_pembelian')->nullable();
            $table->foreign('kd_pembelian')->references('kd_pembelian')->on('pembelian')->onDelete('cascade');
            $table->string('kd_biaya')->nullable();
            $table->foreign('kd_biaya')->references('kd_biaya')->on('biaya')->onDelete('cascade');
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
        Schema::dropIfExists('pengeluaran_kas');
    }
}