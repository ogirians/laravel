@extends('pd.front-master')

@section('konten')

 <link href="{{ asset('/kuning/css/slide_bukti.css')}}" rel="stylesheet">
<a href="/all" class="btn btn-success btn" style="margin-bottom: 20px;">Kembali</a>

      <div class="row">

            <div class="col-xl-8 col-lg-7">

    

              <!-- Bar Chart -->
                @foreach($date as $d)
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Statistik periode : {{ Carbon\Carbon::parse($d->start)->format('d-m-Y') }}   sampai {{ Carbon\Carbon::parse($d->end)->format('d-m-Y') }} (non-pajak)</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="cuu"></canvas>
                  </div>
                  <hr>
                 
                </div>
              </div>
              
     
            </div>

                    
    </div>
    
    
    
    
                <div class="card shadow mb-4" style="max-width: 800px;">
                   <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Rekapan periode : {{ Carbon\Carbon::parse($d->start)->format('d-m-Y') }}   sampai {{ Carbon\Carbon::parse($d->end)->format('d-m-Y') }} (non-pajak)</h6>  
                    <!--<a class="btn btn-success" href="/dosa/tambah"> + Tambah Berita Acara</a>-->
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
                      <th>outlet</th>
                      <th>jumlah edit</th>
                    </thead>
                    <tfoot>
                      <th>outlet</th>
                      <th>jumlah edit</th>
                    </tfoot>
                    
                    <tbody>
                    @foreach($score as $s)
                    <tr>
                      <td><a href="/beritanp/{{ $s->outlet }}">{{ $s->outlet }}</a></td>
                      <td>{{ $s->outlet_count }}</td>
                    </tr>
               
                    @endforeach
                  </tbody>
                  </table>
                  </div>
                  </div>
                  </div>







<div class="card shadow mb-4" >
   <div class="card-header py-3">
    <h3>Buku Berita Acara (non-pajak)</h3>  
    <!--<a class="btn btn-success" href="/dosa/tambah"> + Tambah Berita Acara</a>-->
   </div>


 <div class="card-body" style="margin-bottom: 15px;">  
        
  
    <div class="table-responsive">
           <!--<form action="/bfm/cari" method="GET">
               <input type="text" name="cari" placeholder="Cari Masalah .." value="{{ old('cari') }}">
               <input type="submit" value="CARI">
           </form>-->

  <table  class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
       <thead>
      <th>No</th>
      <th>Tanggal</th>
      <th>Nama Outlet</th>
      <th>Nama Editor</th>
      <th>Status</th>
      <th>No.Transaksi</th>
      <th>Keterangan</th>
      <th>No. Berita Acara</th>
      <th>bukti</th>
      
  
      
     
    </thead>
    <tfoot>
      <th>No</th>
      <th>Tanggal</th>
      <th>Nama Outlet</th>
      <th>Nama Editor</th>
      <th>Status</th>
      <th>No.Transaksi</th>
      <th>Keterangan</th>
      <th>No. Berita Acara</th>
      <th>bukti</th>
     
   
      
    
    </tfoot>
    <tbody>
    @foreach($masalahnp as $m)
    <tr>
      <td>{{ $m->no }}</td>
      <td>{{ Carbon\Carbon::parse($m->tanggal)->format('d-m-Y') }}</td>
      <td>{{ $m->outlet }}</td>
      <td>{{ $m->editor }}</td> 
      <td>{{ $m->status }}</td>
      <td>{{ $m->transaksi }}</td>
      <td>{{ $m->keterangan }}</td>
      <td>{{ $m->berita }}</td>
      <td>
      
      
         
            @php
                $urut = 1;
                $total = count(json_decode($m->bukti));
            @endphp
             
             
            @if ( strpos($m -> bukti, "[") !== false)
          
            <a href="#" data-toggle="modal" data-target="#myModal_{{ $m->no }}" onclick="show('mySlides_{{ $m->no }}')">
            <!--{{ $k = 1 }}-->
            <!--{{ $j = 1 }}-->
            @if ($total > 1)
            more..
            @endif
            
                 <?php foreach (json_decode($m->bukti) as $picture) { ?>
                        <img src="{{ asset('/data_buktinp/'.$picture) }}" style="width:75px"/>
                 
                 @php
                    $k++;
                    if($k==2) break;
                 @endphp
                 <?php } ?>
            </a>
            
            
              <div class="modal fade" id="myModal_{{ $m->no }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                      </div>
                      <div class="modal-body">
                        <center>  
                         
                         
                        <div class="slideshow-container">
                            
                       
                         <?php foreach (json_decode($m->bukti)as $picture) { ?>
                            <div class="mySlides_{{$m->no}}">
                              <div class="numbertext" style="color: black;">{{$urut}} / {{ $total }}</div>
                               <img src="{{ asset('/data_buktinp/'.$picture) }}" width="400px" height="500px">
                            </div>
                        @php
                        $urut++;
                        @endphp
                         <?php } ?>
                            
                            
                            
                        </div>
                         <div style="text-align:center">
                            <a class="prev" onclick="plusSlides(-1, 'mySlides_{{ $m->no }}')">&#10094;</a>
                            <a class="next" onclick="plusSlides(1, 'mySlides_{{ $m->no }}')">&#10095;</a>
                            <br>
                         </div>
            
                        </center>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                      </div>
                    </div>
                  </div>
                </div>
            
           
            
            @else

              <a href="#" data-toggle="modal" data-target="#myModal_{{ $m->no }}">
             <img width="75px" src="{{ url('data_buktinp/'.$m->bukti) }}">
              </a>
              
               <div class="modal fade" id="myModal_{{ $m->no }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                      </div>
                      <div class="modal-body">
                        <center>  
                          <img width="400px" height="500px" src="{{ url('data_buktinp/'.$m->bukti) }}" alt="" class="img-responsive">
                        </center>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                      </div>
                    </div>
                  </div>
                </div>
          
             
  
            @endif
      
      
      
      
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
    $('#dataTable1').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );

  $(document).ready(function() {
    $('#dataTable2').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );



                
              var total = [
                        @foreach ($score as $j)
                            "{{ $j->outlet_count }}",
                        @endforeach
                         ];
                        
              for (var i in total) 
                        {
                           console.log("jumlah :" + total[i]);
                      
                        }    
            
            
            
                        
             var outlet = [
                        @foreach ($score as $j)
                            "{{ $j->outlet }}",
                        @endforeach
                         ];
                        
             for (var k in outlet) 
                        {
                           console.log("Outlet :" + outlet[k]);
                      
                        }  

        
  
                
                
    </script>

@endsection
     


            
  
        

   