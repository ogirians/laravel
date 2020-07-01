@extends('layouts.bowner')

@section('content')
<body class="align-content-center">

@include('includes.message')

<h1> Perfomance Board </h1>


<div class="table-responsive">


  <table  class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" >
      <thead>
        <tr>
          <th>Name</th>
          <th>Jabatan</th>
          <th>Penilaian bulan ini</th>
          <th>nilai total rata-rata</th>
          <th>Kualitas</th>
          @if (Auth::user()->isHRD() || Auth::user()->isBowner() || Auth::user()->is_head == '1')
          <th>lokasi</th>
          @endif
          <th>opsi</th>

        </tr> 
      </thead>
       <tfoot>
        <tr>
          <th>Name</th>
          <th>Jabatan</th>
          <th>Penilaian bulan ini</th>
          <th>nilai total rata-rata</th>
          <th>Kualitas</th>
          @if (Auth::user()->isHRD() || Auth::user()->isBowner() || Auth::user()->is_head == '1')
          <th>lokasi</th>
          @endif
          <th>opsi</th>
        </tr> 
      </tfoot>
      <tbody>



<!-- update 04 mei,,, gausahh panjang2 diinisialisasi dulu-->

  
    @foreach($karyawan3 as $q)
      
        <tr>
        <td>{{ $q -> name }}</td>
        <td>{{ $q -> job }}</td>
        
      @if ( $q->last_test == null || $now !== Carbon\Carbon::parse($q->last_test)->format('M'))
          @if (Auth::user()->isHRD())
              <td class="warning" style="text-align: center;">Not yet</td>
          @endif

          @if (Auth::user()->isOutlet()) 
              <td style="text-align: center;">        
                  @if($q->humans_level == 3)
                       <a href="/outlet/inputdriver/{{ Auth::user()->name }}/{{ $q -> id }}" class="btn btn-xs btn-primary">Buat penilaian</a>
                  @endif     
                  @if($q->humans_level == 2)
                       <a href="/outlet/inputstaff/{{ Auth::user()->name }}/{{ $q -> id }}" class="btn btn-xs btn-primary">Buat penilaian</a>               
                  @endif   
                   @if($q->humans_level == 1)
                       <a href="/outlet/inputhead/{{ Auth::user()->name }}/{{ $q -> id }}" class="btn btn-xs btn-primary">Buat penilaian</a>               
                  @endif  
              </td>            
          @endif  

          @if (Auth::user()->isBowner())
            
              @if($q->humans_level == 'A')
              <td style="text-align: center;">  
                      <a href="/bowner/inputhead/{{ Auth::user()->name }}/{{ $q -> id }}" class="btn btn-xs btn-primary">Buat penilaian</a>  
              </td>    
              @else
                      <td class="warning" style="text-align: center;">Not yet</td>              
              @endif
                
          @endif     
      @else
        <td class="success" style="text-align: center;">Completed <span class="text-success glyphicon glyphicon-ok"></span></td>
      @endif

 
        
        <td><p id="Ntotal_{{ $loop->index }}">{{ $q -> skore }}</p></td>
        <td><p id="Kualitaschoice_{{ $loop->index }}"></p></td>
        <script>
        var p = document.getElementById('Ntotal_{{ $loop->index }}');
        var text = p.textContent;
        var number = Number(text);
        var relnumber = Math.ceil(number);
        var kua = kualitas(relnumber);

        document.getElementById("Kualitaschoice_{{ $loop->index }}").innerHTML = kua;
        </script>
        @if (Auth::user()->isHRD() || Auth::user()->isBowner() || Auth::user()->is_head == '1')
        <td>{{ $q-> location }}</td>
        @endif
        
        <td style="text-align: center;">
          
            <div class="container">
                         
                              @if (Auth::user()->isOutlet())
                              <a href="{{route('outlet.humans.edit', $q -> id)}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat profil" id="view" style="margin-top: 3px;">
                                <span class="glyphicon glyphicon-user" ></span>
                              </a>
                              @endif

                              @if (Auth::user()->isHRD())
                              <a href="{{route('HRD.humans.edit', $q -> id)}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat profil" id="view" style="margin-top: 3px;">
                                <span class="glyphicon glyphicon-user"></span>
                              </a>
                              @endif

                              @if (Auth::user()->isBowner())
                               <a href="{{route('bowner.humans.edit', $q -> id)}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat profil" id="view" style="margin-top: 3px;">
                                <span class="glyphicon glyphicon-user" ></span>
                               </a>
                              @endif



                                @if ($now == Carbon\Carbon::parse($q->last_test)->format('M') && $q -> last_test !== null)

                                   @if ($q->humans_level == 3)
                                        <a href="/drivernilaipdf/{{ $q -> id }}/{{ $q->no }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Download penilaian bulan ini" id="download" style="margin-top: 3px;" ><span class="glyphicon glyphicon-download"></span></a>
                                         
                                    @endif

                                    @if ($q->humans_level == 2)
                                        <a href="/staffnilaipdf/{{ $q -> id }}/{{ $q->no }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Download penilaian bulan ini" id="download" style="margin-top: 3px;" ><span class="glyphicon glyphicon-download"></span></a>          
                                           
                                    @endif

                                    @if ($q->humans_level == 1 || $q->humans_level == 'A' )
                                        <a href="/headnilaipdf/{{ $q -> id }}/{{ $q->no }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Download penilaian bulan ini" id="download" style="margin-top: 3px;"><span class="glyphicon glyphicon-download"></span></a>  
                                   
                                    @endif



                                  @endif
 


                              @if (Auth::user()->isOutlet() && $now == Carbon\Carbon::parse($q->last_test)->format('M') && $q -> last_test !== null)
                                    @if ($q->humans_level == 3)
                                       

                                        <a onclick="return confirm('Yakin ingin menilai ulang -{{ $q->name }}- untuk penilaian bulan ini? ?')" href="/outlet/editdriver/{{ $q -> id }}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="ulang penilaian" id="ulang" style="margin-top: 3px;"><span class="glyphicon glyphicon-repeat"></span></a>

                                         
                                    @endif
                                    @if ($q->humans_level == 2)
                                      

                                        <a onclick="return confirm('Yakin ingin menilai ulang -{{ $q->name }}- untuk penilaian bulan ini? ?')" href="/outlet/editstaff/{{ $q -> id }}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ulang penilaian" id="ulang" style="margin-top: 3px;"><span class="glyphicon glyphicon-repeat"></span></a>

                                           
                                    @endif
                                    @if ($q->humans_level == 1)
                                      
                                        <a onclick="return confirm('Yakin ingin menilai ulang -{{ $q->name }}- untuk penilaian bulan ini? ?')" href="/outlet/edithead/{{ $q -> id }}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ulang penilaian" id="ulang" style="margin-top: 3px;"><span class="glyphicon glyphicon-repeat"></span></a> 

                                   
                                    @endif
                              @endif


                              @if (Auth::user()->isBowner() && $now == Carbon\Carbon::parse($q->last_test)->format('M') && $q -> last_test !== null)
                                    @if ($q->humans_level == 'A')
                                        <a onclick="return confirm('Yakin ingin menilai ulang -{{ $q->name }}- untuk penilaian bulan ini? ?')" href="/bowner/edithead/{{ $q -> id }}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ulang penilaian" id="ulang" style="margin-top: 3px;"><span class="glyphicon glyphicon-repeat"></span>
                                        </a>
                                    @endif
                              @endif



            
                            
            </div>
        </td>
        </tr>
 @endforeach
  
 @if (Auth::user()->is_head == '1')
    @foreach ($loc as $loca)
        @foreach ($all as $oll)
            @if ( $oll->location == $loca->name)
 
 
                  <tr>
                        <td>{{ $oll -> name }}</td>
                        <td>{{ $oll -> job }}</td>
                         @if ( $oll->last_test == null || $now !== Carbon\Carbon::parse($oll->last_test)->format('M'))
                              <td class="warning" style="text-align: center;">Not yet</td>
                          @else
                              <td class="success" style="text-align: center;">Completed <span class="text-success glyphicon glyphicon-ok"></span></td>
                          @endif
                         <td><p id="Ntotal_{{ $loop->index }}">{{ $oll -> skore }}</p></td>
                                 <td><p id="Kualitaschoice_{{ $loop->index }}"></p></td>
                            <script>
                            var p = document.getElementById('Ntotal_{{ $loop->index }}');
                            var text = p.textContent;
                            var number = Number(text);
                            var relnumber = Math.ceil(number);
                            var kua = kualitas(relnumber);
                    
                            document.getElementById("Kualitaschoice_{{ $loop->index }}").innerHTML = kua;
                            </script>
                         
                        <td>{{ $oll -> location }}</td>
                        
                        
                         <td style="text-align: center;">
          
                            <div class="container">
                         
                           
                              <a href="{{route('outlet.humans.edit', $oll -> id)}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat profil" id="view" style="margin-top: 3px;">
                                <span class="glyphicon glyphicon-user" ></span>
                              </a>
                            

                                @if ($now == Carbon\Carbon::parse($oll->last_test)->format('M') && $oll -> last_test !== null)

                                   @if ($oll->humans_level == 3)
                                        <a href="/drivernilaipdf/{{ $oll -> id }}/{{ $oll->no }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Download penilaian bulan ini" id="download" style="margin-top: 3px;" ><span class="glyphicon glyphicon-download"></span></a>
                                         
                                    @endif

                                    @if ($oll->humans_level == 2)
                                        <a href="/staffnilaipdf/{{ $oll -> id }}/{{ $oll->no }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Download penilaian bulan ini" id="download" style="margin-top: 3px;" ><span class="glyphicon glyphicon-download"></span></a>          
                                           
                                    @endif

                                    @if ($oll->humans_level == 1 || $oll->humans_level == 'A' )
                                        <a href="/headnilaipdf/{{ $oll -> id }}/{{ $oll->no }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Download penilaian bulan ini" id="download" style="margin-top: 3px;"><span class="glyphicon glyphicon-download"></span></a>  
                                   
                                    @endif

                                @endif
                            
                        </div>
                        </td>
                   
                </tr>
 
             @endif
         @endforeach
    @endforeach
 @endif
        
     
      </tbody>
      </table>
  </div>

@if (Auth::user()->isOutlet())
 <a class="btn btn-info" href="/listnilaipdf/{{ Auth::user()->name }}">Download PDF</a>
 
 <script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').DataTable( {
        "order": [[ 2, "asc" ]]
    } );
} );
</script>
@endif

@if (Auth::user()->isHRD())
 <a class="btn btn-info" href="/listnilaipdf/">Download PDF</a>
 
 <script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').DataTable( {
        "order": [[ 2, "asc" ]]
    } );
} );
</script>
@endif

@if (Auth::user()->isBowner())
 <a class="btn btn-info" href="/listnilaipdf/">Download PDF</a>
 
  <script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').DataTable( {
        "order": [[ 2, "asc" ]]
    } );
} );
</script>
@endif
</body>







</body>

@endsection