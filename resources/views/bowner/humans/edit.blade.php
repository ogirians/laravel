@extends('layouts.bowner')

@section('content')

 <ul class="nav nav-tabs" role="tablist">
		<li role="presenstation" class="active"><a href="#view" aria-controls="view" role="tab" data-toggle="tab"><strong>Biodata</strong></a></li>
		<li role="presenstation"><a href="#create" aria-controls="create" role="tab" data-toggle="tab"><strong>history penilaian</strong></a></li>
</ul>

<div class="tab-content">
 <div role="tabpanel1" class="tab-pane fade in active" id="view">

	<h1>{{ $human-> name }}</h1>
	
	<div class="row">
		<div class="col-sm-3">
			<img src="{{URL::asset($human->photo ? 'images/'.$human->photo : '/images/human.png')}}" alt="Employee Photo" class="img-responsive img-rounded">
		</div>
		
		<div class="col-sm-9">
			@if(auth::user() -> isHRD())
			{!! Form::model($human, ['method'=>'PATCH', 'action'=>['BownerHumansController@update', $human->id], 'files'=>true]) !!}
			@endif
			@if(auth::user() -> isBowner())
			{!! Form::model($human, ['method'=>'PATCH', 'action'=>['BownerHumansController@update', $human->id], 'files'=>true]) !!}
			@endif
			@if(auth::user() -> isOutlet())
			{!! Form::model($human, ['method'=>'PATCH', 'route'=>['outlet.humans.update', $human->id], 'files'=>true]) !!}
			@endif
			<div class="row">
				<div class="form-group col-sm-6">
					{!! Form::label('name', 'Name (*):') !!}
					{!! Form::text('name', null, ['class'=>'form-control']) !!}
				</div>

				<div class="form-group col-sm-6">
					{!! Form::label('job', 'Job Title (*):') !!}
					{!! Form::text('job', null, ['class'=>'form-control']) !!}
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-sm-6 has-feedback">
					{!! Form::label('start_day', 'Start Day (*):') !!}
					{!! Form::text('start_day', $value=$day, ['class'=>'form-control', 'required']) !!}
					<span class="glyphicon glyphicon-calendar form-control-feedback" style="right: 10px; top: 22px;"></span>
				</div>
				
				<div class="form-group col-sm-6 has-feedback">
					{!! Form::label('birth', 'Date of Birth (*):') !!}
					{!! Form::text('birth', $day_birth, ['class'=>'form-control', 'required']) !!}
					<span class="glyphicon glyphicon-calendar form-control-feedback" style="right: 10px; top: 22px;"></span>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-sm-6">
					{!! Form::label('gender', 'Gender (*):') !!}
					{!! Form::select('gender', [''=>'Choose Option', 'laki-laki'=>'laki-laki', 'perempuan'=>'perempuan'], null, ['class'=>'form-control']) !!}
				</div>

				<div class="form-group col-sm-6">
					{!! Form::label('phone', 'Phone (*):') !!}
					{!! Form::text('phone', null, ['class'=>'form-control', 'required']) !!}
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-sm-6">
					{!! Form::label('idnum', 'ID# (*):') !!}
					{!! Form::text('idnum', null, ['class'=>'form-control', 'required']) !!}
				</div>
				
				<div class="form-group col-sm-6">
					{!! Form::label('address1', 'Address 1 (*):') !!}
					{!! Form::text('address1', null, ['class'=>'form-control', 'required']) !!}
				</div>
			</div>

			
			<div class="row">
				<div class="form-group col-sm-6">
					{!! Form::label('address2', 'Address 2:') !!}
					{!! Form::text('address2', null, ['class'=>'form-control']) !!}
				</div>
				
				<div class="form-group col-sm-6">
					{!! Form::label('photo', 'Photo:') !!}
					{!! Form::file('photo', null, ['class'=>'form-control']) !!}
				</div>
			</div>


			<div class="row">
					<div class="form-group col-sm-6">
					 {!! Form::label('location', 'location:') !!}
					 
					 <select class="form-control" id="exampleFormControlSelect1" name="location" required="required" value="{{ old('location') }}">
					 	  @if (Auth::user()->isOutlet() || Auth::user()->isBowner())
					 	  <option>{{ $human -> location }}</option>
					 	  @endif
			              
			              @if (Auth::user()->isHRD())
			              <option>{{ $human -> location }}</option>
			              <option>Tania Tidar</option>
			              <option>Manna</option>
			              <option>BKJ</option>
			              <option>ABM</option>
			              <option>Kania710</option>
			              <option>Menggala</option>
			              <option>Tritan</option>
			              @endif
			              </select>
					</div>

					<div class="form-group col-sm-6">
						 {!! Form::label('level', 'level:') !!}					 
						 <select class="form-control" id="exampleFormControlSelect1" name="humans_level" required="required" value="{{ old('location') }}">
						 	  <option>{{ $human-> humans_level }}</option>           
				              <option>1</option>
				              <option>2</option>
				              <option>3</option>       
				          </select>
					</div>	
			</div>
		


			<div class="form-group">          
      			<input type="hidden" class="form-control" name="role" required="required" value="{{ Auth::user()-> role_id }}">
  			</div>
  			<div class="form-group">          
      			<input type="hidden" class="form-control" name="outlet" required="required" value="{{ Auth::user()-> name }}">
  			</div>
			
			 @if (Auth::user()->isOutlet() || Auth::user()->isHRD())
			<div class="form-group">
				<button onclick="return confirm('simpan perubahan?')" type="submit" class="btn btn-primary col-sm-2">save changes </button>
			</div>
			@endif
			{!! Form::close() !!}
			
			<div class="row">
			@if(auth::user() -> isHRD())

			{!! Form::open(['method'=>'GET', 'action'=>['BownerHumansController@resign', $human->id]]) !!}
				<div class="form-group" style="margin-top:-50px; margin-left: 50px;">
					<button onclick="return confirm('status {{ $human->name }} akan berubah jadi resign, apa ingin melanjutkan?')" type="submit" class="btn btn-warning col-sm-2">resign </button>
				</div>
			{!! Form::close() !!}
			
		
			{!! Form::open(['method'=>'DELETE', 'action'=>['BownerHumansController@destroy', $human->id]]) !!}
				<div class="form-group" style="margin-top:-50px;">
					<button onclick="return confirm('data yang telah dihapus tidak dapat dikembalikan, apa ingin melanjutkan?')" type="submit" class="btn btn-danger col-sm-2">delete data</button>
				</div>
			{!! Form::close() !!}
			@endif

			<div class="alert alert-warning" style="max-width: 300px; float: right; margin-top: -36px;">
	  		<strong>Catatan :</strong>
			<p>level 1 => Kepala Outlet / Kepala Bagian</p>
			<p>level 2 => Staff / Admin </p>
			<p>level 3 => Driver / Helper </p>
			</div>
			</div>
			</div>



	</div>
	<hr>
	@include('includes.form_error')

</div>

<div role="tabpanel2" class="tab-pane fade" id="create" style="padding: 20px;">
	<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped">
	    <thead>
	      <tr>
	        <th>name</th>
	        <th>tanggal</th>
	        <th>nilai</th>
	        <th>kualitas</th>
	        <th>opsi</th>
	      </tr>
	    </thead>
	    <tfoot>
	       <tr>
	 	    <th>name</th>
	        <th>tanggal</th>
	        <th>nilai</th>
	        <th>kualitas</th>
	        <th>opsi</th>
	      </tr>
	  </tfoot>
	  <tbody>
	  	@foreach ( $nilai as $h)
	  	   <tr>
	  		<td>{{ $h -> name}}</td>
	  		<td>{{ Carbon\Carbon::parse($h -> pdate)->format('d-M-Y') }}</td>
	  		<td><p id="Ntotal_{{ $loop->index }}">{{ $h -> total}}</p></td>
	  		<td><p id="Kualitaschoice_{{ $loop->index }}"></p></td>
			        <script>
			        var p = document.getElementById('Ntotal_{{ $loop->index }}');
			        var text = p.textContent;
			        var number = Number(text);
			        var relnumber = Math.ceil(number);
			        var kua = kualitas(relnumber);

			        document.getElementById("Kualitaschoice_{{ $loop->index }}").innerHTML = kua;
			        </script>
	  		<td></td>
	  	   </tr>
	  	@endforeach
	  </tbody>
	 </table>

	</div>
</div>


</div>
@stop

@section('scripts')
	<script type="text/javascript">
	$(function() {
		$('input[id="start_day"], input[id="birth"]').daterangepicker({
			format: 'DD-MM-YYYY',
			singleDatePicker: true,
			showDropdowns: true
		}, 
		function(start, end, label) {
			var years = moment().diff(start, 'years');
			//alert("You joined " + years + " ago");
		});
	});
	</script>
@stop