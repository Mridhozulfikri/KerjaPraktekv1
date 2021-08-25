@extends('layouts.main')
@section('title','Master Supplier')

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
        <h3 class="text-themecolor">Halaman Kelola Supplier</h3>
         
      </div>
      
      <p></p>
      <nav class="navbar navbar-light ">
          <div class="container-fluid">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahsupplier">Tambah Supplier</button>  
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
     {{-- tabel supplier--}}
      <div class="table-wrapper-scroll-y my-custom-scrollbar">
          
        <table class="table table-bordered table-striped mb-0">
          <thead class="table-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kode Supplier</th>
              <th scope="col">Nama Supplier</th>
              <th scope="col">Alamat</th>
              <th scope="col">No Telepon</th>
              <th scope="col">Opsi</th>
              
          </thead>
          <tbody>
            @php 
            $no = 1;
            @endphp
  
            @foreach ($supplier as $item)
            <tr>
            
              <td>{{ $no++}}</td>
              <td>{{ $item->kode_supplier}}</td>
              <td>{{ $item->nama_supplier}}</td>
              <td>{{ $item->alamat}}</td>
              <td>{{ $item->notelp }}</td>
              
              
  
              <td>
                <button type="button" 
                class="btn btn-sm btn-primary"
                data-bs-toggle="modal" 
                data-bs-target="#EDIT" 
                id="btn-edit-supplier"
                data-id="{{$item->id}}"
                data-kode-supplier="{{$item->kode_supplier}}"
                data-supplier="{{$item->nama_supplier}}"
                data-alamat="{{$item->alamat}}"
                data-notelp="{{$item->notelp}}"
                
                >Edit</button>
  
                <button type="button" 
                data-bs-toggle="modal" 
                data-bs-target="#HAPUS"  
                id="btn-hapus-supplier"
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
  @include('pages.masters.modalsupplier.createsupplier')
  
  {{-- modal edit barang --}}
  @include('pages.masters.modalsupplier.editsupplier')
  
  @include('pages.masters.modalsupplier.deletesupplier')
  
  {{-- <script src="jquery/jquery.min.js"></script> --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).on('click','#btn-edit-supplier',function(){
      let id = $(this).data('id');

      $.ajax({
        type: "get",
        url: 'mastersupplier/'+id,
        dataType: 'json',
        success: function(res){
            // console.log(res);
            // kiri id modal kanan tabel database
            $('#edit-id').val(res[0].id);
            $('#edit-kodesupplier').val(res[0].kode_supplier);
            $('#edit-namasupplier').val(res[0].nama_supplier);
            $('#edit-alamat').val(res[0].alamat);
            $('#edit-notelp').val(res[0].notelp);
            
      
            //  $('#edit-status option').filter(function(){
            //      return ($(this).val()== res[0].status);
            //  }).prop('selected', true);
        }
      });    
  });

  $(document).on('click','#btn-hapus-supplier',function(){
      let id = $(this).data('id');
      $('#delete-id').val(id);
    }); 
    
</script>
@endsection