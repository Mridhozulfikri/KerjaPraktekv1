<!DOCTYPE html>
<html>
<head>
	<title> Laporan Barang Keluar</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<p></p>
	

<div class="container">
	<p>@php
		date_default_timezone_set('Asia/Jakarta');
		echo '' . date('j F, Y');
		@endphp</p>


	<center>
		<h5>L B K</h4>
	</center>
	
		<table class="table table-success table-striped">
			<thead>
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

				@foreach ($pdfbk as $data2)                          
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
 
</body>
</html>