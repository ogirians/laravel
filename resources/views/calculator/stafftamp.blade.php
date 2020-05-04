@extends('layouts.bowner')

@section('content')
      <!-- Content Row (INI YANG DIRUBAH) -->
  <style type="text/css">
    .pagination li{
      float: left;
      list-style-type: none;
      margin:5px;
    }
  </style>
 
  
  <h3>Data Nilai</h3>
   @if (Auth::user()->isBowner())
      <button> <a href="/calculator/inputstaff">Input Penilaian</a></button>
      <button> <a href="/calculator">Kembali</a></button>
   @endif
   @if (Auth::user()->isHRD())
      <button> <a href="/HRD/calculator/inputstaff">Input Penilaian</a></button>
      <button> <a href="/HRD">Kembali</a></button>
   @endif
   @if (Auth::user()->isOutlet())
      <button> <a href="/outlet/inputstaff">Input Penilaian</a></button>
      <button> <a href="/outlet/choice">Kembali</a></button>
   @endif
    
  <br/>
  <br/>
   <body>
      <div class="container">    
        <br />
        <br />
      <div class="table-responsive">
        
         <p>Cari Nilai karyawan:</p>
           <form action="/calculator/caristaff" method="GET">
               <input type="text" name="cari" placeholder="Cari Masalah .." value="{{ old('cari') }}">
               <input type="submit" value="CARI">
           </form>

 <table class="table table-hover table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Jabatan</th>
          <th>Performance Exam Date</th>
          <th>Wawasan atau Pengetahuan mengenai pekerjaan (Job Desk)</th>
          <th>Kecepatan kerja</th>
          <th>Kemampuan menyelesaikan pekerjaan</th>
          <th>Kualitas hasil pekerjaan</th>
          <th>Prestasi kerja dibawah tekanan</th>
          <th>Kerjasama</th>
          <th>Komunikasi</th>
          <th>Tanggung jawab</th>
          <th>Kemauan belajar</th>
          <th>Disiplin kerja</th>
          <th>Inisiatif</th>
          <th>Kreatifitas</th>
          <th>Kejujuran</th>
          <th>Ketaatan</th>
          <th>Loyalitas / Kehadiran</th>
          <th>Total</th>
        </tr> 
      </thead>
      <tbody>



<!-- update 04 mei,,, gausahh panjang2 diinisialisasi dulu-->

@if (Auth::user()->name == 'Tania Tidar')
    <?php  
      $p = $calctidar;
    ?>
@endif

@if (Auth::user()->name == 'Manna')
    <?php  
      $p = $calcmanna;
    ?>
@endif

@if (Auth::user()->name == 'BKJ')
    <?php  
      $p = $calcbkj;
    ?>
@endif

@if (Auth::user()->name == 'Tania Lombok')
    <?php  
      $p = $calclombok;
    ?>
@endif

@if (Auth::user()->name == 'ABM')
    <?php  
      $p = $calcabm;
    ?>
@endif

 @if (Auth::user()->name == 'Kania710')
    <?php  
      $p = $calckania710;
    ?>
@endif

  @if (Auth::user()->name == 'Menggala')
    <?php  
      $p = $calcmenggala;
    ?>
@endif

  @if (Auth::user()->name == 'Tritan')
    <?php  
      $p = $calctritan;
    ?>
@endif

  @if (Auth::user()->name == 'Erli Pratiwi')
    <?php  
      $p = $calc;
    ?>
@endif
    
      @foreach($p as $q)
        <tr>
        <td>{{$q->no}}</td>
        <td>{{$q->name}}</td>
        <td>{{$q->position}}
        <td>{{$q->pdate}}</td>
        <td>{{$q->knowledge}}</td>
        <td>{{$q->wspeed}}</td>
        <td>{{$q->wsoul}}</td>
        <td>{{$q->wqual}}</td>
        <td>{{$q->wpress}}</td>
        <td>{{$q->teamwork}}</td>
        <td>{{$q->communicate}}</td>
        <td>{{$q->responbility}}</td>
        <td>{{$q->learning}}</td>
        <td>{{$q->dicipline}}</td>
        <td>{{$q->initiative}}</td>
        <td>{{$q->creativity}}</td>
        <td>{{$q->honestly}}</td>
        <td>{{$q->obedience}}</td>
        <td>{{$q->loyalty}}</td>
        <td>{{$q->total}}
        </tr>
      @endforeach
  
      </tbody>
      </table>
  </div>
  </div>
 </body>



@endsection
  