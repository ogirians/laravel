@extends('pd.master')

@section('edit')
      <!-- Content Row (INI YANG DIRUBAH) -->

  <link href="{{ asset('/kuning/css/slide_bukti.css')}}" rel="stylesheet">
  
        <div class="card shadow mb-4" style="margin-bottom: 0.0rem !important;">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-secondary">Filter</h6>
                </a>

                <!-- Card Content - Collapse -->
                 {{-- menampilkan error validasi --}}
                            @if (count($errors) > 0)
                        	<div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            @endif
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                        <div class="container" style="padding-left:0px; ">
           				<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="/dosanp/filter" method="GET" style="max-height: 150px;">
           				
           				<div class="row">
                        <div class="col">
                        <a style="padding-bottom: 10px;">Tanggal Mulai: </a> 
                        <div class="input-group">
                       <input type="date" class="form-control bg-light border-0 small" placeholder="tanggal"   aria-label="Search" aria-describedby="basic-addon2" name="start_date">
                         <!--<div class="input-group-append">
                         <button class="btn btn-info" type="submit" >
                         <i class="fas fa-search fa-sm"></i>
                         </button>
                         </div>-->
                         </div>
                     	</div>
                        
                     	<div class="col">
                        <a style="padding-bottom: 10px;">Tanggal Selesai: </a> 
                        <div class="input-group">
                       <input type="date" class="form-control bg-light border-0 small" placeholder="tanggal"   aria-label="Search" aria-describedby="basic-addon2" name="finish_date">
                         <!--<div class="input-group-append">
                         <button class="btn btn-info" type="submit" >
                         <i class="fas fa-search fa-sm"></i>
                         </button>
                         </div>-->
                         </div>
                     	</div>

                     	<div class="col">
                        <a style="padding-bottom: 10px;">Outlet: </a> 
                        <div class="input-group">
                           <select class="form-control" id="exampleFormControlSelect1" name="pos" required="required" value="{{ old('pos') }}">
                              <option></option>
                           @foreach ($outlet as $o)
                              <option>{{ $o -> outlet }}</option>
                           @endforeach  
                        </select>  
                         </div>
                     	</div>


                     	<div class="col" >
                         <div class="input-group-append" style="margin-left: 80px; margin-top: 30px;">
                         <button class="btn btn-sm btn-success" type="submit" >
                         <i class="fas fa-arrow-right">  GO</i>
                         </button>
                         </div>
                     	</div>

                       </div>
                		</form>
            		</div>
                  </div>
                </div>
              </div>


  











<div class="card shadow mb-4" >
   <div class="card-header py-3">
    <h3>Buku Berita Acara (non-pajak)</h3>  
    <a class="btn btn-success" href="/dosanp/tambah"> + Tambah Berita Acara</a>
 </div>


 <div class="card-body" style="margin-bottom: 15px;">  
        
  
<div class="table-responsive">
           <!--<form action="/bfm/cari" method="GET">
               <input type="text" name="cari" placeholder="Cari Masalah .." value="{{ old('cari') }}">
               <input type="submit" value="CARI">
           </form>-->

  <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
      <th>No</th>
      <th>Tanggal</th>
      <th>Nama Outlet</th>
      <th>Nama Editor</th>
      <th>Status</th>
      <th>No.Transaksi</th>
      <th>Keterangan</th>
      <th>No. Berita Acara</th>
      <th>toleransi</th>
      <th>bukti</th>
      <th>opsi</th>
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
      <th>toleransi</th>
      <th>bukti</th>
      <th>opsi</th>
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
      <td>{{ $m->toleransi }}</td>
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
      
      <td>
           <div class="dropdown mb-4">
                          <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                             <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                              <a href="/dosanp/edit/{{ $m->no }}" class="dropdown-item">Edit</a>
                                <a onclick="return confirm('Yakin ingin menghapus data pelamar ?')" href="/dosanp/delete/{{ $m->no }}" class="dropdown-item">Hapus</a>
                                
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
 