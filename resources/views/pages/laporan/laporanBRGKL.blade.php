@extends('layouts/main')

@section('title' , 'laporan Barang Keluar')
    
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

     
     

      <!-- LAPORAN BARANG KELUAR -->
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#lbk" aria-expanded="false" aria-controls="collapseOne">
              Laporan Barang Keluar
            </button>
          </h5>
        </div>
        <div id="lbk" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
              <div class="container">                  
                <div class="table-wrapper-scroll-y my-custom-scrollbar">                  
                  <table class="table table-bordered table-striped mb-0">
                    <thead class="bg-info">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">TGL KELUAR</th>
                        <th scope="col">NAMA BARANG</th>
                        <th scope="col">QTY</th>                        
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 1;    
                      @endphp

                      @foreach ($barangKeluar as $data2)                          
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data2->created_at->format('Y-m-d') }}</td>
                        <td>{{ $data2->nama_barang }}</td>
                        <td>{{ $data2->qty }}</td>
                      </tr>                                   
                      @endforeach
                    </tbody>
                  </table>
                
                </div>
                <form method="post" action="">
                  @csrf
                  <div align="right"> <br>
                    <a href="laporanbk" class="btn btn-success" target="_blank">Cetak Laporan</a>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>

    


@endsection