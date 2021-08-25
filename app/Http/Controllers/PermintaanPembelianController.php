<?php

namespace App\Http\Controllers;
use App\Models\PermintaanPembelian;
use App\Models\MasterBarang;
use App\Models\Masterpembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermintaanPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // Menangkap data pencarian
		$search = $request->search;
    
        // Cara-1
        // $permintaan = PermintaanPembelian::join('master_barangs', 'permintaan_pembelians.master_barangs_id', '=', 'master_barangs.id')
        //     ->join('masterpembelis', 'permintaan_pembelians.master_pembelis_id', '=', 'masterpembelis.id')
        //     ->select('permintaan_pembelians.*', 'master_barangs.nama_barang', 'masterpembelis.pembeli')
        //     ->where('no_pp','like',"%".$search."%")
        //     ->where('status', 0)
        //     ->get();

        // Cara-2
        $permintaan = PermintaanPembelian::Filter($search)->get(); 

        $pemesan = MasterPembeli::all(); 
        $barang = MasterBarang::all();
      
        return view('pages.transaksimasuk.permintaan_pembelian', compact(['permintaan', 'pemesan', 'barang']));
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
     * Display the specified resource.
     *
     * @param  int  $kodebrg_id
     * @return \Illuminate\Http\Response
     */
    public function getMasterBrg($kodebrg_id)
    {   
        $kodeBrg = MasterBarang::where('id', $kodebrg_id)->get(['kode_barang', 'harga_beli']);
        return response()->json($kodeBrg);
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qty = $request->get('qty');
        $harga = $request->get('harga_beli');

        PermintaanPembelian::create([
            'no_pp'  => $request->get('no_pp'),
            'tgl_pp'  => $request->get('tgl_pp'),
            'master_pembelis_id' => $request->get('pembeli'),
            'kode_barang' => $request->get('kode_barang'),
            'master_barangs_id' => $request->get('nama_barang'),
            'qty' => $request->get('qty'),
            'harga_beli' => $request->get('harga_beli'),
            'total_pembelian' => $qty * $harga,
            'status' => 0,
        ]);             

        return redirect('/PP')->with('added_success', 'Data PP Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermintaanPembelian  $perintaanPembelian
     * @return \Illuminate\Http\Response
     */
    public function show(PermintaanPembelian $permintaanPembelian, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerintaanPembelian  $perintaanPembelian
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PermintaanPembelian $permintaanPembelian, $id)
    {
        // Cara-1
        // $pp = PermintaanPembelian::join('master_barangs', 'permintaan_pembelians.master_barangs_id', '=', 'master_barangs.id')
        // ->join('masterpembelis', 'permintaan_pembelians.master_pembelis_id', '=', 'masterpembelis.id')
        // ->select('permintaan_pembelians.*', 'master_barangs.nama_barang', 'masterpembelis.pembeli')
        // ->where('permintaan_pembelians.id',$id)
        // ->get();

        // Cara-2
        $pp = PermintaanPembelian::EditForm($id)->get();

        return response()->json($pp);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PermintaanPembelian  $perintaanPembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        PermintaanPembelian::where('id', $request->get('id'))
         ->update([
             // kiri nama tabel database, yang kanan name di modal
             'no_pp' => $request->get('no_pp'),
             'tgl_pp' => $request->get('tgl_pp'),
             'master_pembelis_id' => $request->get('pemesan'),
            // 'kode_barang' => $request->get('namabrg'),
             'master_barangs_id' => $request->get('kode_barang'),
             'qty' => $request->get('qty'),
            // 'harga_beli' => $request->get('harga_beli'),
             
         ]);      
       
         return redirect('/PP')->with('updated_success', 'Data Berhasil di Ubah');
        // $id = $request->get('id');
        // dd($id);

        // PermintaanPembelian::where('id', $id)
        //     ->update(['status' => 1]);
        
        // return redirect('/PP')->with('added_success', 'Data Sudah Masuk ke Tabel Barang Masuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddtoBM(Request $request)
    {   
        $id = $request->get('id');
        PermintaanPembelian::where('id', $id)->update(['status' => 1]);
        
        return redirect('/PP')->with('added_success', 'Data Sudah Masuk ke Tabel Barang Masuk');
    }

    public function BatalBM(Request $request)
    {   
        $id = $request->get('id');
        PermintaanPembelian::where('id', $id)->update(['status' => 0]);
        
        return redirect('/brgmsk')->with('added_success', 'Data Sudah Dibatalkan Masuk ke Tabel Barang Masuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermintaanPembelian  $perintaanPembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id, PermintaanPembelian $perintaanPembelian)
    {
        PermintaanPembelian::where('id', $request->get('id'))->delete();

        return redirect('/PP')->with('deleted_success', 'Data PP berhasil dihapus');
    }
}
