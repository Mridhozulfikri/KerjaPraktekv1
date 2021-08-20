<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PcsOrder extends Model
{
    protected $table ='pcs_orders';
    protected $primarykey ='id';
    public $incrementing = true;
    protected $keytype ='int';
    
    // konfigurasi kolom yang akan diisi
    // table barang masuk
    
    protected $fillable = [
        //nama tabel di database
        'id',
        'tanggal',
        'pemesan',
        'namabarang',
        'qty', 
        
    ];

public function barangkeluar(){
    return $this->hasOne(KelolaBrg::class);
}

//Untuk Ajax
public static function getBarang($id){

    $barang = PcsOrder::where('id',$id)->get();
    return $barang;

}

static function getLastID(){
    $getLastData = DB::table('pcs_orders')->orderBy('id','DESC')->first();
    if(empty($getLastData)){
        return '1';
    }else{
        
        if(empty($getLastData->kodebarang)){
            return '1';
        }else{

            $temp = $getLastData->id;
            $removeInitial = substr($temp,1);
            $increment = $removeInitial + 1;
            $arrange = '1'.sprintf('%03d',$increment);

            return $arrange;
        }
        
    }
   


}
}
