<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterPembeli extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'pembeli',
        'alamat'    
    ];


    public function permintaan_pembelian() {
        return $this->belongsTo(PermintaanPembelian::class);
    }

    //ajaxcui
    public static function getpembeli($id){
        $pembeli = MasterPembeli::where('id',$id)->get();
        return $pembeli;
    }

    static function getLastID(){
        $getLastData = DB::table('master_pembelis')->orderBy('id','DESC')->first();
        if(empty($getLastData)){
            return '1';
        }else{
            if(empty($getLastData->id)){
                return '1';
            }else{
                $temp = $getLastData->id;
                $removeInitial = substr($temp,1);
            }
        }
    }

}