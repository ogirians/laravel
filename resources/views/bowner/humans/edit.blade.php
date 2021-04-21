@extends('layouts.bowner')

@section('content')

 <ul class="nav nav-tabs" role="tablist">
		<li role="presenstation" class="active"><a href="#view" aria-controls="view" role="tab" data-toggle="tab"><strong>Biodata</strong></a></li>
		<li role="presenstation"><a href="#create" aria-controls="create" role="tab" data-toggle="tab"><strong>history penilaian</strong></a></li>
</ul>

@include('includes.message')


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
				<div class="form-group col-sm-6 has-feedback">
					{!! Form::label('NIK', 'NIK (*):') !!}
					{!! Form::text('nik',null, ['class'=>'form-control', 'required']) !!}
				</div>
				
				<div class="form-group col-sm-6 has-feedback">
					{!! Form::label('status', 'status (*):') !!}
					{!! Form::text('status', null, ['class'=>'form-control', 'required']) !!}
				</div>
			</div>
			
			
			<div class="row">
				<div class="form-group col-sm-6">
					{!! Form::label('gender', 'Gender (*):') !!}
					{!! Form::select('gender', [''=>'Choose Option', 'Laki – laki'=>'Laki – laki', 'Perempuan'=>'Perempuan'], null, ['class'=>'form-control']) !!}
				</div>

				<div class="form-group col-sm-6">
					{!! Form::label('phone', 'Phone (*):') !!}
					{!! Form::text('phone', null, ['class'=>'form-control', 'required']) !!}
				</div>
				<div class="form-group col-sm-6">
					{!! Form::label('phone_fam', 'Phone_family (*):') !!}
					{!! Form::text('phone_fam', null, ['class'=>'form-control', 'required']) !!}
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-sm-6">
					{!! Form::label('idnum', 'ID# (*):') !!}
					{!! Form::text('idnum', null, ['class'=>'form-control']) !!}
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
				<div class="form-group col-sm-6 has-feedback">
					{!! Form::label('agama', 'agama (*):') !!}
					{!! Form::text('agama', null, ['class'=>'form-control', 'required']) !!}
				</div>
			</div>


			<div class="row">
					<div class="form-group col-sm-6">
					 {!! Form::label('location', 'location/Group Perfomance:') !!}
					 
					 <select class="form-control" id="exampleFormControlSelect1" name="location" required="required" value="{{ old('location') }}">
					 	  @if (Auth::user()->isOutlet() || Auth::user()->isBowner())
					 	  <option>{{ $human -> location }}</option>
					 	  @endif
			              
			              @if (Auth::user()->isHRD())
			              	<option>{{ $human -> location }}</option>
			               	@foreach ($location as $l)
             					<option>{{ $l -> name }}</option>
              				@endforeach
			              @endif
			              </select>
					</div>

					<div class="form-group col-sm-6">
						 {!! Form::label('level', 'level:') !!}					 
						 <select class="form-control" id="exampleFormControlSelect1" name="humans_level" required="required" value="{{ old('location') }}">
						 	  <option>{{ $human-> humans_level }}</option>           
						 	  <option>A</option>           
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
			

			@if (Auth::user()->isHRD())
			<div class="form-group">
				<button onclick="return confirm('simpan perubahan?')" type="submit" class="btn btn-primary col-sm-2">save changes </button>
			</div>
			@endif
			
			{!! Form::close() !!}
			
			<div class="row">

			@if(auth::user() -> isHRD())

			
				<div class="form-group" style="margin-top:-50px; margin-left: 50px;">
					<button href="#" class="btn btn-warning col-sm-2" data-toggle="modal" data-target="#terserah_{{ $human->id}}">
						resign
					</button>

					   <div class="modal fade" id="terserah_{{ $human->id }}" role="dialog">
                           <div class="modal-dialog">
                               <div class="modal-content">

                                         <div class="modal-header">
                                         		<button type="button" class="close" data-dismiss="modal">&times;</button>
                                               <h4 class="modal-title"></h4>
                                                <h2>Masukkan Tanggal Resign</h2>
                                                
                                         </div>
                                         {!! Form::open(['method'=>'POST', 'action'=>['BownerHumansController@resign']]) !!}
		                                 <div class="modal-body">   
		                                       <label for="exampleFormControlInput1">tanggal</label>
		                                       <input class="form-control" id="exampleFormControlInput1" placeholder="tanggal" type="date" name="waktu" required="required" >
		                                        <button class="btn btn-success" type="submit" style="margin-top: 20px;">Kirim</button>
		                                 
		                                 </div>

		                                 <div class="form-group">          
      											<input type="hidden" class="form-control" name="id" required="required" value="{{ $human->id }}">
  										</div>

		                                 {!! Form::close() !!}
		                                <div class="modal-footer">
		                                     <button type="button" class="btn btn-primary m-t-10" data-dismiss="modal" > Tutup
		                                     </button>
		                                </div>
                               </div>
                           </div>
                       </div>

			</div>
			
			
		
			{!! Form::open(['method'=>'DELETE', 'action'=>['BownerHumansController@destroy', $human->id]]) !!}
				<div class="form-group" style="margin-top:-50px;">
					<button onclick="return confirm('data yang telah dihapus tidak dapat dikembalikan, apa ingin melanjutkan?')" type="submit" class="btn btn-danger col-sm-2">delete data</button>
				</div>
			{!! Form::close() !!}


			@endif

			<div class="alert alert-warning" style="max-width: 300px; float: right;">
	  		<strong>Catatan :</strong>
	  		<p>level A => Manajer / GA</p>
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
		<table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
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
			 
	  		<td style=" text-align: center;">
	  		@if(auth::user() -> isHRD())
	  		<a class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus penilaian" href="/HRD/calculator/delete/{{ $h -> id}}/{{ $h -> no }}" onclick="return confirm('Yakin ingin menghapus penilaian ini ?')"><span class="glyphicon glyphicon-remove"></span></a>

	  		<a class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="lihat detail" href="/HRD/calculator/detail/{{ $h -> id}}/{{ $h -> no }}"><span class="glyphicon glyphicon-list-alt"></span></a>
	  		@endif

	  		@if(auth::user() -> isOutlet())
	  		<a class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="lihat detail" href="/outlet/detail/{{ $h -> id}}/{{ $h -> no }}"><span class="glyphicon glyphicon-list-alt"></span></a>
	  		@endif

	  		@if(auth::user() -> isBowner())
	  		<a class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="lihat detail" href="/bowner/calculator/detail/{{ $h -> id}}/{{ $h -> no }}"><span class="glyphicon glyphicon-list-alt"></span></a>
	  		
	  		@endif
	  		</td>

	  		
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

	 <script type="text/javascript">
		  $(document).ready(function() {
		    $('#dataTable').DataTable( {
		        "order": [[ 0, "desc" ]]
		    } );
		} );
	</script>
@stop