@extends('layouts.bowner')

@section('content')
<body class="align-content-center">
<h2 class="font-weight-bold"><font size="7">Menu Input Performances</font></h2>
    
    @if (Auth::user()->isOutlet()) 
    <font size="4">Select One:</font>
    <ul class="list-inline">
    <li>
    <form action="/outlet/tampstaff" method=" " class=" "> 
    <button type="submit" class="btn btn-primary btn-lg" name="multiplication" value="*">Input Staff Performance</button>
    </form>
    </li>
    <li>
    <form action="/outlet/tampdrive" method=" " class=" ">
    <button type="submit" class="btn btn-primary btn-lg" name="multiplication" value="*">Input Driver/Helper Performance</button>
    </form>
    </li>
     @endif

    
    @if (Auth::user()->isBowner())
    <li>
    <form action="/outlet/tamp" method=" " class=" ">
    <form action="/HRD/calculator/tamp" method=" " class=" ">  
    <button type="submit" class="btn btn-primary btn-lg" name="multiplication" value="*">Input Head 
    </form>
    </li>
    Division/Office Performance</button>
    @endif 

    </ul>
    
<br>
<br>


<h1> List karyawan </h1>


<div class="table-responsive">
        
        <!-- <p>Cari Nilai karyawan:</p>
           <form action="/calculator/caristaff" method="GET">
               <input type="text" name="cari" placeholder="Cari Masalah .." value="{{ old('cari') }}">
               <input type="submit" value="CARI">
           </form>-->

  <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Name</th>
          <th>Jabatan</th>
          <th>Penilaian bulan ini</th>
          <th>nilai total rata-rata</th>
          <th>Kualitas</th>
          @if (Auth::user()->isHRD())
          <th>lokasi</th>
          @endif
          <th>opsi</th>

        </tr> 
      </thead>
       <tfoot>
        <tr>
          <th>Name</th>
          <th>Jabatan</th>
          <th>Penilaian bulan ini</th>
          <th>nilai total rata-rata</th>
          <th>Kualitas</th>
          @if (Auth::user()->isHRD())
          <th>lokasi</th>
          @endif
          <th>opsi</th>
        </tr> 
      </tfoot>
      <tbody>



<!-- update 04 mei,,, gausahh panjang2 diinisialisasi dulu-->

  
    {{ $now }}
    
    @foreach($karyawan3 as $q)
      
        <tr>
        <td>{{ $q -> name }}</td>
        <td>{{ $q -> job }}</td>
        
        @if ( $q->last_test == null || $now !== Carbon\Carbon::parse($q->last_test)->format('M'))
        <td style="text-align: center;"><a href="#" class="btn btn-xs btn-primary">Buat penilaian</a></td>
        @else
        <td class="success">Completed <span class="text-success glyphicon glyphicon-ok"></span></td>
        @endif

 
        
        <td><p id="Ntotal_{{ $loop->index }}">{{ $q -> skore }}</p></td>
        <td><p id="Kualitaschoice_{{ $loop->index }}"></p></td>
        <script>
        var p = document.getElementById('Ntotal_{{ $loop->index }}');
        var text = p.textContent;
        var number = Number(text);
        var relnumber = Math.ceil(number);
        var kua = kualitas(relnumber);

        document.getElementById("Kualitaschoice_{{ $loop->index }}").innerHTML = kua;
        </script>
         @if (Auth::user()->isHRD())
        <td>{{ $q-> location }}</td>
         @endif
        <td></td>
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




</body>

@endsection