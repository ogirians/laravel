@extends('pd.master')

@section('edit')
  <link href="kuning/css/jquery.steps.css" rel="stylesheet">




    <div class="container" style="margin-bottom: 20px;">
      <div class="card">
      <div class="card-body">


  <h3>Edit masalah</h3>
  <a href="/dosa" class="btn btn-info btn">Kembali</a>
  
  <br/>
  <br/>

 @foreach($sheet1 as $m)      

    <form action="/dosa/update" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <input type="hidden" name="no" value="{{ $m->no }}"> <br/>
                    
                  
          <label>tanggal kejadian</label>
           <input class="form-control" id="exampleFormControlInput1" placeholder="Tanggal" type="date" name="tanggal" required="required" value="{{ $m->tanggal }}" style="max-width: 300px;">  <br/>


          <!--Asal Lokasi + PIC<input type="text" name="asal" required="required"> <br/>-->
          <input class="form-control" id="exampleFormControlInput1" placeholder="Nama Outlet" type="text" name="outlet" required="required" value="{{ $m->outlet }}" style="max-width: 300px;">  <br/>



          <!--Connecting PIC lawan <input type="text" name="lawan" required="required"> <br/>-->
          <input class="form-control" id="exampleFormControlInput1" placeholder="Nama Editor" type="text" name="editor" required="required" value="{{ $m->editor }}" style="max-width: 300px;">  <br/>




          <!--Masalah dan No Dokumen <input type="text" name="masalah" required="required"> <br/>-->
          <input class="form-control" id="exampleFormControlInput1" placeholder="Status" type="text" name="status" required="required" value="{{ $m->status }}" style="max-width: 300px;">  <br/>

<input class="form-control" id="exampleFormControlInput1" placeholder="No. Transaksi" type="text" name="transaksi" required="required" value="{{ $m->transaksi }}" style="max-width: 300px;">  <br/>


          <!--Judul masalah <input type="text" name="tipe" required="required"> <br/>-->
          <div class="form-group">
            <b>Keterangan</b>
            <textarea class="form-control" name="keterangan" value="{{ $m->keterangan }}">{{ $m->keterangan }}</textarea>
          </div>


          <!--Penyelesaian <input type="text" name="penyelesaian" required="required"> <br/>-->
          <div class="form-group">
            <b>No. Berita Acara</b>
            <textarea class="form-control" name="berita" value="{{ $m->berita }}">{{ $m->berita }}</textarea>
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

          

          <!--<div class="form-group">
            <b>Keterangan</b>
            <textarea class="form-control" name="keterangan"></textarea>
          </div>-->

          
          <button class="btn btn-success" type="submit" >Simpan</button>

          </form>
  


  </div>
  </div>
  </div>




  

@endforeach
@stop