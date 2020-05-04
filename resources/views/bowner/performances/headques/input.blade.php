@extends('layouts.bowner')

@section('content')
          <!-- Content Row (INI YANG DIRUBAH) -->
          <style type="text/css">
    .pagination li{
      float: left;
      list-style-type: none;
      margin:5px;
    }
  </style>
    <div class="container">
      <div class="card">
      <div class="card-body">
	<h3>Data Pelamar</h3>

	<a href="/bfm"> Kembali</a>
	
	<br/>
	<br/>

<form action="/bfm/store" method="post" enctype="multipart/form-data">
	<?php
	include "Head_question.php";
	?>
					{{ csrf_field() }}
					Name <input type="text" name="employee"> <br/>
					Performance Exam Date <input type="date" name="pdate"> <br/>
					Wawasan atau Pengetahuan mengenai pekerjaan (Job Desk)<input type="number" name="knowledge" > <br/>
					Kecepatan kerja <input type="number" name="wspeed" > <br/>
					Kemampuan menyelesaikan pekerjaan <input type="number" name="wsoul" > <br/>
					Kualitas hasil pekerjaan <input type="number" name="wqual" > <br/>
					Prestasi kerja dibawah tekanan <input type="number" name="wpress" > <br/>
					Kerjasama <input type="number" name="teamwork" > <br/>
					Komunikasi <input type="number" name="communicate" > <br/>
					Tanggung jawab <input type="number" name="responbility"  > <br/>
					Kemauan belajar <input type="number" name="learning" > <br/>
					Disiplin kerja <input type="number" name="dicipline" > <br/>
					Inisiatif <input type="number" name="initiative" > <br/>
					Kreatifitas <input type="number" name="creativity" > <br/>
					Kejujuran <input type="number" name="honestly" > <br/>
					Ketaatan <input type="number" name="obedience" > <br/>
					Loyalitas / Kehadiran <input type="number" name="loyalty" > <br/>
					Pengorganisasian <input type="number" name="organate" > <br/>
					Pembinaan / Pengarahan <input type="number" name="coaching" > <br/>
					Pemeriksaan / Pengendalian <input type="number" name="controling" > <br/>
					Perencanaan <input type="number" name="planing" > <br/>
					Pendelegasian <input type="number" name="delegate" > <br/>
					<input type="submit" value="Upload" class="btn btn-primary">
					
</form>
		
@endsection