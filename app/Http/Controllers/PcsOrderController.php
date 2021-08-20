<?php

namespace App\Http\Controllers;

use App\Models\PcsOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PcsOrderController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase = DB::table('pcs_orders')->get();
        $lastID = PcsOrder::getLastID();
      
        return view('PO',["lastID"=>$lastID], compact('purchase'));
    }

   
    // public function generatePDFlbm(Request $request)

    // {
        
    //     $lbm = BarangMasuk::all();
        
  
        
    //     $pdf = PDF::loadView('lbm',compact('lbm'));
    //     // return $pdf->download('suratjalan-pdf.pdf');
    //     // return view('lbm', compact('lbm'));
    //     // $barang = Barangkeluar::truncate();
    //     return $pdf->stream();
        

    // }

   
    public function store(Request $request)
    {
        
        $barangmasuk = new PcsOrder;
        // $inven = new Inventory;
        //kiri nama tabel kanan name di modal
        $barangmasuk->tanggal = $request->get('tgl');
        $barangmasuk->pemesan = $request->get('pemesan');
        $barangmasuk->namabarang = $request->get('namabrg');
        $barangmasuk->qty = $request->get('qty');
       
        
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
        $barangmasuk->save();
        
        return redirect('PO')->with('added_success', 'PO Berhasil di Tambahkan');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = PcsOrder::getBarang($id);
        
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
        $barang = PcsOrder::where('id', $request->get('id'))
        ->update([
            // kiri nama tabel database yang kanan name di modal
            'tanggal' => $request->get('tgl'),
            'pemesan' => $request->get('pmsn'),
            'namabarang' => $request->get('namabrg'),
            'qty' => $request->get('qty'),
            
            
        ]);
      

        return redirect('PO')->with('updated_success', 'PO Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $Barang = PcsOrder::where('id', $request->get('id'))
        ->delete();
        // $inven = Inventory::where('id', $request->get('id'))
        // ->delete();

        

        return redirect('PO')->with('deleted_success', 'PO berhasil Dihapus');
    }  /* @return \Illuminate\Http\Response */
    public function create()
    {
        //
    }
  
}
