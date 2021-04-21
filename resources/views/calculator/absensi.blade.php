@extends('layouts.bowner')

@section('content')
<body class="align-content-center">

@include('includes.message')

<h1> tabel absensi (under maintenance) </h1>


<div class="table-responsive">


  <table  class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" >
      <thead>
        <tr>
          <th>ID karyawan</th>
          <th>Nama</th>
          <th>ID absensi</th>
          <th>jam masuk</th>
          <th>jam pulang</th>
         
          <th>late</th>
 
          <th>early</th>

        </tr> 
      </thead>
       <tfoot>
        <tr>
          <th>ID karyawan</th>
          <th>Nama</th>
          <th>ID absensi</th>
          <th>jam masuk</th>
          <th>jam pulang</th>
         
          <th>late</th>
 
          <th>early</th>
        </tr> 
      </tfoot>
      <tbody>
         @foreach($nik as $number)
         <tr>
          <td>{{ $number->nik }}</td>
          <td>Nama</td>
          <td>ID absensi</td>
          <td>jam masuk</td>
          <td>jam pulang</td>
         
          <td>late</td>
 
          <td>early</td>
        </tr> 
         @endforeach    
@if (Auth::user()->is_head == '1')
    @foreach ($loc as $loca)
        @foreach ($all as $oll)
            @if ( $oll->location == $loca->name)
        <tr>
          <td>{{ $oll->nik }}</td>
          <td>Nama</td>
          <td>ID absensi</td>
          <td>jam masuk</td>
          <td>jam pulang</td>
         
          <td>late</td>
 
          <td>early</td>
        </tr> 

           @endif
         @endforeach
    @endforeach
 @endif
      </tbody>
      </table>
  </div>
  

  <div class="modal fade" id="unduhLaporanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih Tanggal</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user" method="POST" action="https://absensi.indoberkainvestama.com/action-export.php">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <div style="text-align: left;"> Tanggal awal : </div>
                    <input name="tanggal_awal" type="date" class="form-control form-control-user">
                  </div>
                  <div class="col-sm-6">
                    <div style="text-align: left;"> Tanggal akhir : </div>
                    <input name="tanggal_akhir" type="date" class="form-control form-control-user">
                  </div>
                </div>
                 @foreach($nik as $number)
                    <input name="nik[]" type="hidden" value='{{ $number->nik }}' class="form-control form-control-user">
                 @endforeach
                 
@if (Auth::user()->is_head == '1')
    @foreach ($loc as $loca)
        @foreach ($all as $oll)
            @if ( $oll->location == $loca->name)
                     <input name="nik[]" type="hidden" value='{{ $oll->nik }}' class="form-control form-control-user">
            @endif
         @endforeach
    @endforeach
 @endif            
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <input class="btn btn-primary" type="submit" name="submit" value="Unduh">
          </form>
        </div>
      </div>
    </div>
  </div>


<a class="btn btn-info" href="#" data-toggle="modal" data-target="#unduhLaporanModal">Download excell</a>

 <script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').DataTable( {
        "order": [[ 2, "asc" ]]
    } );
} );
</script>


</body>







</body>

@endsection