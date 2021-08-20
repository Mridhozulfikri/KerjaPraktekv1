<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterBarang extends Model
{
    // protected $table ='kelola_brgs';
    // protected $primarykey ='id';
    // public $incrementing = true;
    // protected $keytype ='int';
    use HasFactory;
    // konfigurasi kolom yang akan diisi
    // table barang masuk
    
    protected $fillable = [
            'id',
            'kode_barang',
            'nama_barang',
            'harga_beli',
            'harga_jual',
            'supplier'
            
    ];

public function permintaan_pembelian(){
    return $this->belongsTo(PermintaanPembelian::class);
}

//Untuk Ajax
public static function getBarang($id){

    $barang = MasterBarang::where('id',$id)->get();
    return $barang;

}

static function getLastID(){
    $getLastData = DB::table('master_barangs')->orderBy('kode_barang','DESC')->first();
    if(empty($getLastData)){
        return 'B001';
    }else{
        
        if(empty($getLastData->kode_barang)){
            return 'B001';
        }else{

            $temp = $getLastData->kode_barang;
            $removeInitial = substr($temp,1);
            $increment = $removeInitial + 1;
            $arrange = 'B'.sprintf('%03d',$increment);

            return $arrange;
        }
        
    }
   


}
}
