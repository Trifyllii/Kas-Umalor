<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDagangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dagang', function (Blueprint $table) {
            $table->string('kd_dagang')->primary();
            $table->string('nm_dagang');
            $table->date('tgl_pembelian');
            $table->string('jenis_dagang');
            $table->integer('jml_pembelian');
            $table->double('hrg_beli',15);
            $table->double('hrg_jual',15);
            $table->integer('quantity');
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
        Schema::dropIfExists('dagang');
    }
}