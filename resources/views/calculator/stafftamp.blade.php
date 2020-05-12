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
 
 <body class="align-content-center">

  
   @if (Auth::user()->isBowner())
       <a class="btn btn-primary" href="/calculator/inputstaff">Input Penilaian baru</a></button>
       <a class="btn btn-success" href="/calculator">Kembali</a></button>
   @endif
   @if (Auth::user()->isHRD())
     <a class="btn btn-primary" href="/HRD/calculator/inputstaff">Input Penilaian baru</a>
     <a class="btn btn-success" href="/HRD">Kembali</a>
  @endif
   @if (Auth::user()->isOutlet())
    <a class="btn btn-primary" href="/outlet/inputstaff/{{ Auth::user()->name }}">Input Penilaian baru</a></button>
    <a class="btn btn-success" href="/outlet/choice/{{ Auth::user()->name }}">Kembali</a></button>
   @endif
    
  <br/>
  <br/>


   
        <br />
        <br />

<h3>List penilaian staff terakhir</h3>
<div class="table-responsive">
        
        <!-- <p>Cari Nilai karyawan:</p>
           <form action="/calculator/caristaff" method="GET">
               <input type="text" name="cari" placeholder="Cari Masalah .." value="{{ old('cari') }}">
               <input type="submit" value="CARI">
           </form>-->

  <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
          <th>Total</th>
        </tr> 
      </thead>
       <tfoot>
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
          <th>Total</th>
        </tr> 
      </tfoot>
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
        <td>{{$q->humans_id}}</td>
        
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
        <td>{{$q->total}}</td>
        </tr>
      @endforeach
      </tbody>
      </table>
  </div>



</body>

 <script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );

</script>

@endsection
  