@extends('layouts.bowner')

@section('content')

	@include('includes.message')

	<h1>Leaves</h1>
	<!-- Start .nav nav-tabs -->
		<div class="table-responsive">
		<table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
		    <thead>
		      <tr>
		        <th>Id</th>
		        <th>foto</th>
		        <th>Name</th>
		        <th>posisi terakhir</th>
		        <th>Tgl Masuk</th>
		        <th>Tgl Resign</th>
		        <th>lama berkerja</th>
		        <th>lokasi</th>
		      </tr>
		    </thead>
		    <tfoot>
		      <tr>
		   		<th>Id</th>
		        <th>foto</th>
		        <th>Name</th>
		        <th>posisi terakhir</th>
		        <th>Tgl Masuk</th>
		        <th>Tgl Resign</th>
		        <th>lama berkerja</th>
		        <th>lokasi</th>
		    </tfoot>
		    <tbody>
			@if($humanres)
				@foreach($humanres as $hl)
				  <tr>
					<td>{{$hl->id}}</td>
					<td><img width="75px" src="{{ url('images/'.$hl->photo) }}"></td>
					<!--<td><a href="{{route('outlet.leaves.edit', $hl->id)}}">{{$hl->name}}</a></td>-->
					<td>{{ $hl->name }}</td>
					<td>{{$hl -> job}}</td>
					<td>{{ Carbon\Carbon::parse($hl -> start_day)->format('d-M-Y') }}</td>
					<td>{{ Carbon\Carbon::parse($hl -> leave_date)->format('d-M-Y') }}</td>
					<td>{{ $hl -> days}}</td>
					<td>{{ $hl -> location}}</td>
				  </tr>
				@endforeach
			@endif  
		    </tbody>
	  	</table>
	  	</div>
	  	<!-- End .table-responsive -->


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

