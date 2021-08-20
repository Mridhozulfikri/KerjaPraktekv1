@extends('layouts.main')
@section('title','Purchase')

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
      <h3 class="text-themecolor">Halaman Permintaan Pembelian</h3>       
    </div>
    
    <nav class="navbar navbar-light ">
        <div class="container-fluid">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahpo">Tambah PP</button>  
            <form class="d-flex">
              <input class="form-control me-2" type="text" placeholder="Pencarian No. PP" name="search" value="{{ request('search') }}" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Cari</button>
            </form>
        </div>        
    </nav>
    @if (session('added_success'))
        <div class="alert alert-success" role="alert">
            {{session('added_success')}}          
        </div>
        @endif
    
        @if (session('updated_success'))
        <div class="alert alert-success" role="alert">
            {{session('updated_success')}}
            
        </div>
        @endif

        @if (session('deleted_success'))
        <div class="alert alert-danger" role="alert">
            {{session('deleted_success')}}              
        </div>
    @endif

   {{-- Tabel PP--}}
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
            <th scope="col">Opsi-2</th>           
          </tr>
        </thead>
        <tbody>
          @php 
            $no = 1;
          @endphp

          @foreach ($permintaan as $data)
          <tr>          
            <td>{{ $no++ }}</td>
            <td>{{ $data->no_pp }}</td>
            <td>{{ $data->tgl_pp }}</td>
            <td>{{ $data->pembeli }}</td>
            <td>{{ $data->kode_barang }}</td>
            <td>{{ $data->nama_barang }}</td>
            <td>{{ $data->qty }}</td>
            <td>Rp. {{ number_format($data->harga_beli) }}</td>
            <td>Rp. {{ number_format($data->total_pembelian) }}</td>    

            <td>
              <button type="button" 
                class="btn btn-sm btn-primary"
                data-bs-toggle="modal" 
                data-bs-target="#editpp" 
                id="btn-edit-pp"
                data-id="{{$data->id}}"
                >Edit</button>

              <button type="button" 
                class="btn btn-sm btn-danger"
                data-bs-toggle="modal" 
                data-bs-target="#hapus"  
                id="btn-hapus-pp"
                data-id="{{$data->id}}" 
                >Hapus</button>
              
              <td>             
                <button type="button" 
                  class="btn btn-sm btn-secondary"
                  data-bs-toggle="modal" 
                  data-bs-target="#addtobm"  
                  id="btn-addto-bm"
                  data-id="{{$data->id}}" 
                  >Add To BM</button>
              </td>              
            </td>
          </tr>
          @endforeach        
        
        </tbody>
      </table>
    
    </div>


<!-- Modal tambah PP -->
@include('pages.transaksimasuk.modal_PP.createPP')

<!-- Modal edit PP -->
@include('pages.transaksimasuk.modal_pp.editPP')

<!-- Modal hapus PP -->
@include('pages.transaksimasuk.modal_PP.deletePP')

<!-- Modal addTo BM -->
@include('pages.transaksimasuk.modal_PP.addToBM')




{{-- <script src="jquery/jquery.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">  
  
  $(document).ready(function () {
 // Menampilkan kode barang & harga barang dari master barang di tambah PP
    $('#namabrg').on('change', function(){
      var namaBrg = this.value;
      if(namaBrg) {
          $.ajax({
            type: "GET",
            url: '/PP/' + namaBrg + '/masterbarang',
            dataType: "json",
            success: function(result){       
                $('#kodebrg').html('<p value="">-- Pilih Kode Barang --</p>');
                $.each(result, function(key, value){
                  $('#kodebrg').html('<input name="kode_barang" value="'+ value.kode_barang +'" class="form-control" readonly></input>');
                  $('#hargabeli').html('<input name="harga_beli" value="'+ value.harga_beli +'" class="form-control" readonly></input>');                                    
                });             
              }
          });  
      } else {
        $('#kodebrg').empty();
        $('#hargabeli').empty();
      }       
    });

  // Menampilkan data yang akan diupdate
  $(document).on('click','#btn-edit-pp',function(){
      let id = $(this).data('id');
      $.ajax({
        type: "GET",
        url: '/PP/' + id + '/edit',
        dataType: 'json',
        success: function(res){
          console.log(res);
          $('#edit-no_pp').val(res[0].no_pp);
          $('#edit-tgl_pp').val(res[0].tgl_pp);
          $('#edit-kode_barang').val(res[0].kode_barang);
          $('#edit-qty').val(res[0].qty);
          $('#edit-harga_beli').val(res[0].harga_beli);   
          //$('#edit-nama_barang').html(res.namabrg);          
          $.each(res, function(key, value){
            $('#edit-nama_barang').append('<option name="nama_barang" value="'+ value.id +'" selected readonly>' + value.nama_barang + '</option>');
          });            
          
        }
      }); 
  }); 

   // Menampilkan kode barang & harga barang dari master barang di edit PP
  //$(document).ready(function () {
    $('#edit-nama_barang').on('change', function(){
      var namaBrg = this.value;
      if(namaBrg) {
          $.ajax({
            type: "GET",
            url: '/PP/' + namaBrg + '/masterbarang',
            dataType: "json",
            success: function(result){       
                $('#kodebrg').html('<p value="">-- Pilih Kode Barang --</p>');
                $.each(result, function(key, value){
                  $('#kode_brg').html('<input name="kode_barang" value="'+ value.kode_barang +'" class="form-control" readonly></input>');
                  $('#harga_beli').html('<input name="harga_beli" value="'+ value.harga_beli +'" class="form-control" readonly></input>');                                    
                });             
              }
          });  
      } else {
        $('#kode_brg').empty();
        $('#harga_beli').empty();
      }       
    });
  //});


  // Menampilkan data id untuk delete
  $(document).on('click','#btn-hapus-pp',function(){
      let id = $(this).data('id');
      $('#delete-id').val(id);
  }); 

  // Menampilkan data id untuk add to BM
  $(document).on('click','#btn-addto-bm',function(){
      let id = $(this).data('id');
      console.log(id);
      $('#addtobm-id').val(id);
  }); 

  });

      
</script>  
@endsection