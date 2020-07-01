@extends('pd.master')

@section('edit')         
          
          
          
          	<div class="card shadow mb-4" style="margin-bottom: 0.0rem !important;">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-secondary">Pasang papan Statistik</h6>
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
           				<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="/dosa/storedate" method="GET" style="max-height: 150px;">
           				
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

                 
                     	<div class="col" >
                         <div class="input-group-append" style="margin-left: 80px; margin-top: 30px;">
                         <button class="btn btn-sm btn-success" type="submit" >
                         <i class="fas fa-arrow-right"> Update </i>
                         </button>
                         </div>
                     	</div>

                       </div>
                		</form>
            		</div>
                  </div>
                </div>
              </div>
              
              @foreach($date as $d)
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Statistik Periode : {{ Carbon\Carbon::parse($d->start)->format('d-m-Y') }}   sampai {{ Carbon\Carbon::parse($d->end)->format('d-m-Y') }} (pajak)</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="buu"></canvas>
                  </div>
                  <hr>
                 
                </div>
              </div>
              
              
              
              
              
            <div class="card shadow mb-4">
                   <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Rekapan periode : {{ Carbon\Carbon::parse($d->start)->format('d-m-Y') }}   sampai {{ Carbon\Carbon::parse($d->end)->format('d-m-Y') }}  (Pajak)</h6>  
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
                      <td><a href="/dosa/{{ $s->outlet }}">{{ $s->outlet }}</a></td>
                      <td>{{ $s->outlet_count }}</td>
                    </tr>
               
                    @endforeach
                  </tbody>
                  </table>
                  </div>
                  </div>
                  </div>
                  

                 
    <script type="text/javascript">
                
                
               // $(document).ready(function() {
               //     $('#dataTable').DataTable( {
               //         "order": [[ 0, "desc" ]]
               //     } );
               // } );
                
                
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