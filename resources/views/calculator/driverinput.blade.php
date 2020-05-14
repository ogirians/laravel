@extends('layouts.bowner')

@section('content')

<body class="align-content-center">
@if (Auth::user()->isBowner ())
<button> <a href="/calculator/choice/{{ Auth::user()->name }}">Kembali</a></button>
<form action="/calculator/storedrive" method="post" >

<h2 class="font-weight-bold">PENILAIAN PELAKSANAAN HASIL KERJA KARYAWAN</h2>

<br>

<div class="container">

{{ csrf_field() }}
  <div class="row">
    <div class="col col-lg-2" style="min-width: 100px;">  
        <label for="PERIODE" style="margin-top: 5px;">PERIODE</label>
    </div>
    <div class="col col-lg-3" style="min-width: 250px;">
        <div class="form-group">          
            <input type="date" class="form-control" name="pdate" required="required">
        </div>
    </div>
  </div>
 
  <div class="row">
    <div class="col col-lg-2" style="min-width: 100px;">
      <label for="nama" style="margin-top: 5px;"> NAMA </label>
    </div>
    <div class="col col-lg-3" style="min-width: 250px;">
       <div class="form-group">
            <input type="text" class="form-control" name="name" required="required">
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col col-lg-2" style="min-width: 100px;">
       <label for="exampleFormControlSelect1" style="margin-top: 5px;">JABATAN</label>
    </div>
    <div class="col col-lg-3" style="min-width: 250px;">
       <select class="form-control" id="exampleFormControlSelect1" name="position" required="required" value="{{ old('jabatan') }}">
              <option>-</option>
              <option>Driver</option>
              <option>Helper</option>           
        </select><br/>
    </div>
  </div>
  
  <div class="row">
    <div class="col col-lg-2" style="min-width: 100px;">
       <label for="exampleFormControlSelect1" style="margin-top: 5px;">LOKASI</label>
    </div>
    <div class="col col-lg-3  " style="min-width: 250px;">
      <select class="form-control" id="exampleFormControlSelect1" name="location" required="required" value="{{ old('location') }}">
              <option>{{ Auth::user()->username }}</option>
      </select>
              <br>
    </div>
  </div>

<table border="0" cellpadding="5" align="center">
  <form action="" method="post">
     <tr>
        <td>Harga :</td> 
        <td><input type="text" name="harga" id="harga" /></td>
     </tr> 
     <tr>
        <td>Diskon :</td> 
        <td><input type="text" name="diskon" id="diskon" /></td>
     </tr>
     <tr>
        <td>Yang Harus Dibayar :</td> 
        <td><input type="text" name="totBayar" id="totBayar" disabled /></td>
     </tr>  </form> 
</table> 
  
</div>
<br>
<br>

<div class="container">
  <div class="table-responsive">
    <table class="table table-hover table-bordered table-striped">      
        <tr>
            <td>No</td>
            <td>FAKTOR /KRITERIA YANG DINILAI</td>
            <td>BOBOT</td>
            <td>NILAI (RANGE 1-100)</td>
            <td>KUALITAS
        </tr>


        <tr>
            <td></td>
             <td>
            <label for="knowledge">1. Wawasan/Pengetahuan mengenai pekerjaan/job desk</label>
            </td>
            <td>15%</td>
            <td>
              <div class="form-group">  
                <input type="number" class="form-control" name="knowledge" required="required">
              </div>
            </td>
            <td></td>
        </tr>
  
        <tr>
            <td></td>
            <td>
             <label for="wqual">2. Kualitas hasil pekerjaan</label>
            </td>
            <td>5%</td>
            <td>
                <div class="form-group">
                  <input type="number" class="form-control" name="wqual" required="required">
                </div>
            </td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td>
              <label for="teamwork">3. Kemampuan Kerjasama</label>
            </td>
            <td>15%</td>
            <td>
              <div class="form-group">
              <input type="number" class="form-control" name="teamwork" required="required">
              </div>
            </td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td>
              <label for="communicate">4. Kemampuan Komunikasi</label>
            </td>
            <td>10%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="communicate" required="required">
              </div>
            </td>
            <td></td>
        </tr>

         <tr>
            <td></td>
            <td>
              <label for="dicipline">5. Disiplin kerja</label>
            </td>
            <td>10%</td>
            <td>
              <div class="form-group">  
                <input type="number" class="form-control" name="dicipline" required="required">
              </div>
            <td></td>
        </tr>


        <tr>
            <td></td>
            <td>
              <label for="initiative">6. Inisiatif</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group"> 
                <input type="number" class="form-control" name="initiative" required="required">
              </div>
            <td></td>
        </tr>


          <tr>
            <td></td>
            <td>
              <label for="creativity">7. Sopan Santun</label>
            </td>
            <td>10%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="creativity" required="required">
              </div>
            <td></td>
          </tr>

        <tr>
            <td></td>
            <td>
               <label for="honestly">8. Kejujuran</label>
            </td>
            <td>10%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="honestly" required="required">
              </div>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td>
               <label for="obedience">9. Kehadiran</label>
            </td>
            <td>15%</td>
            <td>
                <div class="form-group">
                  <input type="number" class="form-control" name="obedience" required="required">
                </div>
            <td></td>
        </tr>-->

        <tr>
            <td></td>
            <td>
               <label for="loyalty">10. Loyalitas / Kehadiran</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="loyalty" required="required">
              </div>
            <td></td>
        </tr>

          <tr>
            <td></td>
            <td style="text-align: center;"><strong>TOTAL NILAI</strong></td>
            <td>100%</td>
            <td></td>
            <td></td>
        </tr>     
    </table>
</div> 
</div> 
</div> 
    <button type="submit" class="btn btn-warning" name="multiplication" value="*">Simpan</button>
</form>
@endif

@if (Auth::user()->isHRD ())
<button> <a href="/HRD/calculator/tampdrive">Kembali</a></button>
<form action="/HRD/calculator/storedrive" method="post" >

<h2 class="font-weight-bold">PENILAIAN PELAKSANAAN HASIL KERJA KARYAWAN</h2>

<br>

<div class="container">

{{ csrf_field() }}
  <div class="row">
    <div class="col col-lg-2" style="min-width: 100px;">  
        <label for="PERIODE" style="margin-top: 5px;">PERIODE</label>
    </div>
    <div class="col col-lg-3" style="min-width: 250px;">
        <div class="form-group">          
            <input type="date" class="form-control" name="pdate" required="required">
        </div>
    </div>
  </div>
 
  <div class="row">
    <div class="col col-lg-2" style="min-width: 100px;">
      <label for="nama" style="margin-top: 5px;"> NAMA </label>
    </div>
    <div class="col col-lg-3" style="min-width: 250px;">
       <div class="form-group">
            <input type="text" class="form-control" name="name" required="required">
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col col-lg-2" style="min-width: 100px;">
       <label for="exampleFormControlSelect1" style="margin-top: 5px;">JABATAN</label>
    </div>
    <div class="col col-lg-3" style="min-width: 250px;">
       <select class="form-control" id="exampleFormControlSelect1" name="position" required="required" value="{{ old('jabatan') }}">
              <option>-</option>
              <option>Driver</option>
              <option>Helper</option>           
        </select><br/>
    </div>
  </div>
  
  <div class="row">
    <div class="col col-lg-2" style="min-width: 100px;">
       <label for="exampleFormControlSelect1" style="margin-top: 5px;">LOKASI</label>
    </div>
    <div class="col col-lg-3  " style="min-width: 250px;">
      <select class="form-control" id="exampleFormControlSelect1" name="location" required="required" value="{{ old('location') }}">
              <option>{{ Auth::user()->username }}</option>
      </select>
              <br>
    </div>
  </div>

<table border="0" cellpadding="5" align="center">
  <form action="" method="post">
     <tr>
        <td>Harga :</td> 
        <td><input type="text" name="harga" id="harga" /></td>
     </tr> 
     <tr>
        <td>Diskon :</td> 
        <td><input type="text" name="diskon" id="diskon" /></td>
     </tr>
     <tr>
        <td>Yang Harus Dibayar :</td> 
        <td><input type="text" name="totBayar" id="totBayar" disabled /></td>
     </tr>  </form> 
</table> 
  
</div>
<br>
<br>

<div class="container">
  <div class="table-responsive">
    <table class="table table-hover table-bordered table-striped">      
        <tr>
            <td>No</td>
            <td>FAKTOR /KRITERIA YANG DINILAI</td>
            <td>BOBOT</td>
            <td>NILAI (RANGE 1-100)</td>
            <td>KUALITAS
        </tr>


        <tr>
            <td></td>
             <td>
            <label for="knowledge">1. Wawasan/Pengetahuan mengenai pekerjaan/job desk</label>
            </td>
            <td>15%</td>
            <td>
              <div class="form-group">  
                <input type="number" class="form-control" name="knowledge" required="required">
              </div>
            </td>
            <td></td>
        </tr>
  
        <tr>
            <td></td>
            <td>
             <label for="wqual">2. Kualitas hasil pekerjaan</label>
            </td>
            <td>5%</td>
            <td>
                <div class="form-group">
                  <input type="number" class="form-control" name="wqual" required="required">
                </div>
            </td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td>
              <label for="teamwork">3. Kemampuan Kerjasama</label>
            </td>
            <td>15%</td>
            <td>
              <div class="form-group">
              <input type="number" class="form-control" name="teamwork" required="required">
              </div>
            </td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td>
              <label for="communicate">4. Kemampuan Komunikasi</label>
            </td>
            <td>10%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="communicate" required="required">
              </div>
            </td>
            <td></td>
        </tr>

         <tr>
            <td></td>
            <td>
              <label for="dicipline">5. Disiplin kerja</label>
            </td>
            <td>10%</td>
            <td>
              <div class="form-group">  
                <input type="number" class="form-control" name="dicipline" required="required">
              </div>
            <td></td>
        </tr>


        <tr>
            <td></td>
            <td>
              <label for="initiative">6. Inisiatif</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group"> 
                <input type="number" class="form-control" name="initiative" required="required">
              </div>
            <td></td>
        </tr>


          <tr>
            <td></td>
            <td>
              <label for="creativity">7. Sopan Santun</label>
            </td>
            <td>10%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="creativity" required="required">
              </div>
            <td></td>
          </tr>

        <tr>
            <td></td>
            <td>
               <label for="honestly">8. Kejujuran</label>
            </td>
            <td>10%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="honestly" required="required">
              </div>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td>
               <label for="obedience">9. Kehadiran</label>
            </td>
            <td>15%</td>
            <td>
                <div class="form-group">
                  <input type="number" class="form-control" name="obedience" required="required">
                </div>
            <td></td>
        </tr>-->

        <tr>
            <td></td>
            <td>
               <label for="loyalty">10. Loyalitas / Kehadiran</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="loyalty" required="required">
              </div>
            <td></td>
        </tr>

          <tr>
            <td></td>
            <td style="text-align: center;"><strong>TOTAL NILAI</strong></td>
            <td>100%</td>
            <td></td>
            <td></td>
        </tr>     
    </table>
</div> 
</div> 
</div> 
    <button type="submit" class="btn btn-warning" name="multiplication" value="*">Simpan</button>
</form>
@endif

@if (Auth::user()->isOutlet ())
<a class="btn btn-primary" href="/outlet/choice/{{ Auth::user()->name }}">Kembali</a>
<form action="/outlet/storedrive" method="post" >

<h2 class="font-weight-bold">PENILAIAN PELAKSANAAN HASIL KERJA KARYAWAN</h2>

<br>

<div class="container">

{{ csrf_field() }}
  <div class="row">
    <div class="col col-lg-2" style="min-width: 100px;">  
        <label for="PERIODE" style="margin-top: 5px;">PERIODE</label>
    </div>
    <div class="col col-lg-3" style="min-width: 250px;">
        <div class="form-group">          
            <input type="date" class="form-control" name="pdate" required="required">
        </div>
    </div>
  </div>
 
  <div class="row">
    <div class="col col-lg-2" style="min-width: 100px;">
      <label for="nama" style="margin-top: 5px;"> NAMA </label>
    </div>
    <div class="col col-lg-3" style="min-width: 250px;">
       <div class="form-group">
            <input type="text" class="form-control" name="name" required="required">
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col col-lg-2" style="min-width: 100px;">
       <label for="exampleFormControlSelect1" style="margin-top: 5px;">JABATAN</label>
    </div>
    <div class="col col-lg-3" style="min-width: 250px;">
       <select class="form-control" id="exampleFormControlSelect1" name="position" required="required" value="{{ old('jabatan') }}">
              <option>-</option>
              <option>Driver</option>
              <option>Helper</option>           
        </select><br/>
    </div>
  </div>
  
  <div class="row">
    <div class="col col-lg-2" style="min-width: 100px;">
       <label for="exampleFormControlSelect1" style="margin-top: 5px;">LOKASI</label>
    </div>
    <div class="col col-lg-3  " style="min-width: 250px;">
      <select class="form-control" id="exampleFormControlSelect1" name="location" required="required" value="{{ old('location') }}">
              <option>{{ Auth::user()->username }}</option>
      </select>
              <br>
    </div>
  </div>

<table border="0" cellpadding="5" align="center">
  <form action="" method="post">
     <tr>
        <td>Harga :</td> 
        <td><input type="text" name="harga" id="harga" /></td>
     </tr> 
     <tr>
        <td>Diskon :</td> 
        <td><input type="text" name="diskon" id="diskon" /></td>
     </tr>
     <tr>
        <td>Yang Harus Dibayar :</td> 
        <td><input type="text" name="totBayar" id="totBayar" disabled /></td>
     </tr>  </form> 
</table> 
  
</div>
<br>
<br>

<div class="container">
  <div class="table-responsive">
    <table class="table table-hover table-bordered table-striped">      
        <tr>
            <td>No</td>
            <td>FAKTOR /KRITERIA YANG DINILAI</td>
            <td>BOBOT</td>
            <td>NILAI (RANGE 1-100)</td>
            <td>KUALITAS
        </tr>


        <tr>
            <td></td>
             <td>
            <label for="knowledge">1. Wawasan/Pengetahuan mengenai pekerjaan/job desk</label>
            </td>
            <td>15%</td>
            <td>
              <div class="form-group">  
                <input type="number" class="form-control" name="knowledge" required="required">
              </div>
            </td>
            <td></td>
        </tr>
  
        <tr>
            <td></td>
            <td>
             <label for="wqual">2. Kualitas hasil pekerjaan</label>
            </td>
            <td>5%</td>
            <td>
                <div class="form-group">
                  <input type="number" class="form-control" name="wqual" required="required">
                </div>
            </td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td>
              <label for="teamwork">3. Kemampuan Kerjasama</label>
            </td>
            <td>15%</td>
            <td>
              <div class="form-group">
              <input type="number" class="form-control" name="teamwork" required="required">
              </div>
            </td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td>
              <label for="communicate">4. Kemampuan Komunikasi</label>
            </td>
            <td>10%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="communicate" required="required">
              </div>
            </td>
            <td></td>
        </tr>

         <tr>
            <td></td>
            <td>
              <label for="dicipline">5. Disiplin kerja</label>
            </td>
            <td>10%</td>
            <td>
              <div class="form-group">  
                <input type="number" class="form-control" name="dicipline" required="required">
              </div>
            <td></td>
        </tr>


        <tr>
            <td></td>
            <td>
              <label for="initiative">6. Inisiatif</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group"> 
                <input type="number" class="form-control" name="initiative" required="required">
              </div>
            <td></td>
        </tr>


          <tr>
            <td></td>
            <td>
              <label for="creativity">7. Sopan Santun</label>
            </td>
            <td>10%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="creativity" required="required">
              </div>
            <td></td>
          </tr>

        <tr>
            <td></td>
            <td>
               <label for="honestly">8. Kejujuran</label>
            </td>
            <td>10%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="honestly" required="required">
              </div>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td>
               <label for="obedience">9. Kehadiran</label>
            </td>
            <td>15%</td>
            <td>
                <div class="form-group">
                  <input type="number" class="form-control" name="obedience" required="required">
                </div>
            <td></td>
        </tr>-->

        <tr>
            <td></td>
            <td>
               <label for="loyalty">10. Loyalitas / Kehadiran</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="loyalty" required="required">
              </div>
            <td></td>
        </tr>

          <tr>
            <td></td>
            <td style="text-align: center;"><strong>TOTAL NILAI</strong></td>
            <td>100%</td>
            <td></td>
            <td></td>
        </tr>     
    </table>
</div> 
</div> 
</div> 
    <button type="submit" class="btn btn-warning" name="multiplication" value="*">Simpan</button>
</form>
@endif
</body>

@endsection