@extends('master2')

@section('edit')
          <!-- Content Row (INI YANG DIRUBAH) -->
  <style type="text/css">
    .pagination li{
      float: left;
      list-style-type: none;
      margin:5px;
    }
  </style>


    <div class="container" style="margin-bottom: 20px;">
      <div class="card">
      <div class="card-body">


	<h3>Tambah masalah</h3>
	<a href="/EDP" class="btn btn-info btn">Kembali</a>
	
	<br/>
	<br/>
<form action="/bfm/store" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}


					<!--Tanggal Kejadian <input type="date" name="tproblem" required="required"> <br/>-->
					<label>tanggal kejadian</label>
					 <input class="form-control" id="exampleFormControlInput1" placeholder="tanggal Kejadian" type="date" name="tproblem" required="required" value="{{ old('tproblem') }}" style="max-width: 300px;">  <br/>


					<!--Asal Lokasi + PIC<input type="text" name="asal" required="required"> <br/>-->
					<input class="form-control" id="exampleFormControlInput1" placeholder="lokasi-nama PIC" type="text" name="asal" required="required" value="{{ old('asal') }}" style="max-width: 300px;">  <br/>



					<!--Connecting PIC lawan <input type="text" name="lawan" required="required"> <br/>-->
					<input class="form-control" id="exampleFormControlInput1" placeholder="nama PIC pusat" type="text" name="lawan" required="required" value="{{ old('lawan') }}" style="max-width: 300px;">  <br/>




					<!--Masalah dan No Dokumen <input type="text" name="masalah" required="required"> <br/>-->
					<input class="form-control" id="exampleFormControlInput1" placeholder="NO Document terkait" type="text" name="masalah" required="required" value="{{ old('masalah') }}" style="max-width: 300px;">  <br/>

                    <input class="form-control" id="exampleFormControlInput1" placeholder="Inti Permasalahan" type="text" name="inti" required="required" value="{{ old('inti') }}" style="max-width: 300px;">  <br/>


					<!--Judul masalah <input type="text" name="tipe" required="required"> <br/>-->
					
					<div class="form-group">
						<b>Judul masalah</b>
						<!--<textarea class="form-control" name="tipe"></textarea>-->
						<textarea name="tipe" class="summernote"></textarea>
					</div>


					<!--Penyelesaian <input type="text" name="penyelesaian" required="required"> <br/>-->
					<div class="form-group">
						<b>Penyelesaian</b>
						<textarea name="penyelesaian" class="summernote"></textarea>

					</div>
					<!--Tanggal Penyelesaian <input type="date" name="tgl" required="required"> <br/>-->
					<label>tanggal penyelesaian</label>
					<input class="form-control" id="exampleFormControlInput1" placeholder="tanggal Kejadian" type="date" name="tgl" required="required" value="{{ old('tgl') }}" style="max-width: 300px;">  <br/>
					

					<!--<div class="form-group">
						<b>Keterangan</b>
						<textarea class="form-control" name="keterangan"></textarea>
					</div>-->

					
					<button class="btn btn-success" type="submit" >Simpan</button>
    


{{ $tipe = null }}
{{ $penyelesaian = null }} 

    
</form>

</div>
</div>
</div>
		
@endsection