@extends('layouts.home')

@section('title','Form User')

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
	<form class="form-horizontal" action="/User/{{$User->id}}" method="POST">
	@method('PUT')
  	@csrf
		<!-- {{csrf_field()}} -->
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>


<!-- Text input-->
<div class="form-group row">
  <label class="col-md-4 control-label" for="name">Nama</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text"  class="form-control input-md" required="" value="{{empty(old('name'))?$User->name:old('name')}}">
    
  </div>
</div>

<div class="form-group row">
  <label class="col-md-4 control-label" for="nama">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text"  class="form-control input-md" required="" value="{{empty(old('email'))?$User->email:old('email')}}">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group row">
  <label class="col-md-4 control-label" for="password">Password</label>  
  <div class="col-md-4">
  <input id="password" name="password" type="password" placeholder="" class="form-control input-md" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group row">
  <label class="col-md-4 control-label" for="password">Password Confirmation</label>  
  <div class="col-md-4">
  <input id="password_confirmation" name="password_confirmation" type="password" placeholder="" class="form-control input-md" required="" >
    
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