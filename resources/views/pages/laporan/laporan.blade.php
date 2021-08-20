@extends('layouts/main')

@section('title' , 'laporan')
    
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

      <!-- LAPORAN BARANG KELUAR -->
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lbk" aria-expanded="false" aria-controls="collapseTwo">
              Laporan Barang Keluar
            </button>
          </h5>
        </div>
        <div id="lbk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
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

      <!-- LAPORAN KEUANGAN -->
      <div class="card">
        <div class="card-header" id="headingThree">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lk" aria-expanded="false" aria-controls="collapseThree">
              Laporan Keuangan
            </button>
          </h5>
        </div>
        <div id="lk" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body">
              <div class="container">                  
                <div class="table-wrapper-scroll-y my-custom-scrollbar">                  
                  <table class="table table-bordered table-striped mb-0">
                    <thead class="bg-info">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">TGL MASUK</th>
                        {{-- <th scope="col">NAMA BARANG</th>
                        <th scope="col">QTY</th> --}}
                        <th scope="col">TOTAL PEMBELIAN</th>
                        <th scope="col">TGL KELUAR</th>
                        {{-- <th scope="col">NAMA BARANG</th>
                        <th scope="col">QTY</th>                         --}}
                        <th scope="col">TOTAL PENJUALAN</th>
                        <th scope="col">KEUNTUNGAN</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 1;    
                      @endphp

                      @foreach ($lapkeuangan as $data3)                          
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data3-> tgl_pp }}</td>
                        <td>{{ $data3-> total_pembelian }}</td>
                        <td hidden> {{$penj = $data3-> total_penjualan}} </td>
                        <td hidden>{{ $peb = $data3-> total_pembelian }} </td>
                        <td hidden>{{  $tot = $penj - $peb}}</td>
                        <td>{{ $data3-> created_at}}</td>
                        <td>{{ $data3-> total_penjualan}}</td>
                        <td>{{ $tot }}</td>
                      
                                             
                      </tr>                                   
                      @endforeach
                 
                    </tbody>
                  </table>                
                </div>
                <form method="post" action="">
                  @csrf
                  <div align="right"> <br>
                    <a href="laporank" class="btn btn-success" target="_blank">Cetak Laporan</a>
                  </div>
                </form>
              </div>            
          </div>
        </div>
      </div>
    </div>






@endsection