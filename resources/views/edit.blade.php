@extends('master2')

@section('edit')
  <link href="kuning/css/jquery.steps.css" rel="stylesheet">




    <div class="container" style="margin-bottom: 20px;">
      <div class="card">
      <div class="card-body">


  <h3>Edit masalah</h3>
  <a href="/EDP" class="btn btn-info btn">Kembali</a>
  
  <br/>
  <br/>


 @foreach($fault as $m)      


    <form action="/bfm/update" method="post">
                {{ csrf_field() }}
                  <input type="hidden" name="no" value="{{ $m->no }}"> <br/>
                    
                  <!--
                  Tanggal Kejadian <input type="date" required="required" name="tproblem" value="{{ $m->tproblem }}"> <br/>
                  <input type="hidden" name="asal" value="{{ $m->no }}"> <br/>
                    Asal Lokasi + PIC <input type="text" required="required" name="asal" value="{{ $m->asal }}"> <br/>
                  <input type="hidden" name="lawan" value="{{ $m->no }}"> <br/>
                    Connecting PIC Lawan <input type="text" required="required" name="lawan" value="{{ $m->lawan }}"> <br/>
                  <input type="hidden" name="masalah" value="{{ $m->no }}"> <br/>
                    Masalah dan No Dokumen <input type="text" required="required" name="masalah" value="{{ $m->masalah }}"> <br/>
                  <input type="hidden" name="penyelesaian" value="{{ $m->no }}"> <br/>
                    Penyelesaian <input type="text" required="required" name="penyelesaian" value="{{ $m->penyelesaian }}"> <br/>
                  <input type="hidden" name="tgl" value="{{ $m->no }}"> <br/>
                    Tanggal Penyelesaian <input type="date" required="required" name="tgl" value="{{ $m->tgl }}"> <br/>
                  <input type="hidden" name="tipe" value="{{ $m->no }}"> <br/>
                    Tipe Masalah <input type="text" required="required" name="tipe" value="{{ $m->tipe }}"> <br/>
                    <input type="submit" value="Simpan Data">-->


                    <!--Tanggal Kejadian <input type="date" name="tproblem" required="required"> <br/>-->
          <label>tanggal kejadian</label>
           <input class="form-control" id="exampleFormControlInput1" placeholder="tanggal Kejadian" type="date" name="tproblem" required="required" value="{{ $m->tproblem }}" style="max-width: 300px;">  <br/>


          <!--Asal Lokasi + PIC<input type="text" name="asal" required="required"> <br/>-->
          <input class="form-control" id="exampleFormControlInput1" placeholder="lokasi-nama PIC" type="text" name="asal" required="required" value="{{ $m->asal }}" style="max-width: 300px;">  <br/>



          <!--Connecting PIC lawan <input type="text" name="lawan" required="required"> <br/>-->
          <input class="form-control" id="exampleFormControlInput1" placeholder="nama PIC pusat" type="text" name="lawan" required="required" value="{{ $m->lawan }}" style="max-width: 300px;">  <br/>




          <!--Masalah dan No Dokumen <input type="text" name="masalah" required="required"> <br/>-->
          <input class="form-control" id="exampleFormControlInput1" placeholder="NO Document terkait" type="text" name="masalah" required="required" value="{{ $m->masalah }}" style="max-width: 300px;">  <br/>
        
          <input class="form-control" id="exampleFormControlInput1" placeholder="Inti Permasalahan" type="text" name="inti" required="required" value="{{ $m->inti }}" style="max-width: 300px;">  <br/>


          <!--Judul masalah <input type="text" name="tipe" required="required"> <br/>-->
        <div class="form-group">
            <b>Judul masalah</b>
            <textarea name="tipe" class="summernote" id="code"></textarea>
          </div>


          <!--Penyelesaian <input type="text" name="penyelesaian" required="required"> <br/>-->
          <div class="form-group">
            <b>Penyelesaian</b>
            <textarea name="penyelesaian" class="summernote2" id="code"></textarea>
          </div>

  

          <!--Tanggal Penyelesaian <input type="date" name="tgl" required="required"> <br/>-->
          <label>tanggal penyelesaian</label>
          <input class="form-control" id="exampleFormControlInput1" placeholder="tanggal Kejadian" type="date" name="tgl" value="{{ $m->tgl }}" style="max-width: 300px;">  <br/>
          

          <!--<div class="form-group">
            <b>Keterangan</b>
            <textarea class="form-control" name="keterangan"></textarea>
          </div>-->

          
          <button class="btn btn-success" type="submit" >Simpan</button>

          </form>
  


  </div>
  </div>
  </div>



<!--{{ $tipe = $m->tipe }}   
{{ $penyelesaian = $m->penyelesaian }} -->

@endforeach
@endsection