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

  @if (Auth::user()->isHRD())
      <button> <a href="/HRD/calculator/inputdriver">Input Penilaian</a></button>
      <button> <a href="/HRD">Kembali</a></button>
   @endif

   @if (Auth::user()->isOutlet())
      <button> <a href="/outlet/inputdriver">Input Penilaian</a></button>
      <button> <a href="/outlet/choice">Kembali</a></button>
   @endif
  
  <br/>
  <br/>
   <body>
      <div class="container">    
        <br />
        <br />
      <div class="table-responsive">
        
         <p>Cari Nilai Karyawan:</p>
           <form action="/calculator/caridriver" method="GET">
               <input type="text" name="cari" placeholder="Cari Masalah .." value="{{ old('cari') }}">
               <input type="submit" value="CARI">
           </form>

 <table class="table table-hover table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Jabatan</th>
          <th>Lokasi Kantor</th>
          <th>Performance Exam Date</th>
          <th>Wawasan atau Pengetahuan mengenai pekerjaan (Job Desk)</th>
          <th>Kualitas hasil pekerjaan</th>
          <th>Kerjasama</th>
          <th>Komunikasi</th>
          <th>Disiplin kerja</th>
          <th>Inisiatif</th>
          <th>Sopan Santun</th>
          <th>Kejujuran</th>
          <th>Kehadiran</th>
          <th>Loyalitas</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
    
    @if($calc)
      @foreach($calc as $q)
        <tr>
        <td>{{$q->no}}</td>
        <td>{{$q->name}}</td>
        <td>{{$q->position}}</td>
        <td>{{$q->location}}</td>
        <td>{{$q->pdate}}</td>
        <td>{{$q->knowledge}}</td>
        <td>{{$q->wqual}}</td>
        <td>{{$q->teamwork}}</td>
        <td>{{$q->communicate}}</td> 
        <td>{{$q->dicipline}}</td>
        <td>{{$q->initiative}}</td>
        <td>{{$q->creativity}}</td>
        <td>{{$q->honestly}}</td>
        <td>{{$q->obedience}}</td>
        <td>{{$q->loyalty}}</td>
        <td>{{$q->total}}</td>
        </tr>
      @endforeach
    @endif  
    
      </tbody>
      </table>
  </div>
  </div>
 </body>



@endsection
 