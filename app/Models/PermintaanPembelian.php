<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermintaanPembelian extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'id',
        'no_pp',
        'tgl_pp',
        'master_pembelis_id',
        'kode_barang', 
        'master_barangs_id',
        'qty',
        'harga_beli',
        'total_pembelian',
        'status',   // -- PP = 0 | BM = 1 | BK = 2 --
    ];

    public function master_barang() {
        return $this->hasMany(MasterBarang::class);
    }

    public function master_pembeli() {
        return $this->hasMany(MasterPembeli::class);
    }

    public function scopeFilter($query, $search) {
        return $query->join('master_barangs', 'permintaan_pembelians.master_barangs_id', '=', 'master_barangs.id')
                ->join('master_pembelis', 'permintaan_pembelians.master_pembelis_id', '=', 'master_pembelis.id')
                ->select('permintaan_pembelians.*', 'master_barangs.nama_barang', 'master_pembelis.pembeli')
                ->where('no_pp','like',"%".$search."%")
                ->where('status', 0);
    }

    public function scopeEditForm($query, $id) {
        return $query->join('master_barangs', 'permintaan_pembelians.master_barangs_id', '=', 'master_barangs.id')
                    ->join('master_pembelis', 'permintaan_pembelians.master_pembelis_id', '=', 'master_pembelis.id')
                    ->select('permintaan_pembelians.*', 'master_barangs.nama_barang', 'master_pembelis.pembeli')
                    ->where('permintaan_pembelians.id',$id);
    }

    
}
