@extends('master')

@section('edit')
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Data Masalah</h3>
     <br />
   <div class="table-responsive">
    
    <p>Cari Data Masalah :</p>
      <form action="/bfm/cari" method="GET">
        <input type="text" name="cari" placeholder="Cari Masalah .." value="{{ old('cari') }}">
        <input type="submit" value="CARI">
      </form>

    <table class="table table-bordered table-striped">
           <thead>
            <tr>
                <th>Tanggal Kejadian</th>
                <th>Asal Lokasi + PIC</th>
                <th>Connecting PIC Lawan</th>
                <th>Masalah dan Nomor Dokumen</th>
                <th>Penyelesaian</th>
                <th>Tanggal Penyelesaian</th>
                <th>Tipe Masalah</th>
                <th>Opsi</th>


            </tr>
           </thead>
           <tbody>
           @foreach($masalah as $m)
            <tr>
              <td>{{ $m->tproblem }}</td>
              <td>{{ $m->asal }}</td>
              <td>{{ $m->lawan }}</td>
              <td>{{ $m->masalah }}</td>
              <td>{{ $m->penyelesaian }}</td>
              <td>{{ $m->tgl }}</td>
              <td>{{ $m->tipe }}</td>    
              <td>
                <a href="/bfm/edit/{{ $m->no }}">edit</a>
                |
                <a href="/bfm/delete/{{ $m->no }}">Hapus</a>
              </td>

            </tr>
           @endforeach
           </tbody>

      

       </table>
   </div>
  </div>
 </body>
@endsection