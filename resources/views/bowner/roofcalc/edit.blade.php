@extends('layouts.bowner')

@section('content')
	<h1>Edit Customer</h1>
	
		@foreach($rc as $rc)
	<form action="/DM/rc/sc/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $rc->id }}"> <br/>
		Nama<input type="text" required="required" name="nama" value="{{ $rc->nama }}"> <br/>		
		No. Telp/HP <input type="text" required="required" name="HP" value="{{ $rc->HP }}"> <br/>
		Alamat <textarea required="required" name="alamat">{{ $rc->alamat }}</textarea> <br/>
		kanal <input type="number" required="required" name="kanal" value="{{ $rc->kanal }}"> <input type="number" required="required" name="hargakan" value="{{ $rc->hargakan }}"> <br/><br/>
		<input type="submit" value="Simpan Data">
	</form>
	@endforeach	

	
	
	<hr>
	@include('includes.form_error')
	
	
<!--@stop

@section('scripts')
	<script type="text/javascript">
	</script>
@stop-->