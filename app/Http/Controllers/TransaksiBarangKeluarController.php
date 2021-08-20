<?php

namespace App\Http\Controllers;

use App\Models\PermintaanPembelian;
use App\Models\TransaksiBarangKeluar;
use Illuminate\Http\Request;
use PDF;

class TransaksiBarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
         
        $dataBarang = PermintaanPembelian::join('master_barangs', 'permintaan_pembelians.master_barangs_id', '=', 'master_barangs.id')
            ->join('master_pembelis', 'permintaan_pembelians.master_pembelis_id', '=', 'master_pembelis.id')
            ->select('permintaan_pembelians.*', 'master_barangs.nama_barang', 'master_pembelis.pembeli')
            ->where('no_pp','like',"%".$search."%")
            ->where('permintaan_pembelians.status', 1)
            ->get();
            // dd($dataBarang);
        
        $barangKeluar = TransaksiBarangKeluar::join('permintaan_pembelians', 'transaksi_barang_keluars.pp_bm_id', '=', 'permintaan_pembelians.id')
            ->select('transaksi_barang_keluars.*', 'permintaan_pembelians.id', 'permintaan_pembelians.no_pp')
            ->where('no_pp','like',"%".$search."%")
            ->where('status_invoice', 0)
            ->get();        
            // dd($barangKeluar);

        return view('pages.transaksikeluar.barangkeluar', compact(['dataBarang', 'barangKeluar']) );
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
        // Get data
        $pp = PermintaanPembelian::join('master_barangs', 'permintaan_pembelians.master_barangs_id', '=', 'master_barangs.id')
            ->join('master_pembelis', 'permintaan_pembelians.master_pembelis_id', '=', 'master_pembelis.id')
            ->select('permintaan_pembelians.*', 'master_barangs.nama_barang', 'master_barangs.harga_jual', 'master_pembelis.pembeli', 'master_pembelis.alamat')
            ->where('permintaan_pembelians.id', $request->get('id'))
            ->where('status', 1)
            ->first();
                
        // Input ke tabel barang keluar
        TransaksiBarangKeluar::create([
            'pp_bm_id'          => $pp->id, // id PP yg status barang sdh masuk
            'no_pp_bm'          => $pp->no_pp, // no PP yg status barang sdh masuk
            'kode_barang'       => $pp->kode_barang,
            'nama_barang'       => $pp->nama_barang,
            'qty'               => $pp->qty,
            'harga_jual'        => $pp->harga_jual,
            'total_penjualan'   => $pp->qty * $pp->harga_jual,
            'pembeli'           => $pp->pembeli,
            'alamat'            => $pp->alamat,
            'status_invoice'    => 0,
        ]);

        // Untuk update status_bk di tabel PP
        PermintaanPembelian::where('id', $request->get('id'))->update(['status' => 2]);
        
        return redirect('/brgklr')->with('added_success', 'Data Berhasil di Keluarkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransaksiBarangKeluar  $transaksiBarangKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiBarangKeluar $transaksiBarangKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransaksiBarangKeluar  $transaksiBarangKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiBarangKeluar $transaksiBarangKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransaksiBarangKeluar  $transaksiBarangKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiBarangKeluar $transaksiBarangKeluar)
    {
        //
    }
    public function generatePDFs(Request $request)

    {
        $stat = '1';
        $dataz = TransaksiBarangKeluar::all();
        foreach ($dataz as $key => $value) {
            $aydi = $value ->id;
            $trans = TransaksiBarangKeluar::where('id', $aydi)->update([
                'status_invoice' => $stat,
            ]);
        }
        $data = TransaksiBarangKeluar::all();
        
        $pdf = PDF::loadView('pages.laporan.suratjalan',compact('data'));
        return view('pages.laporan.suratjalan', compact('data'));

        // return $pdf->download('suratjalan-pdf.pdf');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransaksiBarangKeluar  $transaksiBarangKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TransaksiBarangKeluar $transaksiBarangKeluar)
    {
        TransaksiBarangKeluar::where('pp_bm_id', $request->get('id'))->delete();
        PermintaanPembelian::where('id', $request->get('id'))->update(['status' => 1]);

        return redirect('/brgklr')->with('deleted_success', 'Data berhasil dihapus');
    }
}
