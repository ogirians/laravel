@extends('layouts.bowner')

@section('content')

<body class="align-content-center">

@if (Auth::user()->isHRD())
<a class="btn btn-success" href="/HRD/calculator/tampstaff/">Kembali</a>
<form action="/HRD/calculator/storestaff" method="post" >
 @endif

 @if (Auth::user()->isOutlet())
<a class="btn btn-success" href="/outlet/choice/{{ Auth::user()->name }}">Kembali</a>
<form action="/outlet/storedrive" method="post" >
 @endif

<h2 class="font-weight-bold">PENILAIAN PELAKSANAAN HASIL KERJA KARYAWAN LEVEL DRIVER/HELPER</h2>

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
            <select class="form-control" id="exampleFormControlSelect1" name="name" required="required" value="{{ old('nama') }}">
               @foreach ($human as $h)
                  <option>{{ $h -> name }}</option>
               @endforeach  
            </select>  
        <br/>
    </div>
        </div>
    </div>
  

  <div class="row">
    <div class="col col-lg-2" style="min-width: 100px;">
       <label for="exampleFormControlSelect1" style="margin-top: 5px;">JABATAN</label>
    </div>
    <div class="col col-lg-3" style="min-width: 250px;">
       <select class="form-control" id="exampleFormControlSelect1" name="position" required="required" value="{{ old('jabatan') }}">
              @foreach ($human as $h)
                  <option>{{ $h -> job }}</option>
               @endforeach           
        </select><br/>
    </div>
  </div>
  
  <div class="row">
    <div class="col col-lg-2" style="min-width: 100px;">
       <label for="exampleFormControlSelect1" style="margin-top: 5px;">LOKASI</label>
    </div>
    <div class="col col-lg-3  " style="min-width: 250px;">
      <select class="form-control" id="exampleFormControlSelect1" name="location" required="required" value="{{ old('location') }}">
             @foreach ($human as $h)
                  <option>{{ $h -> location }}</option>
               @endforeach    
      </select>
      <br>
    </div>
  </div>



@foreach ($human as $h)
  <div class="form-group">          
      <input type="hidden" class="form-control" name="id" required="required" value="{{ $h -> id }}">
  </div>
 @endforeach
  <div class="form-group">          
      <input type="hidden" class="form-control" name="user" required="required" value="{{ Auth::user()-> role_id }}">
  </div>

  
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
                <input type="number" class="form-control" name="knowledge" id="knowledge" required="required">
              </div>
            </td>
            <td><p id="knowkuali"></p></td>
        </tr>
  
        <tr>
            <td></td>
            <td>
             <label for="wqual">2. Kualitas hasil pekerjaan</label>
            </td>
            <td>5%</td>
            <td>
                <div class="form-group">
                  <input type="number" class="form-control" name="wqual" id="wqual" required="required">
                </div>
            </td>
            <td><p id="qualkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
              <label for="teamwork">3. Kemampuan Kerjasama</label>
            </td>
            <td>15%</td>
            <td>
              <div class="form-group">
              <input type="number" class="form-control" name="teamwork" id="teamwork" required="required">
              </div>
            </td>
            <td><p id="teamkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
              <label for="communicate">4. Kemampuan Komunikasi</label>
            </td>
            <td>10%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="communicate" id="communicate" required="required">
              </div>
            </td>
            <td><p id="comukuali"></p></td>
        </tr>

         <tr>
            <td></td>
            <td>
              <label for="dicipline">5. Disiplin kerja</label>
            </td>
            <td>10%</td>
            <td>
              <div class="form-group">  
                <input type="number" class="form-control" name="dicipline" id="dicipline" required="required">
              </div>
            <td><p id="dicipkuali"></p></td>
        </tr>


        <tr>
            <td></td>
            <td>
              <label for="initiative">6. Inisiatif</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group"> 
                <input type="number" class="form-control" name="initiative" id="initiative" required="required">
              </div>
            <td><p id="initkuali"></p></td>
        </tr>


          <tr>
            <td></td>
            <td>
              <label for="creativity">7. Sopan Santun</label>
            </td>
            <td>10%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="creativity" id="creativity" required="required">
              </div>
            <td><p id="creativkuali"></p></td>
          </tr>

        <tr>
            <td></td>
            <td>
               <label for="honestly">8. Kejujuran</label>
            </td>
            <td>10%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="honestly" id="honestly" required="required">
              </div>
            <td><p id="honeskuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
               <label for="obedience">9. Kehadiran</label>
            </td>
            <td>15%</td>
            <td>
                <div class="form-group">
                  <input type="number" class="form-control" name="obedience" id="obedience" required="required">
                </div>
            <td><p id="obedkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
               <label for="loyalty">10. Loyalitas / Kehadiran</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="loyalty" id="loyalty" required="required">
              </div>
            <td><p id="loyalkuali"></p></td>
        </tr>

          <tr>
            <td></td>
            <td style="text-align: center;"><strong>TOTAL NILAI</strong></td>
            <td>100%</td>
             <td style="text-align: center;"><p style="color: red; font-size: 25px;" id="gtotal"></p></td>
            <td style="text-align: center;"><p style="font-size: 25px; color: red;" id="tkualitas"></p></td>
        </tr>     
    </table>

     <center>
    <a class="btn btn-success" id="Cek" onclick="showdriver ()">cek</a>
    <button onclick="return confirm('Simpan penilaian?')" type="submit" class="btn btn-warning" name="multiplication" value="*">Simpan</button>
    </center>
</div> 
</div> 

</form>

</body>

@endsection