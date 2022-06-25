<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendapatanLainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendapatan_lain', function (Blueprint $table) {
            $table->string('kd_pendapatan_lain')->primary();
            $table->date('tgl_pendapatan_lain');
            $table->string('nm_barang');
            $table->integer('jml_barang');
            $table->double('jml_pendapatan_lain',15);
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
        Schema::dropIfExists('pendapatan_lain');
    }
}