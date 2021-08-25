<?php

namespace App\Http\Controllers;

use App\Models\MasterSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterSupplierController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // menangkap data pencarian
		$search = $request->search;

    	// mengambil data dari table sesuai pencarian data
		$supplier = MasterSupplier::where('nama_supplier','like',"%".$search."%")
        ->get();         

        $lastID = MasterSupplier::getLastID();
      
        return view('pages.masters.mastersupplier',["lastID"=>$lastID], compact('supplier'));
        return view('pages.masters.mastersupplier', [
            'lastID' => $lastID,
            'supplier' => $supplier
        ]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    
    public function store(Request $request)
    {
         //cara 1
          $supplier = $request->all();
          MasterSupplier::create($supplier);
         
 
         //cara 2

         //kiri tabel db , kanan "name" di modal
        //  $pembeli = new MasterPembeli;
        //  $pembeli->pembeli = $request->get('pmbli');
        //  $pembeli->alamat = $request->get('almt');
        //  $pembeli->save();

         
         // $barangmasuk->jumlah_keseluruhan = null;
         // $inven->kode_barang = $request->get('kode_barang');
         // $inven->nama_barang = $request->get('namabrg');
         // $inven->qty = $request->get('qty');
         // $inven->harga_satuan = $request->get('hrgsatuan');
 
         // $tot = $request->get('qty');
         // $tit = $request->get('hrgsatuan');
         // $toet = $tot * $tit;
         // $inven->total = $toet;
 
         // $inven->save();
        
         
         return redirect('/mastersupplier')->with('added_success', 'Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterPembeli  $masterpembeli
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = MasterSupplier::getsupplier($id);
        
        return response()->json($supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterSupplier  $masterpembeli
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterSupplier $mastersupplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterSupplier  $masterpembeli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        MasterSupplier::where('id', $request->get('id'))
         ->update([
             // kiri nama tabel database, yang kanan name di modal
             'kode_supplier' => $request->get('kode_supplier'),
             'nama_supplier' => $request->get('namasup'),
             'alamat' => $request->get('almt'),
             'notelp' => $request->get('notelp'),
             
         ]);      
       
         return redirect('/mastersupplier')->with('updated_success', 'Data Berhasil di Ubah');
     }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterSupplier  $masterpembeli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        
        $pembeli = MasterSupplier::where('id', $request->get('id'))
        ->delete();

        return redirect('/mastersupplier')->with('deleted_success', 'Data berhasil dihapus');
    }
}
