<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KelolaBrg extends Model
{
    protected $table ='kelola_brgs';
    protected $primarykey ='id';
    public $incrementing = true;
    protected $keytype ='int';
    
    // konfigurasi kolom yang akan diisi
    // table barang masuk
    
    protected $fillable = [
        'id',
        'kodebarang',
        'namabarang',
        'hargabeli',
        'hargajual', 
        'tersediadi'
    ];

public function barangkeluar(){
    return $this->hasOne(KelolaBrg::class);
}

//Untuk Ajax
public static function getBarang($id){

    $barang = KelolaBrg::where('id',$id)->get();
    return $barang;

}

static function getLastID(){
    $getLastData = DB::table('kelola_brgs')->orderBy('kodebarang','DESC')->first();
    if(empty($getLastData)){
        return 'B001';
    }else{
        
        if(empty($getLastData->kodebarang)){
            return 'B001';
        }else{

            $temp = $getLastData->kodebarang;
            $removeInitial = substr($temp,1);
            $increment = $removeInitial + 1;
            $arrange = 'B'.sprintf('%03d',$increment);

            return $arrange;
        }
        
    }
   


}
}

    

