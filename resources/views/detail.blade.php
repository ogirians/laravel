@extends('master2')

@section('edit')

@foreach($masalah as $m)

<div class="Container">
<div class="card shadow mb-4">
   <div class="card-header py-3">
    <h3>{{ $m->inti }}</h3>
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
<p>detail permasalahan:</p>
<p>{!! $m->tipe !!}</p>
<br>
<p>penyelesaian :</p>
<p>{!! $m->penyelesaian !!}</p>


  
<a class="btn btn-success" href="/EDP">kembali</a>




 @endforeach




{{ $tipe = null }}
{{ $penyelesaian = null }} 

  </div>
  </div>
</div>

@endsection
     


            
  
        

   