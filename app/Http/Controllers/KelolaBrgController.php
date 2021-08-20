<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelolaBrg;
use Illuminate\Support\Facades\DB;

class KelolaBrgController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $barangmasuks = DB::table('kelola_brgs')->get();
       

        $lastID = KelolaBrg::getLastID();
      
        return view('masterbarang',["lastID"=>$lastID], compact('barangmasuks'));
    }

   
    public function generatePDFlbm(Request $request)

    {
        
        $lbm = BarangMasuk::all();
        
  
        
        $pdf = PDF::loadView('lbm',compact('lbm'));
        // return $pdf->download('suratjalan-pdf.pdf');
        // return view('lbm', compact('lbm'));
        // $barang = Barangkeluar::truncate();
        return $pdf->stream();
        

    }

   
    public function store(Request $request)
    {
        
       dd($request);
        // $inven->save();
        $barangmasuk->save();
        
        return redirect('KelolaBRG')->with('added_success', 'Data Berhasil di Input');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = KelolaBrg::getBarang($id);
        
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
        $barang = KelolaBrg::where('id', $request->get('id'))
        ->update([
            // kiri nama tabel database yang kanan name di modal
            'kodebarang' => $request->get('kode_barang'),
            'namabarang' => $request->get('namabrg'),
            'hargabeli' => $request->get('hrgbeli'),
            'hargajual' => $request->get('hrgjual'),
            'tersediadi' => $request->get('tersediadi'),
            
        ]);
      

        return redirect('KelolaBRG')->with('updated_success', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $Barang = KelolaBrg::where('id', $request->get('id'))
        ->delete();
        // $inven = Inventory::where('id', $request->get('id'))
        // ->delete();

        

        return redirect('KelolaBRG')->with('deleted_success', 'Data berhasil dihapus');
    }  /* @return \Illuminate\Http\Response */
    public function create()
    {
        //
    }
  
}
