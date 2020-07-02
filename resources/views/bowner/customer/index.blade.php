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
	        <th>City</th>
	        <th>Province</th>
	        <th>Phone</th>
	        <!--<th>Tax Code</th>-->
	      </tr>
	    </thead>
	    <tfoot>
	      <tr>
	        <th>Id</th>
	        <th>Name</th>
	        <th>Address</th>
	        <th>City</th>
	        <th>Province</th>
	        <th>Phone</th>
	        <!--<th>Tax Code</th>-->
	      </tr>
	    </tfoot>
	    <tbody>
		
		@if($customers)
			@foreach($customers as $customer)
			  <tr>
				<td>{{$customer->id}}</td>
				<td><a href="/DM/edit/{{ $customer->id }}">{{$customer->name}}</a></td>
				<td>{{$customer->address1 .','. $customer->address2}}</td>
				<td>{{$customer->city}}</td>
				<td>{{$customer->province}}</td>
				<td>{{$customer->phone}}</td>
				<!--<td>{{$customer->tax_num}}</td>-->
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
