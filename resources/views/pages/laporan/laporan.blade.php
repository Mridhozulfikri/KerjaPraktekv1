@extends('layouts/main')

@section('title' , 'laporan Barang Masuk')
    
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

<body>
  <br>
  <div id="accordion">

      <!-- LAPORAN BARANG MASUK -->
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#lbm" aria-expanded="true" aria-controls="collapseOne">
              Laporan Barang Masuk
            </button>
          </h5>
        </div>    
        <div id="lbm" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
            <div class="container">                
              <div class="table-wrapper-scroll-y my-custom-scrollbar">                  
                <table class="table table-bordered table-striped mb-0">
                  <thead class="bg-info">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">TGL MASUK</th>
                      <th scope="col">NAMA BARANG</th>
                      <th scope="col">QTY</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;    
                    @endphp

                    @foreach ($dataBM as $data)                          
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $data->tgl_pp }}</td>
                      <td>{{ $data->nama_barang }}</td>
                      <td>{{ $data->qty }}</td>
                    </tr>                                   
                    @endforeach
                  </tbody>
                </table>                
              </div>
              <form method="post" action="">
                @csrf
                <div align="right"> <br>
                  <a href="laporanbm" class="btn btn-success" target="_blank">Cetak Laporan</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

     
@endsection