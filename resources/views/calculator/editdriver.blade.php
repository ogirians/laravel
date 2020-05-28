@extends('layouts.bowner')

@section('content')

<body class="align-content-center">
@foreach ($human as $h)
@if (Auth::user()->isHRD())
<a class="btn btn-success" href="/HRD/calculator/tampstaff/">Kembali</a>
<form action="/HRD/calculator/storestaff" method="post" >
 @endif

 @if (Auth::user()->isOutlet())
<a class="btn btn-success" href="/outlet/choice/{{ Auth::user()->name }}">Kembali</a>
<form action="/outlet/storeeditdriver/{{ $h -> id}}" method="post" >
 @endif
@endforeach
<h2 class="font-weight-bold">PENILAIAN PELAKSANAAN HASIL KERJA KARYAWAN LEVEL DRIVER/HELPER</h2>

<br>

<div class="container">

{{ csrf_field() }}

 
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
  
   @if (Auth::user()->isBowner())
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
  @endif



@foreach ($human as $h)
  <div class="form-group">          
      <input type="hidden" class="form-control" name="id" required="required" value="{{ $h -> id }}">
  </div>
 @endforeach
  <div class="form-group">          
      <input type="hidden" class="form-control" name="user" required="required" value="{{ Auth::user()-> role_id }}">
  </div>

  <div class="form-group">          
      <input type="hidden" class="form-control" name="location" required="required" value="{{ Auth::user()-> name }}">
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
            <td>PENILAI 1 (RANGE 1-100)</td>
            <td>PENILAI 2 (RANGE 1-100)</td>
            <td>KUALITAS 1</td>
            <td>KUALITAS 2</td>
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
             <td>
              <div class="form-group">  
                <input type="number" class="form-control" name="knowledge2" id="knowledge2" required="required">
              </div>
            </td>
            <td><p id="knowkuali"></p></td>
            <td><p id="knowkuali2"></p></td>
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
             <td>
                <div class="form-group">
                  <input type="number" class="form-control" name="wqual2" id="wqual2" required="required">
                </div>
            </td>
            <td><p id="qualkuali"></p></td>
            <td><p id="qualkuali2"></p></td>
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
             <td>
              <div class="form-group">
              <input type="number" class="form-control" name="teamwork2" id="teamwork2" required="required">
              </div>
            </td>
            <td><p id="teamkuali"></p></td>
            <td><p id="teamkuali2"></p></td>
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
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="communicate2" id="communicate2" required="required">
              </div>
            </td>
            <td><p id="comukuali"></p></td>
            <td><p id="comukuali2"></p></td>
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
            </td>
            <td>
              <div class="form-group">  
                <input type="number" class="form-control" name="dicipline2" id="dicipline2" required="required">
              </div>
            </td>
            <td><p id="dicipkuali"></p></td>
            <td><p id="dicipkuali2"></p></td>
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
            </td>
             <td>
              <div class="form-group"> 
                <input type="number" class="form-control" name="initiative2" id="initiative2" required="required">
              </div>
            </td>
            <td><p id="initkuali"></p></td>
             <td><p id="initkuali2"></p></td>
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
            </td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="creativity2" id="creativity2" required="required">
              </div>
            </td>
            <td><p id="creativkuali"></p></td>
            <td><p id="creativkuali2"></p></td>
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
            </td>
             <td>
              <div class="form-group">
                <input type="number" class="form-control" name="honestly2" id="honestly2" required="required">
              </div>
            </td>
            <td><p id="honeskuali"></p></td>
             <td><p id="honeskuali2"></p></td>
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
            </td>
            <td>
                <div class="form-group">
                  <input type="number" class="form-control" name="obedience2" id="obedience2" required="required">
                </div>
            </td>
            <td><p id="obedkuali"></p></td>
            <td><p id="obedkuali2"></p></td>
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
            </td>
             <td>
              <div class="form-group">
                <input type="number" class="form-control" name="loyalty2" id="loyalty2" required="required">
              </div>
            </td>
            <td><p id="loyalkuali"></p></td>
            <td><p id="loyalkuali2"></p></td>
        </tr>

          <tr>
            <td></td>
            <td style="text-align: center;"><strong>TOTAL NILAI</strong></td>
            <td>100%</td>
            <td style="text-align: center;"><p style="color: red; font-size: 25px;" id="gtotal"></p></td>
            <td style="text-align: center;"><p style="color: red; font-size: 25px;" id="gtotal2"></p></td>
            <td style="text-align: center;"><p style="font-size: 25px; color: red;" id="tkualitas"></p></td>
            <td style="text-align: center;"><p style="font-size: 25px; color: red;" id="tkualitas2"></p></td>
        </tr>   
        <tr>
            <td></td>
            <td style="text-align: center;"><strong>GENERAL TOTAL RATA-RATA</strong></td>
            <td></td>
            <td style="text-align: center;" colspan="2"><p style="color: red; font-size: 25px;" id="gtotal-rata"></p></td>
            <td style="text-align: center;" colspan="2"><p style="font-size: 25px; color: red;" id="tkualitas-rata"></p></td>
        </tr>   
    </table>
</div>
      <label><strong>Catatan :</strong>
      <p>PENILAI 1 = Atasan Langsung (Adm. Gudang)</p>
      <p>PENILAI 2 = Atasan dari atasan langsung (kep.Outlet)</p></label>
    <br>
    <br>
    <label>Rekomendasi hasil penilaian </label>
         <div class="form-group">
              <label>penilai 1 </label>
              <textarea class="form-control" name="rekomend1" id="rekomend1" required="required"></textarea>
          </div>
            
            <div class="form-group">
              <label>penilai 2</label>
              <textarea class="form-control" name="rekomend2" id="rekomend2" required="required"></textarea>
          </div>

  

  
     <center>
    <a class="btn btn-success" id="Cek" onclick="showdriver ()">cek</a>
    <button onclick="return confirm('Simpan penilaian?')" type="submit" class="btn btn-warning" name="multiplication" value="*">Simpan</button>
    </center>
 
</div> 
</form>

</body>

@endsection