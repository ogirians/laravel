@extends('pd.master')

@section('edit')         


        <div class="card shadow mb-4">
                     @foreach($date as $d)
                   <div class="card-header py-3">
                    <a class="btn btn-info" href="/dosa/stats">kembali</a>
                    <br>
                    <h6 class="m-0 font-weight-bold text-primary" style="padding-top: 15px;">Editor {{ $editor }} periode : {{ Carbon\Carbon::parse($d->start)->format('d-m-Y') }}   sampai {{ Carbon\Carbon::parse($d->end)->format('d-m-Y') }}</h6>
                    
                    
                   </div>
                    @endforeach 
                
                 <div class="card-body" style="margin-bottom: 15px;">  
                        
                  
                    <div class="table-responsive">
                           <!--<form action="/bfm/cari" method="GET">
                               <input type="text" name="cari" placeholder="Cari Masalah .." value="{{ old('cari') }}">
                               <input type="submit" value="CARI">
                           </form>-->
                
                  <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <th>Editor</th>
                      <th>jumlah edit</th>
                    </thead>
                    <tfoot>
                      <th>Editor</th>
                      <th>jumlah edit</th>
                    </tfoot>
                    
                    <tbody>
                    @foreach($pelaku as $s)
                    <tr>
                      <td>{{ $s->editor }}</td>
                      <td>{{ $s->editor_count }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  </table>
                  </div>
                  </div>
                  </div>
                  
@endsection