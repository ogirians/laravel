@extends('master')

@section('edit')

@foreach($masalah as $m)

<div class="Container">
<div class="card shadow mb-4">
   <div class="card-header py-3">
    <h3>{{ $m->tipe }}</h3>
    <h7>{{ $m->masalah }}</h7>  
    
   </div>


<div class="card-body" style="margin-bottom: 15px;"> 

<table id="pic">
  <tr>
    <td>Lokasi+PIC </td>
    <td>: {{ $m->asal }}</td>
  </tr>
  <tr>
    <td>PIC pusat </td>
    
    <td>: {{ $m->lawan }}</td>
  </tr>

</table> 
<p></p>
<p></p>  
<p>masalah terjadi pada {{ $m->tproblem }}, dan telah diselesaikan pada {{ $m->tgl }}.</p>
<br>
<p>{{ $m->penyelesaian }}</p>


  
<a class="btn btn-success" href="/bfm">kembali</a>









<!--
  <div class="table-responsive">
           <form action="/bfm/cari" method="GET">
               <input type="text" name="cari" placeholder="Cari Masalah .." value="{{ old('cari') }}">
               <input type="submit" value="CARI">
           </form>

  <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <th>Tanggal Kejadian</th>
      <th>Asal Lokasi + PIC</th>
      <th>Connecting PIC Lawan</th>
      <th>Masalah dan Nomor Dokumen</th>
      <th>Penyelesaian</th>
      <th>Tanggal Penyelesaian</th>
      <th>Tipe Masalah</th>
    
    </thead>
    <tfoot>
      <th>Tanggal Kejadian</th>
      <th>Asal Lokasi + PIC</th>
      <th>Connecting PIC Lawan</th>
      <th>Masalah dan Nomor Dokumen</th>
      <th>Penyelesaian</th>
      <th>Tanggal Penyelesaian</th>
      <th>Tipe Masalah</th>
      
    </tfoot>
    <tbody>
    
    <tr>
      <td>{{ $m->tproblem }}</td>
      <td>{{ $m->asal }}</td>
      <td>{{ $m->lawan }}</td>
      <td>{{ $m->masalah }}</td>
      <td>{{ $m->penyelesaian }}</td>
      <td>{{ $m->tgl }}</td>
      <td>{{ $m->tipe }}</td>    

    </tr>
   
  </tbody>
  </table>
  </div>
-->

 @endforeach






  </div>
  </div>
</div>

@endsection
     


            
  
        

   