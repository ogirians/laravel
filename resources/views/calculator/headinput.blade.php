@extends('layouts.bowner')

@section('content')

<body class="align-content-center">


<a class="btn btn-success" href="/calculator/choice">Kembali</a>
<form action="/bowner/storehead" method="post" >


<h2 class="font-weight-bold">PENILAIAN PELAKSANAAN HASIL KERJA KARYAWAN LEVEL KEPALA/KABAG</h2>

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
    <table class="table table-hover table-bordered table-striped" id="forpenilaian">      
        <tr>
            <td>No</td>
            <td>FAKTOR /KRITERIA YANG DINILAI</td>
            <td>BOBOT</td>
            <td>NILAI (RANGE 1-100)</td>
            <td>KUALITAS</td>
        </tr>

        <tr>
            <td>A</td>
            <td>SKILL / PRESTASI KERJA</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td></td>
             <td>
            <label for="knowledge">1. Wawasan/Pengetahuan mengenai pekerjaan/job desk</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group">  
                <input type="number" class="form-control" name="knowledge" id="knowledge" required="required" min="0" max="100">
              </div>
            </td>
            <td><p id="knowkuali"></p></td>
        </tr>
         

        <tr>
            <td></td>
            <td>
            <label for="wspeed">2. Kecepatan Kerja</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="wspeed" id="wspeed" required="required"  min="0" max="100">
              </div>
            </td>
            <td><p id="speedkuali"></p></td>
        </tr>
         


        <tr>
            <td></td>
            <td>
             <label for="wsoul">3. Kemampuan menyelesaikan pekerjaan</label>
            </td>
            <td>5%</td>
            <td>
                <div class="form-group">
                   <input type="number" class="form-control" name="wsoul" id="wsoul" required="required"  min="0" max="100">
                </div>
            </td>
            <td><p id="soulkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
             <label for="wqual">4. Kualitas hasil pekerjaan</label>
            </td>
            <td>5%</td>
            <td>
                <div class="form-group">
                  <input type="number" class="form-control" name="wqual" id="wqual" required="required"  min="0" max="100">
                </div>
            </td>
            <td><p id="qualkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
             <label for="wpress">5. Prestasi kerja dibawah tekanan</label>
            </td>
            <td>5%</td>
            <td>
               <div class="form-group">
                 <input type="number" class="form-control" name="wpress" id="wpress" required="required"  min="0" max="100">
               </div>
            </td>
            <td><p id="presskuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td style="text-align: center;"></td>
            <td></td> 
            <td></td>
            <td></td>
        </tr>


         <tr>
            <td></td>
            <td style="text-align: center;">TOTAL (BOBOT X RATA-RATA)</td>
            <td>25    %</td>
            <td  style="text-align: center;"><p id="rata"></p></td>
            <td></td>
        </tr>

         <tr>
            <td>B</td>
            <td>PERSONALITY / SIKAP KERJA</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td>
              <label for="teamwork">1. Kerjasama</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group">
              <input type="number" class="form-control" name="teamwork" required="required" id="teamwork"  min="0" max="100">
              </div>
            </td>
            <td><p id="teamkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
              <label for="communicate">2. Komunikasi</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="communicate" required="required" id="communicate"  min="0" max="100">
              </div>
            </td>
            <td><p id="comukuali"></p></td>
        </tr>


        <tr>
            <td></td>
            <td>
              <label for="responbility">3. Tanggung jawab</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="responbility" required="required" id="responbility"  min="0" max="100">
              </div>
            </td>
            <td><p id="respkuali"></p></td>
        </tr>


         <tr>
            <td></td>
            <td>
              <label for="learning">4. Kemauan belajar</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="learning" required="required" id="learning"  min="0" max="100">
              </div>
            </td>
            <td><p id="learnkuali"></p></td>
        </tr>


         <tr>
            <td></td>
            <td>
              <label for="dicipline">5. Disiplin kerja</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group">  
                <input type="number" class="form-control" name="dicipline" required="required" id="dicipline"  min="0" max="100">
              </div></td>
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
                <input type="number" class="form-control" name="initiative" required="required" id="initiative"  min="0" max="100">
              </div></td>
            <td><p id="initkuali"></p></td>
        </tr>


          <tr>
            <td></td>
            <td>
              <label for="creativity">7.Kreatifitas</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="creativity" required="required" id="creativity"  min="0" max="100">
              </div></td>
            <td><p id="creativkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
               <label for="honestly">8.Kejujuran</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="honestly" required="required" id="honestly"  min="0" max="100">
              </div></td>
            <td><p id="honeskuali"></p></td>
        </tr>

         <tr>
            <td></td>
            <td>
               <label for="obedience">9. Ketaatan</label>
            </td>
            <td>5%</td>
            <td>
                <div class="form-group">
                  <input type="number" class="form-control" name="obedience" required="required" id="obedience"  min="0" max="100">
                </div></td>
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
                <input type="number" class="form-control" name="loyalty" required="required" id="loyalty"  min="0" max="100">
              </div></td>
            <td><p id="loyalkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td style="text-align: center;"></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td style="text-align: center;">TOTAL (BOBOT X RATA-RATA)</td>
            <td>50%</td>
            <td style="text-align: center;"><p id="rata2"></p></td>
            <td></td>
        </tr>

        <tr>
            <td>C</td>
            <td>KEPEMIMPINAN / MANAGERIAL SKILL </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

            <tr>
            <td></td>
            <td>
              <label for="initiative">1. Pengorganisasian</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group"> 
                <input type="number" class="form-control" name="organate" required="required" id="organate"  min="0" max="100">
              </div></td>
            <td><p id="organatekuali"></p></td>
        </tr>


          <tr>
            <td></td>
            <td>
              <label for="creativity">2.Pembinaan / pengarahan</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="coaching" required="required" id="coaching"  min="0" max="100">
              </div></td>
            <td><p id="coachingkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
               <label for="honestly">3.Pemeriksaan / pengendalian</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="controling" required="required" id="controling"  min="0" max="100">
              </div></td>
            <td><p id="controlkuali"></p></td>
        </tr>

         <tr>
            <td></td>
            <td>
               <label for="obedience">4. Perencanaan</label>
            </td>
            <td>5%</td>
            <td>
                <div class="form-group">
                  <input type="number" class="form-control" name="planing" required="required" id="planing"  min="0" max="100">
                </div></td>
            <td><p id="plankuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
               <label for="loyalty">5. Pendelegasian</label>
            </td>
            <td>5%</td>
            <td>
              <div class="form-group">
                <input type="number" class="form-control" name="delegate" required="required" id="delegate"  min="0" max="100">
              </div></td>
            <td><p id="delegatekuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td style="text-align: center;"></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td style="text-align: center;">TOTAL (BOBOT X RATA-RATA)</td>
            <td>25%</td>
            <td style="text-align: center;"><p id="rata3"></p></td>
            <td></td>
        </tr>


          <tr>
            <td></td>
            <td style="text-align: center;"><strong>GENERAL TOTAL</strong></td>
            <td>100%</td>
            <td style="text-align: center;"><p style="color: red; font-size: 25px;" id="gtotal"></p></td>
            <td style="text-align: center;"><p style="font-size: 25px; color: red;" id="tkualitas"></p></td>
          </tr>

        
         
         
    </table>

    <center>
    <a class="btn btn-success" id="Cek" onclick="showhead()">cek</a>
    <button onclick="return confirm('Simpan penilaian?')" type="submit" class="btn btn-warning" name="multiplication" value="*">Simpan</button>
    </center>

</div> 
</div>



</form>

</body>

@endsection