@extends('master')

@section('edit')
      <!-- Content Row (INI YANG DIRUBAH) -->
  <style type="text/css">
    .pagination li{
      float: left;
      list-style-type: none;
      margin:5px;
    }
  </style>
 
<div class="card shadow mb-4">
   <div class="card-header py-3">
    <h3>Buku Masalah</h3>  
    <a class="btn btn-success" href="/bfm/tambah"> + Tambah Masalah</a>
   </div>


 <div class="card-body" style="margin-bottom: 15px;">  
        
  
    <div class="table-responsive">


  <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       <thead>
      <th>no</th> 
      <th>Tanggal Kejadian</th>
      <th>Asal Lokasi + PIC</th>
      <th>Connecting PIC Lawan</th>
      <th>Inti Masalah</th>
      <th>Nomor Dokumen Terkait</th>
      <th>Detail+Penyelesaian</th>
      <th>Tanggal Penyelesaian</th>
      <th>opsi</th>
      
     
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
      <th>opsi</th>
      
    
    </tfoot>
    <tbody>
    @foreach($masalah as $m)
    <tr>
      <td>{{ $m->no }} </td>    
      <td>{{ Carbon\Carbon::parse($m->tproblem)->format('d-m-Y') }}</td>
      <td>{{ $m->asal }}</td>
      <td>{{ $m->lawan }}</td>
      <td>{{ $m->inti }}</td>
      <td>{{ $m->masalah }}</td>
      <td><a href="detailin/{{ $m->no }}">see detail</td>
      @if ($m->tgl == null)
      <td>not yet</td>
      @else
      <td>{{ Carbon\Carbon::parse($m->tgl)->format('d-m-Y') }}</td>
      @endif
    
      <td>
        <!--<a href="/bfm/edit/{{ $m->no }}">edit</a>
        |
        <a href="/bfm/delete/{{ $m->no }}">Hapus</a>
        -->


         <div class="dropdown mb-4">
                          <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                             <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                              <a href="/bfm/edit/{{ $m->no }}" class="dropdown-item">Edit</a>
                                <a onclick="return confirm('Yakin ingin menghapus data pelamar ?')" href="/bfm/delete/{{ $m->no }}" class="dropdown-item">Hapus</a>
                                
                              </div>
          </div>
      </td>



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
 