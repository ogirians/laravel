@extends('layouts.bowner')

@section('content')
	<h1>Add Employee</h1>
	

	
	@if (Auth::user()->isHRD())
	{!! Form::open(['route' => 'HRD.humans.store']) !!}
	@endif

	@if (Auth::user()->isBowner())
	{!! Form::open(['route' => 'bowner.humans.store']) !!}
	@endif

	@if (Auth::user()->isOutlet())
	{!! Form::open(['route' => 'outlet.humans.store', 'files'=>true ]) !!}
	@endif

	<div class="row">
		<div class="form-group col-sm-6">
			{!! Form::label('name', 'Name (*):') !!}
			{!! Form::text('name', null, ['class'=>'form-control', 'required']) !!}
		</div>

		<div class="form-group col-sm-6">
		 {!! Form::label('job', 'Job:') !!}
		 
		 <select class="form-control" id="exampleFormControlSelect1" name="job" required="required" value="{{ old('job') }}">  
              @if (Auth::user()->isOutlet())
              <option>Staff Purchasing</option>
              <option>Staff Admin Purchasing</option>
              <option>Staff Finance</option>
              <option>Staff Marketing</option>
              <option>Staff Expedition</option>
              <option>Staff Production</option>
              <option>Staff Accounting & Tax</option>
              <option>Staff Digital Marketing</option>
              <option>Staff HRD</option>
              <option>Staff IT</option>          
              @endif
              </select>
		</div>

	</div>

	<div class="row">
		<div class="form-group col-sm-6 has-feedback">
			{!! Form::label('start_day', 'Start Day (*):') !!}
			{!! Form::text('start_day', null, ['class'=>'form-control', 'required']) !!}
			<span class="glyphicon glyphicon-calendar form-control-feedback" style="right: 10px; top: 22px;"></span>
		</div>

		<div class="form-group col-sm-6 has-feedback">
			{!! Form::label('birth', 'Date of Birth (*):') !!}
			{!! Form::text('birth', null, ['class'=>'form-control', 'required']) !!}
			<span class="glyphicon glyphicon-calendar form-control-feedback" style="right: 10px; top: 22px;"></span>
		</div>
	</div>
	
	<div class="row">
		<div class="form-group col-sm-6">
			{!! Form::label('gender', 'Gender (*):') !!}
			{!! Form::select('gender', [''=>'Choose Option', 'male'=>'Male', 'female'=>'Female'], null, ['class'=>'form-control', 'required']) !!}
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
		 	  @if (Auth::user()->isOutlet())
		 	  <option>{{ Auth::user()->name }}</option>
		 	  @endif
              
              @if (Auth::user()->isHRD())
              <option>-not selected-</option>
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
		
	</div>

	<div class="row">
		<div class="form-group col-sm-3">
			{!! Form::submit('Add Employee', ['class'=>'btn btn-primary']) !!}
		</div>
	</div>

	{!! Form::close() !!}	
	
	<hr>
	@include('includes.form_error')
	
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