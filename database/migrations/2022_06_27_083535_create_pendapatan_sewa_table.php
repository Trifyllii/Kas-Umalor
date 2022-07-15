<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendapatanSewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendapatan_sewa', function (Blueprint $table) {
            $table->string('kd_pendapatan_sewa')->primary();
            $table->date('tgl_pendapatan_sewa');
            $table->string('nm_ikan');
            $table->integer('jml_penyewa')->default('1');
            $table->double('jml_pendapatan_sewa',15);
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
        Schema::dropIfExists('pendapatan_sewa');
    }
}