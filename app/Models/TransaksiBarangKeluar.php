<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiBarangKeluar extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'id',
        'pp_bm_id',
        'no_pp_bm', // no pp
        'kode_barang',
        'nama_barang',
        'qty',
        'harga_jual',
        'total_penjualan',
        'pembeli',
        'alamat',
        'status_invoice',
    ];


}
