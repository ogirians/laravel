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
	       	@if (Auth::user()->isHRD())
	        <th>Location</th>
	        @endif
	        <th>ID#</th>
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
	        @if (Auth::user()->isHRD())
	        <th>Location</th>
	        @endif
	        <th>ID#</th>
	      </tr>
	    </tfoot>
	    <tbody>
		
		@if($humans)
			@foreach($humans as $human)
			  <tr>
			  	<td><img width="75px" src="{{ url('images/'.$human->photo) }}"></td>
				@if (Auth::user()->isHRD())
				<td>{{$human->name}}</td>
				@endif
				@if (Auth::user()->isBowner())
				<td>{{$human->name}}</td>
				@endif
				@if (Auth::user()->isOutlet())
				<td>{{$human->name}}</td>
				@endif
				<td>{{$human->job}}</td>
				<td>{{date("d-m-Y", strtotime($human->start_day))}}</td>
				<td>{{date("d-m-Y", strtotime($human->birth))}}</td>
				<td>{{$human->gender}}</td>
				<td>{{$human->address1 .','. $human->address2}}</td>
				<td>{{$human->phone}}</td>
				 @if (Auth::user()->isHRD())
	        	<td>{{$human->location}}</td>
	        	@endif
				<td>{{$human->idnum}}</td>
			  </tr>
			@endforeach
		@endif  
		
	    </tbody>
	  	</table>
	</div>

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

