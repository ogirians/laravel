@extends('layouts.bowner')

@section('content')

	@include('includes.message')

	<h1>Employees Data</h1>
	<div class="table-responsive">
		<table  class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
	    <thead>
	      <tr>
	        <th>foto</th>
	        <th>Name</th>
	        <th>Job Title</th>
	        <th>Start Day</th>
	        <th>Date of Birth</th>
	        <th>Gender</th>
	        <th>Address</th>
	        <th>Phone</th>
	       	@if (Auth::user()->isHRD() || Auth::user()->is_head == '1')
	        <th>Location/Group Perfomance</th>
	        @endif
	        <th>NIK</th>
	      </tr>
	    </thead>
	     <tfoot>
	      <tr>
	      	<th>foto</th>
	        <th>Name</th>
	        <th>Job Title</th>
	        <th>Start Day</th>
	         <th>Date of Birth</th>
	        <th>Gender</th>
	        <th>Address</th>
	        <th>Phone</th>
	        @if (Auth::user()->isHRD() || Auth::user()->is_head == '1')
	        <th>Location/Group Perfomance</th>
	        @endif
	        <th>NIK</th>
	      </tr>
	    </tfoot>
	    <tbody>
		
		@if($humans)
			@foreach($humans as $human)
			  <tr>
			  	<td><img width="75px" src="{{ url('images/'.$human->photo) }}"></td>
				@if (Auth::user()->isHRD())
				<td><a href="{{route('HRD.humans.edit', $human->id)}}">{{$human->name}}</a></td>
				@endif
				@if (Auth::user()->isBowner())
				<td><a href="{{route('bowner.humans.edit', $human->id)}}">{{$human->name}}</a></td>
				@endif
				@if (Auth::user()->isOutlet())
				<td><a href="{{route('outlet.humans.edit', $human->id)}}">{{$human->name}}</a></td>
				@endif
				<td>{{$human->job}}</td>
				<td>{{date("d-m-Y", strtotime($human->start_day))}}</td>
				<td>{{date("d-m-Y", strtotime($human->birth))}}</td>
				<td>{{$human->gender}}</td>
				<td>{{$human->address1 .','. $human->address2}}</td>
				<td>{{$human->phone}}</td>
				 @if (Auth::user()->isHRD() || Auth::user()->is_head == '1')
	        	<td>{{$human->location}}</td>
	        	@endif
				<td>{{$human->nik}}</td>
			  </tr>
			@endforeach
		@endif  
		
		@if (Auth::user()->is_head == '1')
            @foreach ($loc as $loca)
                @foreach ($all as $human)
                    @if ( $human->location == $loca->name)
                    <tr>
        			  	<td><img width="75px" src="{{ url('images/'.$human->photo) }}"></td>
        				<td><a href="{{route('outlet.humans.edit', $human->id)}}">{{$human->name}}</a></td>
        				<td>{{$human->job}}</td>
        				<td>{{date("d-m-Y", strtotime($human->start_day))}}</td>
        				<td>{{date("d-m-Y", strtotime($human->birth))}}</td>
        				<td>{{$human->gender}}</td>
        				<td>{{$human->address1 .','. $human->address2}}</td>
        				<td>{{$human->phone}}</td>
        				 @if (Auth::user()->isHRD() || Auth::user()->is_head == '1')
        	        	<td>{{$human->location}}</td>
        	        	@endif
        				<td>{{$human->nik}}</td>
        			 </tr>
                        
                    @endif
                 @endforeach
            @endforeach
         @endif
		
	    </tbody>
	  	</table>
	</div>

	 @if (Auth::user()->isHRD())
	<a class="btn btn-info" href="{{ url('/HRD/humans/create') }}">Add Employee</a>
	<a href="{{ url('/HRD/export_excel/excelkaryawan') }}" class="btn btn-success">Export to Excel</a>
   	 @endif

	 @if (Auth::user()->isBowner())
	<a class="btn btn-info" href="{{ url('/bowner/humans/create') }}">Add Employee</a>
	<a href="{{ url('/bowner/export_excel/excelkaryawan') }}" class="btn btn-success">Export to Excel</a>
   	 @endif

	 @if (Auth::user()->isOutlet())

	 
	 @endif
</div>

 <script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
</script>

@stop



@section('scripts')
<script>
</script>
@stop

