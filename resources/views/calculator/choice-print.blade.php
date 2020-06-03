
<style type="text/css">
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 12px;
  margin-top: 10px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 5px;
  padding-bottom: 5px;
  text-align: left;
  background-color: #4CAF50;
  color: white; 
}

.kop {
	text-align: center;
}

.kop td {


	width: 100%;
}

.kop p{
	font-size: 12px;
	text-align: right;
	margin-top: -45px;
}

.kop h5,h6 {
	text-align: center;
	margin-top: -20px;
}

.kop img {
	text-align: left;
	padding-left: -20px;
	margin-top: -45px;

}

.kop table {
	padding-bottom: 15px;

	width: 100%;
}

.kop tr {
	width: 100%;
}

#logo {
text-align: left;
width: 100%;


	
}

#kanan {
position: absolute;
text-align: right;
width: 100%
top: 0px;
right:20px;
}
</style>

<div class="kop">
	<table align="center">
		<tr style="width: 100%;">
			<td id="logo" style="width: 50%;">
			<img width="100px" height="85px" src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/images/logo.png';?>"/>
			</td>


			<td id="kanan" style="width: 50%;">
			<p>IBI HRD-FR-014</p>
			</td>

		</tr>

		<tr>
			<td colspan="2" style="margin-top: -40px;">
			@if (Auth::user()->isOutlet())
				<h5>PT INDOBERKA INVESTAMA</h5>
				<h5>REKAP PENILAIAN PELAKSANAAN HASIL KERJA KARYAWAN</h5>
				<H5>{{ Auth::user()->name }}</H5>
			@endif
			
			@if (Auth::user()->isHRD() || Auth::user()->isBowner())
				 <h5>PT INDOBERKA INVESTAMA</h5>
				 <h5>REKAP PENILAIAN PELAKSANAAN HASIL KERJA KARYAWAN</h5>
			 @endif
			</td>
		</tr>
	</table>
</div>


<label>tanggal cetak : {{ $now }}</label>

	 <table  class="table"  id="customers" width="100%" cellspacing="0" >
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Jabatan</th>
          <th>nilai total rata-rata</th>
          <th>Kualitas</th>
          @if (Auth::user()->isHRD() || Auth::user()->isBowner())
          <th>lokasi</th>
          @endif

        </tr> 
      <tbody>



<!-- update 04 mei,,, gausahh panjang2 diinisialisasi dulu-->

<!--{{ $no = 1 }}-->
    @foreach($humans as $q)
      
        <tr>
        <td>{{ $no }}</td>
        <td>{{ $q -> name }}</td>
        <td>{{ $q -> job }}</td> 
        <td><p id="Ntotal_{{ $loop->index }}">{{ $q -> skore }}</p></td>
        <td>
      		@if($q -> skore >= 90 && $q -> skore <= 100)
      		<p>A</p>
      		@endif
      		@if($q -> skore >= 70 && $q -> skore <= 89)
      		<p>B</p>
      		@endif
      		@if($q -> skore >= 50 && $q -> skore <= 69)
      		<p>C</p>
      		@endif
      		@if($q -> skore >= 30 && $q -> skore <= 49)
      		<p>D</p>
      		@endif
      		@if($q -> skore >= 20 && $q -> skore <= 29)
      		<p>E</p>
      		@endif
      		@if($q -> skore <= 19 && $q -> skore >= 1)
      		<p>Parah sih</p>
      		@endif
      		@if($q -> skore == null)
      		<p>-</p>
      		@endif
        </td>
        @if (Auth::user()->isHRD() || Auth::user()->isBowner())
        <td>{{ $q-> location }}</td>
         @endif
       
        </tr>
      @php
      $no = $no+1;
      @endphp
      @endforeach
      </tbody>
      </table>
	</div>

</div>


