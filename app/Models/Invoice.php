<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table ='transaksi_barang_keluars';
    protected $primarykey ='id';
    public $incrementing = true;
    protected $keytype ='int';
    protected $fillable = [
        'id','status_invoice'
       
        
];

    public static function getInvoice($id){

        $invoice = TransaksiBarangKeluar::where('id',$id)->get();
        return $invoice;
        

    }
}
