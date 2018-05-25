@extends('layouts.home')

@section('title','Form Kategori')

@section('content')

<div class="row"> 
@if ($errors->any())
  <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$errors}}</li>
        @endforeach
      </ul>
    </div>

@endif

</div>
	<form class="form-horizontal" action="/User" method="POST">
		
		@csrf
		<!-- {{csrf_field()}} -->
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Text input-->



<!-- Text input-->
<div class="form-group row">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text"  class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group row">
  <label class="col-md-4 control-label" for="nama">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text"  class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group row">
  <label class="col-md-4 control-label" for="password">Password</label>  
  <div class="col-md-4">
  <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group row">
  <label class="col-md-4 control-label" for="password_confirmation">Password Confirmation</label>  
  <div class="col-md-4">
  <input id="password_confirmation" name="password_confirmation" type="password_confirmation" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>



<!-- Button (Double) -->
<div class="form-group row">
  <label class="col-md-4 control-label" for="save">Double Button</label>
  <div class="col-md-8">
    <button id="save" name="save" class="btn btn-primary">Save</button>
    <button id="cencel" name="cencel" class="btn btn-info">Cancel</button>
  </div>
</div>

</fieldset>
</form>

@endsection