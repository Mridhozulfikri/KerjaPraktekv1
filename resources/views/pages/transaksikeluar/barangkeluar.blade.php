@extends('layouts.main')
@section('title','Barang Keluar')

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
      <h3 class="text-themecolor" id="modalbk">Halaman Barang Keluar</h3>       
    </div>
    <p></p>
  
  {{-- <div class="row">
    <div class="col">
      <div>
      </div> --}}
      
      <!-- DATA BARANG -->
      {{-- <div class="mb-4">
        <a class="btn btn-danger" data-toggle="collapse" href="#databarang" role="button" aria-expanded="false" aria-controls="collapseExample">
          Tabel Data Barang
        </a>
      
        <div class="collapse" id="databarang">
          <div class="card-title">Header</div>
          <div class="card card-body"> --}}
            
            {{-- tabel data barang --}}
            {{-- <div class="table-wrapper-scroll-y my-custom-scrollbar">                
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
                  </tr>
                </thead>
                <tbody>
                  @php 
                    $no = 1;
                  @endphp

                  @foreach ($dataBarang as $data)
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
                          class="btn btn-sm btn-danger"
                          data-bs-toggle="modal" 
                          data-bs-target="#data-barang"  
                          id="btn-data-barang"
                          data-id="{{ $data->id }}" 
                          >Pick</button>
                      </td>                    
                  @endforeach                       
                </tbody>
              </table>            
            </div>  

          </div>
          <div class="card-text">Footer</div>
        </div>
      </div> --}}
      
      <!-- BARANG KELUAR -->
     


      <p></p>
      <div>
        {{-- <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#barangkeluar" aria-expanded="false" aria-controls="collapseExample">
          Tabel Barang Keluar
        </button>
        <div class="collapse" id="barangkeluar">
          <div class="card card-body"> --}}

            {{-- tabel barang keluar --}}
            <div class="table-wrapper-scroll-y my-custom-scrollbar">                
              <table class="table table-bordered table-striped mb-0">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Pemesan</th>
                    <th scope="col">No. PP</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Total</th>            
                    <th scope="col">Alamat</th>                               
                    <th scope="col">Opsi</th>
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
                    <td>{{ $data2->pembeli }}</td>
                    <td>{{ $data2->no_pp }}</td>
                    <td>{{ $data2->kode_barang }}</td>
                    <td>{{ $data2->nama_barang }}</td>
                    <td>{{ $data2->qty }}</td>
                    <td>Rp. {{ number_format($data2->harga_jual) }}</td>
                    <td>Rp. {{ number_format($data2->total_penjualan) }}</td>
                    <td>{{ $data2->alamat }}</td>
                   
                    <td>             
                        <button type="button" 
                          class="btn btn-sm btn-danger"
                          data-bs-toggle="modal" 
                          data-bs-target="#barang-keluar"  
                          id="btn-barang-keluar"
                          data-id="{{ $data2->id }}" 
                          >Batal</button> 
                      </td>                     
                  @endforeach         
                </tbody>
              </table>            
            </div>  

          {{-- </div>
        </div>
      </div>
      --}}
      <div align="right"> <br>
        
        <a href="suratjalanpdf" class="btn btn-success" target="_blank">Cetak Surat Jalan</a>
    </div>
      
      
     
    </div>
  </div>

  <!-- Modal Pick-->
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
   {{-- end modal --}}


   <!-- Modal Batal Keluar-->
    <div class="modal fade" id="barang-keluar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Yakin Barang ini tidak Jadi Dikeluarkan ?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{ route('brgklr.destroy', 'delete') }}">
              @method('DELETE')
              @csrf              
              <div class="mb-3">
                <input type="hidden" name="id" id="brg-keluar">
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
   {{-- end modal --}}

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">  

  // Menampilkan data id untuk barang keluar
  $(document).on('click','#btn-data-barang',function(){
      let id = $(this).data('id');
      console.log(id);
      $('#data-brg').val(id);
  }); 
  
  
  // Menampilkan data id untuk delete barang keluar
  $(document).on('click','#btn-barang-keluar',function(){
      let id = $(this).data('id');
      console.log(id);
      $('#brg-keluar').val(id);
  }); 
 
      
</script> 

@endsection



