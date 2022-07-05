<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas', function (Blueprint $table) {
            $table->increments('kd_kas');
            $table->date('tgl_transaksi')->nullable();
            $table->string('ket_transaksi')->nullable();
            $table->unsignedInteger('kd_terima_kas')->nullable();
            $table->foreign('kd_terima_kas')->references('kd_terima_kas')->on('penerimaan_kas')->onDelete('cascade');
            $table->unsignedInteger('kd_keluar_kas')->nullable();
            $table->foreign('kd_keluar_kas')->references('kd_keluar_kas')->on('pengeluaran_kas')->onDelete('cascade');
            $table->double('debet')->nullable()->default('0');
            $table->double('kredit')->nullable()->default('0');
            #$table->double('saldo')->nullable();
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
        Schema::dropIfExists('kas');
    }
}