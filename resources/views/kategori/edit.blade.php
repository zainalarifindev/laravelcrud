@extends('layouts.home')

@section('title','Form kategori')

@section('content')

	<form class="form-horizontal" action="/Kategori/{{$Kategori->id}}" method="POST">
	@method('PUT')
  	@csrf
		<!-- {{csrf_field()}} -->
<fieldset>

<!-- Form Name -->
<legend>Form Kategori</legend>



<!-- Text input-->
<div class="form-group row">
  <label class="col-md-4 control-label" for="nama">Jenis Kategori</label>  
  <div class="col-md-4">
  <input id="nama" name="nama" type="text"  class="form-control input-md" required="" value="{{$Kategori->nama}}">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group row">
  <label class="col-md-4 control-label" for="keterangan">Keterangan</label>  
  <div class="col-md-4">
  <input id="keterangan" name="keterangan" type="text" placeholder="" class="form-control input-md" required="" value="{{$Kategori->keterangan}}">
    
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