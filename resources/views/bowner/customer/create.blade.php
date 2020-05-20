@extends('layouts.bowner')

@section('content')
	<h1>Add Customer</h1>
	
	{!! Form::open(['method'=>'POST', 'action'=>'CustomerController@store']) !!}
	<div class="row">
		<div class="form-group col-sm-6">
			{!! Form::label('name', 'Name (*):') !!}
			{!! Form::text('name', null, ['class'=>'form-control', 'required']) !!}
		</div>
		
		<div class="form-group col-sm-6">
			{!! Form::label('phone', 'Phone (*):') !!}
			{!! Form::text('phone', null, ['class'=>'form-control', 'required']) !!}
		</div>
	</div>
	
	<div class="row">
		<div class="form-group col-sm-6">
			{!! Form::label('address1', 'Address 1 (*):') !!}
			{!! Form::text('address1', null, ['class'=>'form-control', 'required']) !!}
		</div>
	
		<div class="form-group col-sm-6">
			{!! Form::label('address2', 'Address 2:') !!}
			{!! Form::text('address2', null, ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="row">
		<div class="form-group col-sm-6">
			{!! Form::label('age', 'Age (*):') !!}
			{!! Form::text('age', null, ['class'=>'form-control']) !!}
		</div>
	
		<div class="form-group col-sm-6">
			{!! Form::label('gender', 'Gender:') !!}
			<select class="form-control" id="exampleFormControlSelect1" name="gender" required="required" value="{{ old('gender') }}">
             <option>-</option>
             <option>Pria</option>
             <option>Wanita</option>
                
            </select> 
		</div>
	</div>

	<div class="row">
		<div class="form-group col-sm-6">
			{!! Form::label('city', 'City (*):') !!}
			{!! Form::text('city', null, ['class'=>'form-control', 'required']) !!}
		</div>
	
		<div class="form-group col-sm-6">
			{!! Form::label('province', 'Province:') !!}
			{!! Form::text('province', null, ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="row">
		<div class="form-group col-sm-6">
			{!! Form::label('status', 'Status:') !!}
			{!! Form::text('status', null, ['class'=>'form-control']) !!}
		</div>
	
		<div class="form-group col-sm-6">
			{!! Form::label('job', 'Job:') !!}
			{!! Form::text('job', null, ['class'=>'form-control']) !!}
		</div>
	</div>
	
	<div class="row">
		<div class="form-group col-sm-6">
			{!! Form::label('tax_num', 'Tax Code:') !!}
			{!! Form::text('tax_num', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group col-sm-6">
			{!! Form::label('buy', 'Product:') !!}
			{!! Form::text('buy', null, ['class'=>'form-control']) !!}
		</div>
	</div>
		
	<div class="row">
		<div class="form-group col-sm-3">
			{!! Form::submit('Add Customer', ['class'=>'btn btn-primary']) !!}
		</div>
	</div>

	{!! Form::close() !!}	
	
	<hr>
	@include('includes.form_error')
	
@stop

@section('scripts')
	<script type="text/javascript">
	</script>
@stop