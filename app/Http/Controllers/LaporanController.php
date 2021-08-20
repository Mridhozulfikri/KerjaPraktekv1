<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\PermintaanPembelian;
use App\Models\TransaksiBarangKeluar;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataBM = PermintaanPembelian::join('master_barangs', 'permintaan_pembelians.master_barangs_id', '=', 'master_barangs.id')
            ->join('master_pembelis', 'permintaan_pembelians.master_pembelis_id', '=', 'master_pembelis.id')
            ->select('permintaan_pembelians.*', 'master_barangs.nama_barang', 'master_pembelis.pembeli')
            ->where('status', 1)
            ->get();

        $barangKeluar = TransaksiBarangKeluar::join('permintaan_pembelians', 'transaksi_barang_keluars.pp_bm_id', '=', 'permintaan_pembelians.id')
            ->select('transaksi_barang_keluars.*', 'permintaan_pembelians.id', 'permintaan_pembelians.no_pp')
            ->where('status_invoice', 1)
            ->get(); 
            
        $lapkeuangan = PermintaanPembelian::join('transaksi_barang_keluars', 'permintaan_pembelians.id', '=', 'transaksi_barang_keluars.pp_bm_id')
        ->select('permintaan_pembelians.*','transaksi_barang_keluars.*', 'transaksi_barang_keluars.id', 'permintaan_pembelians.no_pp')
        ->where('status_invoice', 1)
        ->get(); 
        
        return view('pages.laporan.laporan', compact(['dataBM', 'barangKeluar','lapkeuangan']));
    }
    public function generatePDFbm(Request $request)

    {
       $pdfbm = PermintaanPembelian::join('master_barangs', 'permintaan_pembelians.master_barangs_id', '=', 'master_barangs.id')
            ->join('master_pembelis', 'permintaan_pembelians.master_pembelis_id', '=', 'master_pembelis.id')
            ->select('permintaan_pembelians.*', 'master_barangs.nama_barang', 'master_pembelis.pembeli')
            ->where('status', 1)
            ->get();
        
        $pdf = PDF::loadView('pages.laporan.lbm',compact('pdfbm'));
        return view('pages.laporan.lbm', compact('pdfbm'));

        // return $pdf->download('suratjalan-pdf.pdf');

    }
    public function generatePDFbk(Request $request)

    {
      
        $pdfbk = TransaksiBarangKeluar::join('permintaan_pembelians', 'transaksi_barang_keluars.pp_bm_id', '=', 'permintaan_pembelians.id')
            ->select('transaksi_barang_keluars.*', 'permintaan_pembelians.id', 'permintaan_pembelians.no_pp')
            ->where('status_invoice', 1)
            ->get(); 
        
        $pdf = PDF::loadView('pages.laporan.lbk',compact('pdfbk'));
        return view('pages.laporan.lbk', compact('pdfbk')); //jeung nga view hnkul

        // return $pdf->download('suratjalan-pdf.pdf'); ie jung ngadonwload

    }
    public function generatePDFk(Request $request)

    {
     
        $pdfk = PermintaanPembelian::join('transaksi_barang_keluars', 'permintaan_pembelians.id', '=', 'transaksi_barang_keluars.pp_bm_id')
        ->select('permintaan_pembelians.*','transaksi_barang_keluars.*', 'transaksi_barang_keluars.id', 'permintaan_pembelians.no_pp')
        ->where('status_invoice', 1)
        ->get(); 
        
        $pdf = PDF::loadView('pages.laporan.lk',compact('pdfk'));
        return view('pages.laporan.lk', compact('pdfk'));

        // return $pdf->download('suratjalan-pdf.pdf');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
