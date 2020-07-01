@extends('layouts.bowner')

@section('content')

  @include('includes.message')
  
  <div class="container">
   <h3 align="center">Import & Export Data Customer</h3>
    <br />
   @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <form method="post" enctype="multipart/form-data" action="{{ url('/DM/import_excel/import') }}">
    {{ csrf_field() }}
    <div class="form-group">
     <table class="table">
      <tr>
       <td width="40%" align="right"><label>Select File for Upload</label></td>
       <td width="30">
        <input type="file" name="select_file" />
       </td>
       <td width="30%" align="left">
        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
       </td>
      </tr>
      <tr>
       <td width="40%" align="right"></td>
       <td width="30"><span class="text-muted">.xls, .xslx</span></td>
       <td width="30%" align="left"></td>
      </tr>
     </table>
    </div>
   </form>
   
   <div align="center">
    <a href="{{ route('bowner.export_excel.excel') }}" class="btn btn-success">Export to Excel</a>
   </div>
   
   <br />
   <div class="table-responsive">
    <table class="table table-hover table-bordered table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Address</th>
          <th>City</th>
          <th>Province</th>
          <th>Phone</th>
          <th>Tax Code</th>
        </tr>
      </thead>
      <tbody>
    
    @if($data)
      @foreach($data as $customer)
        <tr>
        <td>{{$customer->id}}</td>
        <td><a href="{{route('bowner.customer.edit', $customer->id)}}">{{$customer->name}}</td>
        <td>{{$customer->address1 .','. $customer->address2}}</td>
        <td>{{$customer->city}}</td>
        <td>{{$customer->province}}</td>
        <td>{{$customer->phone}}</td>
        <td>{{$customer->tax_num}}</td>
        </tr>
      @endforeach
    @endif  
    
      </tbody>
      </table>
  </div>
  </div>
@stop

@section('scripts')
<script>
</script>
@stop
