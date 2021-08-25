<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterSupplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'kode_supplier',
        'nama_supplier',
        'alamat',
        'notelp'       
    ];

    public static function getsupplier($id){
        $supplier = MasterSupplier::where('id',$id)->get();
        return $supplier;
    }

    static function getLastID(){
        $getLastData = DB::table('master_suppliers')->orderBy('kode_supplier','DESC')->first();
        if(empty($getLastData)){
            return 'S001';
        }else{
            
            if(empty($getLastData->kode_supplier)){
                return 'S001';
            }else{
    
                $temp = $getLastData->kode_supplier;
                $removeInitial = substr($temp,1);
                $increment = $removeInitial + 1;
                $arrange = 'S'.sprintf('%03d',$increment);
    
                return $arrange;
            }
            
        }
       
    
    
    }
}
