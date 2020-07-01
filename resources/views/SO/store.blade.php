@extends('pd.master')

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
	<a href="/dosa" class="btn btn-info btn">Kembali</a>
	
	<br/>
	<br/>
<form action="/dosa/store" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}


					<!--Tanggal Kejadian <input type="date" name="tproblem" required="required"> <br/>-->
					<label>Tanggal</label>
					 <input class="form-control" id="exampleFormControlInput1" placeholder="tanggal" type="date" name="tanggal" required="required" value="{{ old('tanggal') }}" style="max-width: 300px;">  <br/>


					<!--Asal Lokasi + PIC<input type="text" name="asal" required="required"> <br/>-->
					<input class="form-control" id="exampleFormControlInput1" placeholder="Nama Outlet" type="text" name="outlet" required="required" value="{{ old('outlet') }}" style="max-width: 300px;">  <br/>



					<!--Connecting PIC lawan <input type="text" name="lawan" required="required"> <br/>-->
					<input class="form-control" id="exampleFormControlInput1" placeholder="Nama Editor" type="text" name="editor" required="required" value="{{ old('editor') }}" style="max-width: 300px;">  <br/>




					<!--Masalah dan No Dokumen <input type="text" name="masalah" required="required"> <br/>-->
					<input class="form-control" id="exampleFormControlInput1" placeholder="Status" type="text" name="status" required="required" value="{{ old('status') }}" style="max-width: 300px;">  <br/>

                    <input class="form-control" id="exampleFormControlInput1" placeholder="No. Transaksi" type="text" name="transaksi" required="required" value="{{ old('transaksi') }}" style="max-width: 300px;">  <br/>

					<!--Judul masalah <input type="text" name="tipe" required="required"> <br/>-->
					<div class="form-group">
						<b>Keterangan</b>
						<textarea class="form-control" name="keterangan"></textarea>
					</div>


					<!--Penyelesaian <input type="text" name="penyelesaian" required="required"> <br/>-->
					<div class="form-group">
						<b>NO. Berita Acara</b>
						<textarea class="form-control" name="berita"></textarea>
					</div>
					
				    <div class="form-group" col-sm-6>
				        <b>Toleransi</b>
				        <select class="form-control" id="exampleFormControlSelect1" name="toleransi" required="required" value="{{ old('toleransi') }}">
                        <option>-</option>
                            <option>Ya</option>
                            <option>Tidak</option>
                        </select> 
                    </div>

					<div class="form-group">
						<b>Bukti Berita Acara</b><br/>
						<input type="file" name="file">
					</div>

					<button class="btn btn-success" type="submit" >Simpan</button>
    


    
</form>

</div>
</div>
</div>
		
@endsection