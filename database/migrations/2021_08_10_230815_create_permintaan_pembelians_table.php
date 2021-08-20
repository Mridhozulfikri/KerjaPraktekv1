<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaanPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_pembelians', function (Blueprint $table) {
            $table->id();
            $table->integer('no_pp');
            $table->date('tgl_pp');
            $table->integer('master_pembelis_id');
            $table->string('kode_barang');
            $table->integer('master_barangs_id');
            $table->bigInteger('qty');
            $table->bigInteger('harga_beli');
            $table->bigInteger('total_pembelian');
            $table->integer('status')->default(0); // PP = 0 | BM = 1 | BK = 2
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
        Schema::dropIfExists('permintaan_pembelians');
    }
}
