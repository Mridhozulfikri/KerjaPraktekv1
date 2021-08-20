@extends('layouts.main')
@section('title','Master Barang')

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
      <h3 class="text-themecolor">Halaman Master Barang</h3>       
    </div>

    <nav class="navbar navbar-light ">
        <div class="container-fluid">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahbarangmasuk">Tambah Barang</button>  
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Pencarian" name="search" aria-label="Search">
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

   {{-- tabel barang--}}
    <div class="table-wrapper-scroll-y my-custom-scrollbar">        
      <table class="table table-bordered table-striped mb-0">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Harga masuk</th>
            <th scope="col">Harga keluar</th>
            <th scope="col">Supplier</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
          @php 
          $no = 1;
          @endphp

          @foreach ($barang as $item)
          <tr>          
            <td>{{ $no++ }}</td>
            <td>{{ $item->kode_barang }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->harga_beli }}</td>
            <td>{{ $item->harga_jual }}</td>
            <td>{{ $item->supplier }}</td>              
            <td>
              <button type="button" 
                class="btn btn-sm btn-primary"
                data-bs-toggle="modal" 
                data-bs-target="#EDIT" 
                id="btn-edit-barang"
                data-id="{{$item->id}}"
                data-kode-barang="{{$item->kode_barang}}"
                data-nama-barang="{{$item->nama_barang}}"
                data-hargabeli="{{$item->harga_beli}}"
                data-hargajual="{{$item->harga_jual}}"
                data-tersediadi="{{$item->supplier}}" 
                >Edit</button>

              <button type="button" 
                data-bs-toggle="modal" 
                data-bs-target="#HAPUS"  
                id="btn-hapus-barang"
                data-id="{{$item->id}}" 
                class="btn btn-sm btn-danger">Hapus</button>
            </td>  
          </tr>
          @endforeach        
      
        </tbody>
      </table>    
    </div>


<!-- Modal Tambah Barang-->
@include('pages.masters.modalmasterbrg.createbrg')

<!-- Modal Edit Barang -->
@include('pages.masters.modalmasterbrg.editbrg')

<!-- Modal Delete Barang -->
@include('pages.masters.modalmasterbrg.deletebrg')


{{-- <script src="jquery/jquery.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  // AJAX untuk menampilkan data update
  $(document).on('click','#btn-edit-barang',function(){
      let id = $(this).data('id');

      $.ajax({
        type: "get",
        url: 'Masterbrg/'+id,
        dataType: 'json',
        success: function(res){
            // console.log(res);
            // kiri id modal kanan tabel database
            $('#edit-id').val(res[0].id);
            $('#edit-kodebarang').val(res[0].kode_barang);
            $('#edit-namabarang').val(res[0].nama_barang);
            $('#edit-hargabeli').val(res[0].harga_beli);
            $('#edit-hargajual').val(res[0].harga_jual);
            $('#edit-supplier').val(res[0].supplier);
      
            //  $('#edit-status option').filter(function(){
            //      return ($(this).val()== res[0].status);
            //  }).prop('selected', true);
        }
      });    
  });

  $(document).on('click','#btn-hapus-barang',function(){
      let id = $(this).data('id');
      $('#delete-id').val(id);
    }); 
    
</script>
    
@endsection