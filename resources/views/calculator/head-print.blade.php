<style type="text/css">
  
  .kiri {
      text-align: left;
  }

  .tengah {
      text-align: center
  }


#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 12px;
  margin-top: 10px;
  max-width: 600px;

}

#customers table {

  max-width: 600px;

}

#customers td, #customers th,  {
  border: 2px solid #ddd;
  padding: 4px

}

#customers p{
  padding: 2px;
  margin: 2px;
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

#customers label {
font-weight: bold;
}

.tengah td{
  text-align: center;
  padding: 2px;
}

.bio td {
   padding-right: 50px;
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

.kop h5 {
  text-align: center;
  margin-top: -20px;
}

.kop h6 {
  text-align: right;
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

.Rekomendasi {

  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 12px;
  margin-top: 10px;
  max-width: 600px;

  width: 100%;
  font-size:15px;
  margin: 7 px;
}

.Rekomendasi p {
margin-bottom: 20px; 

}

.Rekomendasi label {
font-weight: bold;

}

.Rekomendasi span {
font-weight: bold;

}


  </style>

<div class="kop">
  <table align="center">
    <tr style="width: 100%;">
      <td id="logo" style="width: 50%;">
      <img width="100px" height="85px" src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/images/logo.png';?>"/>
      </td>


      <td id="kanan" style="width: 50%;">
      <p>IBI HRD-FR-013</p>
      </td>

    </tr>

    <tr>
      <td colspan="2" style="margin-top: -40px;">
      @if (Auth::user()->isOutlet())
        <h5>PT INDOBERKA INVESTAMA</h5>
        <h5>PENILAIAN PELAKSANAAN HASIL KERJA KARYAWAN</h5>
        <H5>{{ Auth::user()->name }}</H5>
      @endif
      
      @if (Auth::user()->isHRD() || Auth::user()->isBowner())
         <h5>PT INDOBERKA INVESTAMA</h5>
         <h5>PENILAIAN PELAKSANAAN HASIL KERJA KARYAWAN</h5>
         <h6>(LEVEL : KEPALA OUTLET/KEPALA BAGIAN)</h6>
       @endif
      </td>
    </tr>
  </table>
</div>


  @foreach ($human as $h)
<div class="bio">
<table>
  <tr>
      <td>NAMA</td>
      <td> : {{ $h -> name }}</td>
  </tr>

  <tr>
      <td>JABATAN</td>
      <td> : {{ $h -> job }}</td>
  </tr>

  <tr>
      <td>LOKASI</td>
      <td> : {{ $h -> location }}</td>
  </tr>
  <tr>
      <td>TANGGAL MASUK</td>
      <td> : {{ Carbon\Carbon::parse($h -> start_day)->format('d-M-Y') }} </td>
  </tr>
   @endforeach
   @foreach ($calc as $c)
  <tr>
      <td>PERIODE PENILAIAN</td>
      <td> : {{ Carbon\Carbon::parse($c -> pdate)->format('d-M-Y') }} </td>
  </tr>
   @endforeach
</table>
</div>
 
 
<br>


@foreach ($calc as $c)
<div class="table">
    <table id="customers">      
        <tr>
            <td>No</td>
            <td>FAKTOR /KRITERIA YANG DINILAI</td>
            <td>BOBOT</td>
            <td>HASIL NILAI</td>
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
            <label>1. Wawasan/Pengetahuan mengenai pekerjaan/job desk</label>
            </td>
            <td class="tengah">5%</td>
            <td class="tengah">   
            <p>{{ $c -> knowledge}}</p>
            </td>
            <td><p id="knowkuali"></p></td>
        </tr>
         

        <tr>
            <td></td>
            <td>
            <label for="wspeed">2. Kecepatan Kerja</label>
            </td>
            <td class="tengah">5%</td>
            <td class="tengah">
       
              <p id="wspeed">{{ $c -> wspeed}}</p>
            </td>
            <td><p id="speedkuali"></p></td>
        </tr>
         


        <tr>
            <td></td>
            <td>
             <label for="wsoul">3. Kemampuan menyelesaikan pekerjaan</label>
            </td>
            <td class="tengah">5%</td>
            <td class="tengah">
                <p id="wsoul">{{ $c -> wsoul}}</p>
            </td>
            <td><p id="soulkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
             <label for="wqual">4. Kualitas hasil pekerjaan</label>
            </td>
            <td class="tengah">5%</td>
             <td class="tengah">
          
                <p id="wqual">{{ $c -> wqual}}</p>
            </td>
            <td><p id="qualkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
             <label for="wpress">5. Prestasi kerja dibawah tekanan</label>
            </td>
             <td class="tengah">5%</td>
             <td class="tengah">
          
              <p id="wpress"> {{ $c -> wpress}}</p>
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
            <td class="tengah">50%</td>
            <td  style="text-align: center;">
            @php
            $totalA = $c -> knowledge +  $c -> wspeed + $c -> wsoul + $c -> wqual + $c -> wpress;
            @endphp
            {{ $totalA }}
            </td>
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
             <td class="tengah">5%</td>
             <td class="tengah">
         
              <p id="teamwork">{{ $c -> teamwork}}</p>
            </td>
            <td><p id="teamkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
              <label for="communicate">2. Komunikasi</label>
            </td>
             <td class="tengah">5%</td>
             <td class="tengah">
        
              <p id="communicate">{{ $c -> communicate}}</p>
            </td>
            <td><p id="comukuali"></p></td>
        </tr>


        <tr>
            <td></td>
            <td>
              <label for="responbility">3. Tanggung jawab</label>
            </td>
             <td class="tengah">5%</td>
             <td class="tengah">
           
              <p id="responbility">{{ $c -> responbility}}</p>
            </td>
            <td><p id="respkuali"></p></td>
        </tr>


         <tr>
            <td></td>
            <td>
              <label for="learning">4. Kemauan belajar</label>
            </td>
             <td class="tengah">5%</td>
             <td class="tengah">

              <p id="learning">{{ $c -> learning}}</p>
            </td>
            <td><p id="learnkuali"></p></td>
        </tr>


         <tr>
            <td></td>
            <td>
              <label for="dicipline">5. Disiplin kerja</label>
            </td>
             <td class="tengah">5%</td>
             <td class="tengah">
           
              <p id="dicipline">{{ $c -> dicipline}}</p>  
            </td>
            <td><p id="dicipkuali"></p></td>
        </tr>


        <tr>
            <td></td>
            <td>
              <label for="initiative">6. Inisiatif</label>
            </td>
             <td class="tengah">5%</td>
             <td class="tengah">
         
              <p id="initiative">{{ $c -> initiative}}</p>
            </td>
            <td><p id="initkuali"></p></td>
        </tr>


          <tr>
            <td></td>
            <td>
              <label for="creativity">7.Kreatifitas</label>
            </td>
             <td class="tengah">5%</td>
             <td class="tengah">
          
              <p id="creativity">{{ $c -> creativity}}</p>
            </td>
            <td><p id="creativkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
               <label for="honestly">8.Kejujuran</label>
            </td>
            <td class="tengah">5%</td>
             <td class="tengah">
           
              <p id="honestly">{{ $c -> honestly}}</p>
            </td>
            <td><p id="honeskuali"></p></td>
        </tr>

         <tr>
            <td></td>
            <td>
               <label for="obedience">9. Ketaatan</label>
            </td>
             <td class="tengah">5%</td>
             <td class="tengah">
             
                <p id="obedience">{{ $c -> obedience}}</p>
              </td>
            <td><p id="obedkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
               <label for="loyalty">10. Loyalitas / Kehadiran</label>
            </td>
             <td class="tengah">5%</td>
             <td class="tengah">
            
              <p id="loyalty">{{ $c -> loyalty}}</p>
            </td>
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
            <td class="tengah">50%</td>
            <td style="text-align: center;">
            @php
            $totalB = $c -> teamwork +  $c -> communicate + $c -> responbility + $c -> learning + $c -> dicipline + $c -> initiative + $c ->creativity + $c ->honestly + $c ->obedience + $c ->loyalty;
            @endphp
            {{ $totalB }}
            </td>
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
           <td class="tengah">5%</td>
            <td class="tengah">

              <p>{{ $c -> organate }}</p>
            </td>
            <td><p id="organatekuali"></p></td>
        </tr>


          <tr>
            <td></td>
            <td>
              <label for="creativity">2.Pembinaan / pengarahan</label>
            </td>
           <td class="tengah">5%</td>
            <td class="tengah">

              <p>{{ $c -> coaching }}</p>
            </td>
            <td><p id="coachingkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
               <label for="honestly">3.Pemeriksaan / pengendalian</label>
            </td>
           <td class="tengah">5%</td>
            <td class="tengah">
       
              <p>{{ $c -> controling }}</p>
            </td>
            <td><p id="controlkuali"></p></td>
        </tr>

         <tr>
            <td></td>
            <td>
               <label for="obedience">4. Perencanaan</label>
            </td>
            <td class="tengah">5%</td>
            <td class="tengah">

                <p>{{ $c -> planing }}</p>
              </td>
            <td><p id="plankuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
               <label for="loyalty">5. Pendelegasian</label>
            </td>
            <td class="tengah">5%</td>
            <td class="tengah">
              <p>{{ $c -> delegate }}</p>
            </td>
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
           <td class="tengah">25%</td>
            <td style="text-align: center;">
            @php
                $totalC = $c -> organate +  $c -> coaching + $c -> controling + $c -> planing + $c -> delegate;
            @endphp
            {{ $totalC }}
            </td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td style="text-align: center;"><strong>GENERAL TOTAL</strong></td>
            <td class="tengah">100%</td>
            <td style="text-align: center;"><p style="color: red; font-size: 15px;" id="gtotal">
            @php
            $gtotal = $totalA + $totalB + $totalC;
            @endphp
            {{ $gtotal }}
            </p></td>
            <td style="text-align: center;"><p style="font-size: 15px; color: red;" id="tkualitas">
                  @if($gtotal >= 90 && $gtotal <= 100)
                  A
                  @endif
                  @if($gtotal >= 70 && $gtotal <= 89)
                  B
                  @endif
                  @if($gtotal >= 50 && $gtotal <= 69)
                  C
                  @endif
                  @if($gtotal >= 30 && $gtotal <= 49)
                  D
                  @endif
                  @if($gtotal >= 20 && $gtotal <= 29)
                  E
                  @endif
                  @if($gtotal <= 19 && $gtotal >= 1)
                  Parah sih
                  @endif
                  @if($gtotal == null)
                  -
                  @endif
            </p></td>
        </tr>

    </table>
</div>




@endforeach


