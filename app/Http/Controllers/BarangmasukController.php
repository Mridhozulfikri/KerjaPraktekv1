<?php

namespace App\Http\Controllers;

use App\Models\Barangmasuk;
use App\Models\PermintaanPembelian;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;     

        $barangMasuk = PermintaanPembelian::join('master_barangs', 'permintaan_pembelians.master_barangs_id', '=', 'master_barangs.id')
            ->join('master_pembelis', 'permintaan_pembelians.master_pembelis_id', '=', 'master_pembelis.id')
            ->select('permintaan_pembelians.*', 'master_barangs.nama_barang', 'master_pembelis.pembeli')
            ->where('no_pp','like',"%".$search."%")
            ->where('status', 1)
            ->get();

        return view('pages.transaksimasuk.barangmasuk', compact('barangMasuk'));
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
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function show(Barangmasuk $barangmasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(Barangmasuk $barangmasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barangmasuk $barangmasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barangmasuk  $barangmasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barangmasuk $barangmasuk)
    {
        //
    }
}
