@extends('layouts.bowner')

@section('content')

	@include('includes.message')

	<h1>Customers</h1>
	
	<div class="table-responsive">
		<table  class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" >
	    <thead>
	      <tr>
	        <th>Id</th>
	        <th>Name</th>
	        <th>Address</th>
	        <th>Phone</th>
	        <!--<th>Tax Code</th>-->
	      </tr>
	    </thead>
	    <tfoot>
	      <tr>
	        <th>Id</th>
	        <th>Name</th>
	        <th>Address</th>
	        <th>Phone</th>
	        <!--<th>Tax Code</th>-->
	      </tr>
	    </tfoot>
	    <tbody>
		
		@if($rc)
			@foreach($rc as $rc)
			  <tr>
				<td>{{$rc->id}}</td>
				<td><a href="/DM/rc/sc/{{ $rc->id }}">{{$rc->nama}}</a></td>
				<td>{{$rc->alamat}}</td>
				<td>{{$rc->HP}}</td>
				
			  </tr>
			@endforeach
		@endif  
		
	    </tbody>
	  	</table>
  </div>
	


<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').DataTable( {
        "order": [[ 1, "asc" ]]
    } );
} );
</script>


@endsection
