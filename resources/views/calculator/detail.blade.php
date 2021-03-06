@extends('layouts.bowner')

@section('content')



<style type="text/css">
  .kiri {
      text-align: left;
  }

  .tengah {
      text-align: center
  }

  .Rekomendasi textarea {
min-width: 400px;
  }
</style>

<body class="align-content-center">

@foreach ($human as $h)

 @if (Auth::user()->isHRD())
<a class="btn btn-success" href="{{route('HRD.humans.edit', $h->id)}}">Kembali</a>
<form action="/HRD/calculator/storestaff" method="post" >
 @endif

  @if (Auth::user()->isBowner())
<a class="btn btn-success" href="{{route('bowner.humans.edit', $h->id)}}">Kembali</a>
<form action="/outlet/storeeditstaff/{{ $h -> id }}" method="post" >
 @endif

 @if (Auth::user()->isOutlet())
<a class="btn btn-success" href="{{route('outlet.humans.edit', $h->id)}}">Kembali</a>
<form action="/outlet/storeeditstaff/{{ $h -> id }}" method="post" >
 @endif


@if ($h -> humans_level == 1)
<h2 class="font-weight-bold"> HASIL PENILAIAN KERJA KARYAWAN LEVEL KEPALA/KABAG</h2>
@endif
@if ($h -> humans_level == 2)
<h2 class="font-weight-bold"> HASIL PENILAIAN KERJA KARYAWAN LEVEL STAFF/ADMIN</h2>
@endif
@if ($h -> humans_level == 3)
<h2 class="font-weight-bold"> HASIL PENILAIAN KERJA KARYAWAN LEVEL DRIVER/HELPER</h2>
@endif

<br>

<div class="container">


{{ csrf_field() }}


@if ($h -> humans_level == 3)
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

  <div class="form-group">          
      <input type="hidden" class="form-control" name="location" required="required" value="{{ Auth::user()-> name }}">
  </div>
  
</div>

<br>
<br>

@foreach ($calc as $c)
<div class="container">
  <div class="table-responsive">
    <table class="table table-hover table-bordered table-striped">      
        <tr class="head">
            <td>No</td>
            <td>FAKTOR /KRITERIA YANG DINILAI</td>
            <td>BOBOT</td>
            <td>HASIL NILAI</td>
            <td>KUALITAS
        </tr>


        <tr>
            <td></td>
             <td>
            <label for="knowledge">1. Wawasan/Pengetahuan mengenai pekerjaan/job desk</label>
            </td>
            <td class="tengah">15%</td>
            <td class="tengah">
              <p id="knowledge">{{ $c -> knowledge }}</p>
            </td>
            <td><p id="knowkuali"></p></td>
        </tr>
  
        <tr>
            <td></td>
            <td>
             <label for="wqual">2. Kualitas hasil pekerjaan</label>
            </td>
            <td class="tengah">5%</td>
            <td class="tengah">
        
                <p id="wqual"> {{ $c -> wqual }}</p>
            </td>
            <td><p id="qualkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
              <label for="teamwork">3. Kemampuan Kerjasama</label>
            </td>
            <td class="tengah">15%</td>
            <td class="tengah">
            
                <p id="teamwork">{{ $c -> teamwork }}</p>
            </td>
            <td><p id="teamkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
              <label for="communicate">4. Kemampuan Komunikasi</label>
            </td>
            <td class="tengah">10%</td>
           <td class="tengah">
      
                <p id="communicate">{{ $c -> communicate }}</p>
            </td>
            <td><p id="comukuali"></p></td>
        </tr>

         <tr>
            <td></td>
            <td>
              <label for="dicipline">5. Disiplin kerja</label>
            </td>
            <td class="tengah">10%</td>
            <td class="tengah">
      
               <p id="dicipline"> {{ $c -> dicipline }}</p>
            <td><p id="dicipkuali"></p></td>
        </tr>


        <tr>
            <td></td>
            <td>
              <label for="initiative">6. Inisiatif</label>
            </td>
            <td class="tengah">5%</td>
            <td class="tengah">
        
                <p id="initiative">{{ $c -> initiative }}</p>
            <td><p id="initkuali"></p></td>
        </tr>


          <tr>
            <td></td>
            <td>
              <label for="creativity">7. Sopan Santun</label>
            </td>
            <td class="tengah">10%</td>
            <td class="tengah">
            
                <p id="creativity">{{ $c -> creativity }}</p>
            <td><p id="creativkuali"></p></td>
          </tr>

        <tr>
            <td></td>
            <td>
               <label for="honestly">8. Kejujuran</label>
            </td>
            <td class="tengah">10%</td>
            <td class="tengah">
      
               <p id="honestly"> {{ $c -> honestly }}</p>
            <td><p id="honeskuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
               <label for="obedience">9. Kehadiran</label>
            </td>
            <td class="tengah">15%</td>
            <td class="tengah">
          
                <p id="obedience">  {{ $c -> obedience }}</p>
            <td><p id="obedkuali"></p></td>
        </tr>

        <tr>
            <td></td>
            <td>
               <label for="loyalty">10. Loyalitas / Kehadiran</label>
            </td>
            <td class="tengah">5%</td>
            <td class="tengah">
    
               <p id="loyalty"> {{ $c -> loyalty }}</p>
            <td><p id="loyalkuali"></p></td>
        </tr>

          <tr>
            <td></td>
            <td style="text-align: center;"><strong>TOTAL NILAI</strong></td>
            <td class="tengah">100%</td>
             <td style="text-align: center;">
              <p style="color: red; font-size: 25px;" id="gtotal"></p>
             </td>
            <td style="text-align: center;"><p style="font-size: 25px; color: red;" id="tkualitas"></p></td>
        </tr>     
    </table>
</div> 
<div class="Rekomendasi">
<label> Rekomendasi hasil penilaian</label>
<div class="row">
  <div class="col-lg-6">
          <div class="form-group">
          <label>Penilai 1 </label>
              <textarea class="form-control" name="rekomend1" id="rekomend1" required="required" disabled>{{ $c -> rekomend1}}</textarea>
          </div>
   </div>  
   <div class="col-lg-6">     
            <div class="form-group">
              <label>Penilai 2</label>
              <textarea class="form-control" name="rekomend2" id="rekomend2" required="required" disabled>{{ $c -> rekomend2 }}</textarea>
          </div>
    </div>
</div>
</div>


<a class="btn btn-info" href="/drivernilaipdf/{{$h -> id}}/null/{{ $c ->no }}">Download PDF</a>



<script type="text/javascript">
 $(document).ready(function(){

        var knowledge  = {{ $c -> knowledge }};
        var wqual  = {{ $c -> wqual }};
        var teamwork  = {{ $c -> teamwork }};
        var communicate  = {{ $c -> communicate}};
        var dicipline  = {{ $c -> dicipline }};
        var initiative  = {{ $c -> initiative }};
        var creativity   = {{ $c -> creativity  }};
        var honestly  = {{ $c -> honestly }};
        var obedience  = {{ $c -> obedience }};
        var loyalty   = {{ $c -> loyalty  }};

        var rata2 = knowledge  +  wqual + teamwork + communicate + dicipline + initiative + creativity 
        + honestly + obedience + loyalty;

        var gtotal = rata2 ;
        var tkuali = kualitas(gtotal);
        
        document.getElementById("gtotal").innerHTML = gtotal;
        document.getElementById("tkualitas").innerHTML = tkuali;
      });
</script>



@endforeach


</div> 


@endif


@if ($h -> humans_level == 2)


 
  <div class="row">
    <div class="col col-lg-2" style="min-width: 100px;">
      <label for="nama" style="margin-top: 5px;"> NAMA </label>
    </div>
    <div class="col col-lg-3" style="min-width: 250px;">
       <div class="form-group">
            <select class="form-control" id="exampleFormControlSelect1" name="name" required="required" value="{{ old('nama') }}">
              
                  <option>{{ $h -> name }}</option>
               
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

   



   <div class="form-group">          
      <input type="hidden" class="form-control" name="user" required="required" value="{{ Auth::user()-> role_id }}">
  </div>

  <div class="form-group">          
      <input type="hidden" class="form-control" name="location" required="required" value="{{ Auth::user()-> name }}">
  </div>


</div>
<br>
<br>

@foreach ($calc as $c)
<div class="container">
  <div class="table-responsive">
    <table class="table table-hover table-bordered table-striped" id="forpenilaian">      
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
            <label for="knowledge">1. Wawasan/Pengetahuan mengenai pekerjaan/job desk</label>
            </td>
            <td class="tengah">15%</td>
             <td class="tengah">
         
              <p id="knowledge"> {{ $c -> knowledge}}</p>
            </td>
            <td><p id="knowkuali"></p></td>
        </tr>
         

        <tr>
            <td></td>
            <td>
            <label for="wspeed">2. Kecepatan Kerja</label>
            </td>
            <td class="tengah">10%</td>
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
            <td class="tengah">10%</td>
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
            <td class="tengah">10%</td>
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
            <td  style="text-align: center;"><p id="rata2"></p></td>
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
            <td style="text-align: center;"><p id="rata22"></p></td>
            <td></td>
        </tr>

          <tr>
            <td></td>
            <td style="text-align: center;"><strong>GENERAL TOTAL</strong></td>
            <td class="tengah">100%</td>
            <td style="text-align: center;"><p style="color: red; font-size: 25px;" id="gtotal"></td>
            <td style="text-align: center;"><p style="font-size: 25px; color: red;" id="tkualitas"></p></td>
        </tr>

        
         
         
    </table>
</div> 
<div class="Rekomendasi">
<label> Rekomendasi hasil penilaian :</label>
<div class="row">
    <div class="col-lg-6">
          <div class="form-group">
          <label>1. Wawasan Pekerjaan </label>
              <textarea class="form-control" name="rekomend1" id="rekomend1" required="required" disabled>{{ $c -> rekomend1}}</textarea>
          </div>
      </div>
      <div class="col-lg-6">
            <div class="form-group">
              <label>2. Kemampuan dan kualitas hasil kerja</label>
              <textarea class="form-control" name="rekomend2" id="rekomend2" required="required" disabled>{{ $c -> rekomend2 }}</textarea>
          </div>
        </div>
</div>
<div class="row">
     <div class="col-lg-6">
          <div class="form-group">
              <label>3. Tanggung jawab</label>
              <textarea class="form-control" name="rekomend3" id="rekomend3" required="required" disabled>{{ $c -> rekomend3 }}</textarea>
          </div>
    </div>
     <div class="col-lg-6">
           <div class="form-group">
              <label>4. Ketaatan</label>
              <textarea class="form-control" name="rekomend4" id="rekomend4" required="required" disabled>{{ $c -> rekomend4 }}</textarea>
          </div>
      </div>
</div>
<div class="row">
    <div class="col-lg-6">
          <div class="form-group">
              <label>5. disiplin</label>
              <textarea class="form-control" name="rekomend5" id="rekomend5" required="required" disabled>{{ $c -> rekomend5 }}</textarea>
          </div>
    </div>
</div>
</div>

<a class="btn btn-info" href="/staffnilaipdf/{{ $h -> id }}/null/{{ $c ->no }}">Download PDF</a>

</div>

<script type="text/javascript">
   $(document).ready(function(){

 
        var knowledge  = {{  $c -> knowledge }};
        var wspeed  = {{  $c -> wspeed }};
        var wsoul  = {{  $c -> wsoul }};
        var wqual  = {{  $c -> wqual }};
        var wpress  = {{  $c -> wpress }};

       

        var teamwork  = {{  $c -> teamwork }};
        var communicate  =  {{  $c -> communicate }};
        var responbility  =  {{  $c -> responbility }};
        var learning  =   {{  $c -> learning }};
        var dicipline  =   {{  $c -> dicipline }};
        var initiative  =   {{  $c -> initiative }};
        var creativity  =   {{  $c -> creativity }};
        var honestly  =   {{  $c -> honestly }};
        var obedience  =   {{  $c ->  obedience }};
        var loyalty  =   {{  $c -> loyalty }};

        var rata2 = knowledge  +  wspeed   +  wsoul  +  wqual  +  wpress ;
        var rata22 = teamwork + communicate  + responbility + learning + dicipline  + initiative  + creativity + honestly  + obedience  + loyalty;   
        var gtotal = rata2 + rata22;
        var tkuali = kualitas(gtotal);
        document.getElementById("rata2").innerHTML = rata2;
        document.getElementById("rata22").innerHTML = rata22;
        document.getElementById("gtotal").innerHTML = gtotal;
        document.getElementById("tkualitas").innerHTML = tkuali;
      });
</script>

@endforeach


@endif





@if ($h -> humans_level == 1)

 <div class="row">
    <div class="col col-lg-2" style="min-width: 100px;">
      <label for="nama" style="margin-top: 5px;"> NAMA </label>
    </div>
    <div class="col col-lg-3" style="min-width: 250px;">
       <div class="form-group">
            <select class="form-control" id="exampleFormControlSelect1" name="name" required="required" value="{{ old('nama') }}">
              
                  <option>{{ $h -> name }}</option>
               
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


   <div class="form-group">          
      <input type="hidden" class="form-control" name="user" required="required" value="{{ Auth::user()-> role_id }}">
  </div>

  <div class="form-group">          
      <input type="hidden" class="form-control" name="location" required="required" value="{{ Auth::user()-> name }}">
  </div>


</div>
<br>
<br>

@foreach ($calc as $c)
<div class="container">
  <div class="table-responsive">
    <table class="table table-hover table-bordered table-striped" id="forpenilaian">      
        <tr>
            <td>No</td>
            <td>FAKTOR /KRITERIA YANG DINILAI</td>
            <td class="tengah">BOBOT</td>
            <td class="tengah">HASIL NILAI</td>
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
            <td class="tengah">5%</td>
            <td class="tengah">
              {{ $c -> knowledge }}
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
              {{ $c -> wspeed }}
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
                {{ $c -> wsoul }}
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

                {{ $c -> wqual }}

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

               {{ $c -> wpress }}
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
           <td class="tengah">25%</td>
            <td  style="text-align: center;"><p id="rata2"></p></td>
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

              {{ $c -> teamwork }}
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

              {{ $c -> communicate }}
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

              {{ $c -> responbility }}
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

              {{ $c -> learning }}
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
      
              {{ $c -> dicipline }}
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
              {{ $c -> initiative }}
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

              {{ $c -> creativity }}
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
              {{ $c -> honestly }}
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
                {{ $c -> obedience }}
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
 
              {{ $c -> loyalty }}

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
            <td style="text-align: center;"><p id="rata22"></p></td>
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

              {{ $c -> organate }}
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

              {{ $c -> coaching }}
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
       
              {{ $c -> controling }}
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

                {{ $c -> planing }}
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
              {{ $c -> delegate }}
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
            <td style="text-align: center;"><p id="rata222"></p></td>
            <td></td>
        </tr>


          <tr>
            <td></td>
            <td style="text-align: center;"><strong>GENERAL TOTAL</strong></td>
          <td class="tengah">100%</td>
            <td style="text-align: center;"><p style="color: red; font-size: 25px;" id="gtotal"></p></td>
            <td style="text-align: center;"><p style="font-size: 25px; color: red;" id="tkualitas"></p></td>
          </tr>

        
         
         
    </table>

</div> 
</div>

<a class="btn btn-info" href="/headnilaipdf/{{ $h -> id }}/null/{{ $c->no }}">Download PDF</a>

<script type="text/javascript">
   $(document).ready(function(){

 
        var knowledge  =   {{ $c -> knowledge }};
        var wspeed  =   {{ $c -> wspeed }};
        var wsoul  =   {{ $c -> wsoul }};
        var wqual  =   {{  $c -> wqual }};
        var wpress  =   {{  $c -> wpress }};

       

        var teamwork  =   {{  $c -> teamwork }};
        var communicate  =   {{  $c -> communicate }};
        var responbility  =   {{  $c -> responbility }};
        var learning  =   {{  $c -> learning }} ;
        var dicipline  =   {{  $c -> dicipline }} ;
        var initiative  =   {{  $c -> initiative }} ;
        var creativity  =   {{  $c -> creativity }} ;
        var honestly  =   {{  $c -> honestly }} ;
        var obedience  =   {{  $c ->  obedience }} ;
        var loyalty  =   {{  $c -> loyalty }} ;


        var organate  =   {{  $c -> organate }} ;
        var coaching  =   {{  $c -> coaching }} ;
        var controling  =   {{  $c -> controling }} ;
        var planing  =   {{  $c -> planing }} ;
        var delegate  =   {{  $c -> delegate }} ;
        

        var rata2 = knowledge  +  wspeed   +  wsoul  +  wqual  +  wpress ;
        var rata22 = teamwork + communicate  + responbility + learning + dicipline  + initiative  + creativity + honestly  + obedience  + loyalty; 
        var rata222 = organate  +  coaching   +  controling  +  planing  +  delegate ; 
        
        var gtotal = rata2 + rata22 + rata222;
        var tkuali = kualitas(gtotal);
        document.getElementById("rata2").innerHTML = rata2;
        document.getElementById("rata22").innerHTML = rata22;
        document.getElementById("rata222").innerHTML = rata222;
        document.getElementById("gtotal").innerHTML = gtotal;
        document.getElementById("tkualitas").innerHTML = tkuali;
      });
</script>
@endforeach

@endif

@endforeach

</form>



</body>

@endsection