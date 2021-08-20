<!DOCTYPE html>
<html>
<head>
	<title>L K</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<p>@php
		date_default_timezone_set('Asia/Jakarta');
		echo '' . date('j F, Y');
		@endphp</p>
	<center>
		<h5>L K</h4>
	</center>
	
	<table class='table table-bordered'>
		<thead>
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

            @foreach ($pdfk as $data3)                          
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
 
</body>
</html>