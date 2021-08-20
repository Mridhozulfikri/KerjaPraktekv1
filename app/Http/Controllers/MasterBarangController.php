<?php

namespace App\Http\Controllers;

use App\Models\MasterBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterBarangController extends Controller
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
		$barang = MasterBarang::where('nama_barang','like',"%".$search."%")
        ->get();         

        $lastID = MasterBarang::getLastID();
      
        return view('pages.masters.masterbarang', [
            'lastID' => $lastID,
            'barang' => $barang
        ]);
    }

   
    // public function generatePDFlbm(Request $request)

    // {
        
    //     $lbm = BarangMasuk::all();
        
  
        
    //     $pdf = PDF::loadView('lbm',compact('lbm'));
        
    //     return $pdf->stream();
        

    // }

   
    public function store(Request $request)
    {

        //cara 1
        $barang = $request->all();
        MasterBarang::create($barang);

        //cara 2        
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
        
        return redirect('/Masterbrg')->with('added_success', 'Data Berhasil di Input');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = MasterBarang::getBarang($id);
        
        return response()->json($barang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
       MasterBarang::where('id', $request->get('id'))
        ->update([
            // kiri nama tabel database, yang kanan name di modal
            'kode_barang' => $request->get('kode_barang'),
            'nama_barang' => $request->get('namabrg'),
            'harga_beli' => $request->get('hrgbeli'),
            'harga_jual' => $request->get('hrgjual'),
            'supplier' => $request->get('supplier'),
            
        ]);      
      
        return redirect('/Masterbrg')->with('updated_success', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
       MasterBarang::where('id', $request->get('id'))->delete();     

        return redirect('/Masterbrg')->with('deleted_success', 'Data berhasil dihapus');
    }  
    

    /* @return \Illuminate\Http\Response */
    public function create()
    {
        //
    }
  
}
