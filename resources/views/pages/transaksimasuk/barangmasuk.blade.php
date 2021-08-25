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
    <div>
      <br>
    <nav class="navbar navbar-light ">
        <div class="container-fluid">
            <!-- Button trigger modal -->           
            <form class="d-flex">
              <input class="form-control me-2" type="text" placeholder="Pencarian" name="search" value="{{ request('search') }}" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Cari</button>
            </form>
        </div>        
    </nav>
  </div>

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
            <th scope="col">Opsi 2</th>
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
              <td>             
                <button type="button" 
                  class="btn btn-sm btn-warning"
                  data-bs-toggle="modal" 
                  data-bs-target="#data-barang"  
                  id="btn-data-barang"
                  data-id="{{ $data->id }}" 
                  >Kirim</button>
              </td> 
              
            
          @endforeach      
               
        </tbody>
      </table>
    
    </div>
    <div class="modal fade" id="data-barang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Yakin Barang ini akan Dikeluarkan ?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{ route('brgklr.store') }}">
              @csrf              
              <div class="mb-3">
                <input type="hidden" name="id" id="data-brg">
              </div>
          </div>            
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Oke</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            {{-- <a href="generatePDF" class="btn btn-info" target="_blank">CETAK PDF</a> --}}
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Batal BM -->
    @include('pages.transaksimasuk.modal_PP.batalBM')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">  
// menampilkan data id untuk memindahkan view ke tabel BK
$(document).on('click','#btn-data-barang',function(){
      let id = $(this).data('id');
      console.log(id);
      $('#data-brg').val(id);
  }); 
  

  // Menampilkan data id untuk add to BM (opsional)
  $(document).on('click','#btn-batal-bm',function(){
      let id = $(this).data('id');
      console.log(id);
      $('#batal-bm-id').val(id);
  }); 
      
</script>  
@endsection