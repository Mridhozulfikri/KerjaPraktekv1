@extends('layouts/main')

@section('title' , 'laporan Keuangan')
    
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

      <!-- LAPORAN KEUANGAN -->
      <div class="card">
        <div class="card-header" id="headingThree">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lk" aria-expanded="false" aria-controls="collapseThree">
              Laporan Keuangan
            </button>
          </h5>
        </div>
        <div id="lk" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body">
              <div class="container">                  
                <div class="table-wrapper-scroll-y my-custom-scrollbar">                  
                  <table class="table table-bordered table-striped mb-0">
                    <thead class="bg-info">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">TGL MASUK</th>
                        <th scope="col">TOTAL PEMBELIAN</th>
                        <th scope="col">TGL KELUAR</th>
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