@extends('layouts/main')

@section('title' , 'laporan')
    
@section('euy')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

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
        <h3 class="text-themecolor">Halaman Invoice</h3>       
      </div>
      
      <nav class="navbar navbar-light ">
          <div class="container-fluid">
              <!-- Button trigger modal -->           
              
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
              <th scope="col">Harga Jual</th>
              <th scope="col">Total</th>            
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($invoice as $item)
                  
              <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item-> no_pp_bm }}</td>
                  <td>{{ $item-> created_at }}</td>
                  <td>{{ $item-> pembeli }}</td>
                  <td>{{ $item-> kode_barang }}</td>
                  <td>{{ $item-> nama_barang}}</td>
                  <td>{{ $item-> qty}}</td>
                  <td>{{ $item-> harga_jual}}</td>
                  <td>{{ $item-> total_penjualan}}</td>
                  <td>  <input data-id="{{$item->id}}" class="toggle-class" type="checkbox"
                    data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                    data-on="Hadir" data-off="Tidak Hadir" {{ $item->status_invoice ? 'checked' : '' }}></td>

              </tr>

              @endforeach
               
                 
          </tbody>
        </table>
      
      </div>
      <script>
           var id = $(this).data('id'); 
             console.log(id);
        $(function() {
          $('.toggle-class').change(function() {
              var status_invoice = $(this).prop('checked') == true ? 1 : 0; 
              var id = $(this).data('id'); 
              // var hadirr = 0;
              // var tidakk = 0;
              console.log(status_invoice);
               console.log(id);
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: '/changeStatus',
                  data: {'status_invoice': status_invoice, 'id': id},
                  success: function(data){
                    console.log(data.success)
                  }
              });
          })
        })
      </script>
@endsection