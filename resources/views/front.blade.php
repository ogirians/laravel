@extends('front-master')

@section('konten')



<div class="card shadow mb-4">
   <div class="card-header py-3">
    <h3>Buku Masalah</h3>  
   </div>

  
<div class="card-body" style="margin-bottom: 15px;">  
        
  
    <div class="table-responsive">
           <!--<form action="/bfm/cari" method="GET">
               <input type="text" name="cari" placeholder="Cari Masalah .." value="{{ old('cari') }}">
               <input type="submit" value="CARI">
           </form>-->

  <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <th>no</th>
      <th>Tanggal Kejadian</th>
      <th>Asal Lokasi + PIC</th>
      <th>Connecting PIC Lawan</th>
      <th>Inti masalah</th>
      <th>Nomor Dokumen Terkait</th>
      <th>Detail+Penyelesaian</th>
      <th>Tanggal Penyelesaian</th>
      
     
    </thead>
    <tfoot>
      <th>no</th>    
      <th>Tanggal Kejadian</th>
      <th>Asal Lokasi + PIC</th>
      <th>Connecting PIC Lawan</th>
      <th>Inti Masalah</th>
      <th>Nomor Dokumen Terkait</th>
      <th>Detail+Penyelesaian</th>
      <th>Tanggal Penyelesaian</th>
      
    
    </tfoot>
    <tbody>
    @foreach($masalah as $m)
    <tr>
      <td>{{ $m->no }}</td>    
      <td>{{ Carbon\Carbon::parse($m->tproblem)->format('d-m-Y') }}</td>
      <td>{{ $m->asal }}</td>
      <td>{{ $m->lawan }}</td>
      <td>{{ $m->inti }}</td> 
      <td>{{ $m->masalah }}</td>
      <td><a href="detail/{{ $m->no }}">see detail</td>
      <td>{{ Carbon\Carbon::parse($m->tgl)->format('d-m-Y') }}</td>
         
    </tr>
    @endforeach
  </tbody>
  </table>
  </div>
  </div>
  </div>
  
  
  <script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );

</script>

@endsection
     


            
  
        

   