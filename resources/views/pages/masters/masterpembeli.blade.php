@extends('layouts.main')
@section('title','Master Pembeli')

@section('euy')


<style>
  .my-custom-scrollbar {
position: relative;
height: 500px;
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
      <h3 class="text-themecolor">Halaman Kelola Pembeli</h3>
       
    </div>
    
    <p></p>
    <nav class="navbar navbar-light ">
        <div class="container-fluid">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahpembeli">Tambah Pembeli</button>  
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

    <p></p>
   {{-- tabel barang--}}
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        
      <table class="table table-bordered table-striped mb-0">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pembeli</th>
            <th scope="col">Alamat</th>
            <th scope="col">opsi</th>
            
        </thead>
        <tbody>
          @php 
          $no = 1;
          @endphp

          @foreach ($pembeli as $item)
          <tr>
          
            <td>{{ $no++}}</td>
            <td>{{ $item->pembeli}}</td>
            <td>{{ $item->alamat}}</td>
            
            

            <td>
              <button type="button" 
              class="btn btn-sm btn-primary"
              data-bs-toggle="modal" 
              data-bs-target="#EDIT" 
              id="btn-edit-barang"
              data-id="{{$item->id}}"
              data-pembeli="{{$item->pembeli}}"
              data-alamat="{{$item->alamat}}"
              
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
    <p></p>
  

<!-- Modal tambah barang-->
@include('pages.masters.modalmasterpembeli.createpembeli')

{{-- modal edit barang --}}
@include('pages.masters.modalmasterpembeli.editpembeli')

@include('pages.masters.modalmasterpembeli.deletepembeli')

{{-- <script src="jquery/jquery.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).on('click','#btn-edit-barang',function(){
      let id = $(this).data('id');

        // AJAX untuk menampilkan data update
      $.ajax({
        type: "get",
        url: 'masterpembeli/'+id,
        dataType: 'json',
        success: function(res){
            // console.log(res);
            // kiri id modal kanan tabel database
            $('#edit-id').val(res[0].id);
             $('#edit-pembeli').val(res[0].pembeli);
             $('#edit-alamat').val(res[0].alamat);
            
      
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

  //   $(document).on('click','#btn-restore-pegawai',function(){
  //     let id_pegawai = $(this).data('id_pegawai');
  //     $('#restore-id_pegawai').val(id_pegawai);

  //   });

  //   $(document).on('click','#btn-force-delete-pegawai',function(){
  //     let id_pegawai = $(this).data('id_pegawai');
  //     $('#force-delete-id_pegawai').val(id_pegawai);

  //   });
    
</script>
    
@endsection