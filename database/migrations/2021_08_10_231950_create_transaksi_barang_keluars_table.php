<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiBarangKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_barang_keluars', function (Blueprint $table) {
            $table->id();
            $table->integer('pp_bm_id'); // id PP yg status barang sdh masuk
            $table->integer('no_pp_bm'); // no PP yg status barang sdh masuk
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->bigInteger('qty');
            $table->bigInteger('harga_jual');
            $table->bigInteger('total_penjualan');
            $table->string('pembeli');
            $table->string('alamat');
            $table->integer('status_invoice')->default(0);
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
        Schema::dropIfExists('transaksi_barang_keluars');
    }
}
