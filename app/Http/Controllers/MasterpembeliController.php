<?php

namespace App\Http\Controllers;

use App\Models\MasterPembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterPembeliController extends Controller
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
		$pembeli = MasterPembeli::where('pembeli','like',"%".$search."%")
        ->get();         

        $lastID = MasterPembeli::getLastID();
      
        return view('pages.masters.masterpembeli',["lastID"=>$lastID], compact('pembeli'));
   
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
          $pembeli = $request->all();
          MasterPembeli::create($pembeli);
         
 
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
        
         
         return redirect('/masterpembeli')->with('added_success', 'Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterPembeli  $masterpembeli
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembeli = MasterPembeli::getpembeli($id);
        
        return response()->json($pembeli);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterPembeli  $masterpembeli
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterPembeli $masterpembeli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterPembeli  $masterpembeli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        MasterPembeli::where('id', $request->get('id'))
        ->update([
            // kiri nama tabel database yang kanan name di modal
            'pembeli' => $request->get('pmbli'),
            'alamat' => $request->get('alamt'),
           
            
        ]);
        
      

        return redirect('/masterpembeli')->with('updated_success', 'Data Berhasil di Ubah');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterPembeli  $masterpembeli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        
        $pembeli = MasterPembeli::where('id', $request->get('id'))
        ->delete();

        return redirect('/masterpembeli')->with('deleted_success', 'Data berhasil dihapus');
    }
}
