@extends('layouts.main')
@section('title','Barang Masuk')

@section('euy')

<style>
  .my-custom-scrollbar {
    position: relative;
    height: 300px;
    overflow: auto;
  }
  .table-wrapper-scroll-y {
    display: block;
  }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

 
    
<div class="container">
  <div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
      <h3 class="text-themecolor">Halaman Barang Masuk</h3>       
    </div>
    
    <nav class="navbar navbar-light ">
        <div class="container-fluid">
            <!-- Button trigger modal -->           
            <form class="d-flex">
              <input class="form-control me-2" type="text" placeholder="Pencarian" name="search" value="{{ request('search') }}" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Cari</button>
            </form>
        </div>        
    </nav>

   {{-- tabel barang masuk --}}
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        
      <table class="table table-bordered table-striped mb-0">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">No. PP</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Pemesan</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Qty</th>
            <th scope="col">Harga Beli</th>
            <th scope="col">Total</th>            
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
          @php 
            $no = 1;
          @endphp

          @foreach ($barangMasuk as $data)
          <tr>          
            <td>{{ $no++}}</td>
            <td>{{ $data->no_pp}}</td>
            <td>{{ $data->tgl_pp}}</td>
            <td>{{ $data->pembeli}}</td>
            <td>{{ $data->kode_barang}}</td>
            <td>{{ $data->nama_barang}}</td>
            <td>{{ $data->qty}}</td>
            <td>Rp. {{ number_format($data->harga_beli) }}</td>
            <td>Rp. {{ number_format($data->total_pembelian) }}</td>
            <td>             
                <button type="button" 
                  class="btn btn-sm btn-danger"
                  data-bs-toggle="modal" 
                  data-bs-target="#batal-bm"  
                  id="btn-batal-bm"
                  data-id="{{$data->id}}" 
                  >Batal</button>
              </td> 
            
          @endforeach      
               
        </tbody>
      </table>
    
    </div>

    <!-- Modal Batal BM -->
    @include('pages.transaksimasuk.modal_PP.batalBM')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">  

  // Menampilkan data id untuk add to BM (opsional)
  $(document).on('click','#btn-batal-bm',function(){
      let id = $(this).data('id');
      console.log(id);
      $('#batal-bm-id').val(id);
  }); 
      
</script>  
@endsection