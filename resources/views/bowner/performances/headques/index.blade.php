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
 
        
  <h3>Data Masalah</h3>

  <a href="/bfm/tambah"> + Tambah Masalah</a>
  
  <br/>
  <br/>
   <body>
      <div class="container">    
        <br />
        <br />
      <div class="table-responsive">
        
         <p>Cari Data Masalah :</p>
           <form action="/bfm/cari" method="GET">
               <input type="text" name="cari" placeholder="Cari Masalah .." value="{{ old('cari') }}">
               <input type="submit" value="CARI">
           </form>

 <table class="table table-hover table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
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
          <th>Pengorganisasian</th>
          <th>Pembinaan / Pengarahan</th>
          <th>Pemeriksaan / Pengendalian</th>
          <th>Perencanaan</th>
          <th>Pendelegasian</th>
        </tr>
      </thead>
      <tbody>
    
    @if($hques)
      @foreach($hques as $q)
        <tr>
        <td>{{$q->id}}</td>
        <td>{{$q->employee}}</td>
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
        <td>{{$q->organate}}</td>
        <td>{{$q->coaching}}</td>
        <td>{{$q->controling}}</td>
        <td>{{$q->planing}}</td>
        <td>{{$q->delegate}}</td>
        

        </tr>
      @endforeach
    @endif  
    
      </tbody>
      </table>
  </div>
  </div>
 </body>



@endsection
 