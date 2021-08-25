<!DOCTYPE html>
<html>
<head>
	<title>Surat jalan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<p>
		<div class="container">
		
		@php
		date_default_timezone_set('Asia/Jakarta');
		echo '' . date('j F, Y');
		@endphp</p>
	<center>
		<h5>Surat Jalan</h4>
	</center>
	
	<table class='table table-success table-striped'>
		<thead>
			<tr>
        <th>No</th>
        <th>No. PP</th>
        <th>Tanggal</th>
        <th>Pemesan</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Qty</th>
        <th>Harga</th>
        <th>Total</th>            
        <th>Alamat</th>            

      </tr>
		</thead>
		<tbody>
			@php
			$no = 1;   
		@endphp
  
		@foreach ($data as $data2)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $data2->no_pp_bm }}</td>
        <td>{{ $data2->created_at->format('Y-m-d') }}</td>
        <td>{{ $data2->pembeli }}</td>
        <td>{{ $data2->kode_barang }}</td>
        <td>{{ $data2->nama_barang }}</td>
        <td>{{ $data2->qty }}</td>
        <td>Rp. {{ number_format($data2->harga_jual) }}</td>
        <td>Rp. {{ number_format($data2->total_penjualan) }}</td>
        <td>{{ $data2->alamat }}</td>
    </tr>
		@endforeach
		  </tbody>
	</table>
</div>
 
</body>
</html>