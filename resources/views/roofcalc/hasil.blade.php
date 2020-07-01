<!DOCTYPE html>
<html>
<head>
	<title>Kalkulator atap</title>
</head>
<body>

	<h2>PT. Indoberka Investama</h2>
	<h3>Kalkulator Atap</h3>
	<br/>
	<br/>
	<form action="/roofcalc/custom" method=" " class=" ">  
    <button type="submit" class="btn btn-primary btn-lg" value="*">Kembali</button>
    </form>
	<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped">
	    <thead>
	      <tr>
	        <th>Nama</th>
	        <th>Alamat</th>
	        <th>No. HP</th>
	        <th>Status</th>
	        <th>Pekerjaan</th>
	        <th>Panjang Bangunan</th>
	        <th>Lebar Bangunan</th>
	        <th>Model Atap</th>
	        <th>Kanal</th>
	        <th>Reng Spandek</th>
	        <th>Reng Genteng Metal</th>
	        <th>Reng Genteng Beton</th>
	        <th>Reng Genteng Keramik</th>
	        <th>Reng Genteng Karang Pilang</th>
	        <th>SDS Kanal</th>
	        <th>SDS Kanal</th>
	        <th>SDS Reng</th>
	        <th>Genteng Pasir</th>
	        <th>Drywall/Gypsum</th>
	      </tr>
	    </thead>
	    <tbody>
		
		@if($customers)
			@foreach($customers as $customer)
			  <tr>
				<td>{{$customer->nama}}</td>
				<td>{{$customer->alamat}}</td>
				<td>{{$customer->HP}}</td>
				<td>{{$customer->status}}</td>
				<td>{{$customer->pekerjaan}}</td>
				<td>{{$customer->panjang}}</td>
				<td>{{$customer->lebar}}</td>
				<td>{{$customer->model}}</td>
				<td>{{$customer->kanal}}</td>
				<td>{{$customer->rspandek}}</td>
				<td>{{$customer->rgmetal}}</td>
				<td>{{$customer->rgbeton}}</td>
				<td>{{$customer->rgkeramik}}</td>
				<td>{{$customer->rgkarang}}</td>
				<td>{{$customer->sdskanal}}</td>
				<td>{{$customer->sdsreng}}</td>
				<td>{{$customer->gpasir}}</td>
				<td>{{$customer->drywall}}</td>

			  </tr>
			@endforeach
		@endif  
		
	    </tbody>
	  	</table>
  </div> 
</body>
</html>