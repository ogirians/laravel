@extends('layouts.admin')

@section('content')
	<h1>Edit User</h1>
	
	<div class="row">
		<div class="col-sm-3">
			<img src="{{URL::asset($user->photo ? $user->photo->file : '/images/user.png')}}" alt="User Photo" class="img-responsive img-rounded">
		</div>
		
		<div class="col-sm-9">
			@if(Auth::user()->isAdmin())
			{!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
			<div class="form-group">
				{!! Form::label('name', 'Name (*):') !!}
				{!! Form::text('name', null, ['class'=>'form-control', 'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('username', 'Username (*):') !!}
				{!! Form::text('username', null, ['class'=>'form-control', 'required']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('email', 'Email (*):') !!}
				{!! Form::email('email', null, ['class'=>'form-control', 'required']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('role_id', 'Role (*):') !!}
				{!! Form::select('role_id', $roles, null, ['class'=>'form-control', 'required']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('is_active', 'Status:') !!}
				{!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class'=>'form-control']) !!}
			</div>
			
		    <div class="form-group">
    			{!! Form::label('is_head', 'akun_kepala (*):') !!}
    			{!! Form::select('is_head', array(0 => 'tidak', 1 => 'ya'), null, ['class'=>'form-control']) !!}
		    </div>
		    
				
    		 <div class="form-group">
    		 {!! Form::label('kepala', 'kepala :') !!}
    		 
    		 <select class="form-control" id="exampleFormControlSelect1" name="head" value="{{ old('location') }}">
                  <option selected disabled>{{ $user-> head }}</option>
                  @foreach ($head as $h)
                  <option>{{ $h -> name }}</option>
                  @endforeach
                  </select>
    		</div>
			
			
			
			<div class="form-group">
				{!! Form::label('photo_id', 'Photo:') !!}
				{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('password', 'Password:') !!}
				{!! Form::password('password', ['class'=>'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::submit('Save', ['class'=>'btn btn-primary col-sm-2']) !!}
			</div>

			{!! Form::close() !!}
			
			{!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
				<div class="form-group" style="margin-top:-50px;">
					{!! Form::submit('Delete user', ['class'=>'btn btn-danger col-sm-2']) !!}
				</div>
			{!! Form::close() !!}
			@endif


			@if(Auth::user()->isBowner())
			{!! Form::model($user, ['method'=>'PATCH', 'action'=>['PasswordController@update', $user->id], 'files'=>true]) !!}
			
			<div class="form-group">
				{!! Form::label('username', 'Username (*):') !!}
				{!! Form::text('username', null, ['class'=>'form-control', 'required']) !!}
			</div>
			
			
			<div class="form-group">
				{!! Form::label('password', 'Password:') !!}
				{!! Form::password('password', ['class'=>'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('photo_id', 'Photo:') !!}
				{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::submit('Save', ['class'=>'btn btn-primary col-sm-2']) !!}
			</div>

			{!! Form::close() !!}
			
			@endif

			@if(Auth::user()->isHRD())
			{!! Form::model($user, ['method'=>'PATCH', 'action'=>['HPassController@update', $user->id], 'files'=>true]) !!}
			

			<div class="form-group">
				{!! Form::label('username', 'Username (*):') !!}
				{!! Form::text('username', null, ['class'=>'form-control', 'required']) !!}
			</div>
			
			
			
			
			<div class="form-group">
				{!! Form::label('password', 'Password:') !!}
				{!! Form::password('password', ['class'=>'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('photo_id', 'Photo:') !!}
				{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::submit('Save', ['class'=>'btn btn-primary col-sm-2']) !!}
			</div>

			{!! Form::close() !!}
			
			@endif

			@if(Auth::user()->isOutlet())
			{!! Form::model($user, ['method'=>'PATCH', 'action'=>['OPassController@update', $user->id], 'files'=>true]) !!}
			
			<div class="form-group">
				{!! Form::label('username', 'Username (*):') !!}
				{!! Form::text('username', null, ['class'=>'form-control', 'required']) !!}
			</div>
			
			
		
			
			<div class="form-group">
				{!! Form::label('password', 'Password:') !!}
				{!! Form::password('password', ['class'=>'form-control']) !!}
			</div>
			
				<div class="form-group">
				{!! Form::label('photo_id', 'Photo:') !!}
				{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::submit('Save', ['class'=>'btn btn-primary col-sm-2']) !!}
			</div>

			{!! Form::close() !!}
			
			@endif

			@if(Auth::user()->isDM())
			{!! Form::model($user, ['method'=>'PATCH', 'action'=>['DPassController@update', $user->id], 'files'=>true]) !!}
			
			<div class="form-group">
				{!! Form::label('username', 'Username (*):') !!}
				{!! Form::text('username', null, ['class'=>'form-control', 'required']) !!}
			</div>
			
			
			
			
			<div class="form-group">
				{!! Form::label('password', 'Password:') !!}
				{!! Form::password('password', ['class'=>'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('photo_id', 'Photo:') !!}
				{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::submit('Save', ['class'=>'btn btn-primary col-sm-2']) !!}
			</div>

			{!! Form::close() !!}
			
			@endif
		</div>
	</div>
	<br>
	<div class="row">
		@include('includes.form_error')
	</div>	
@stop