@extends('layouts.home')

@section('title','Form Aduan')

@section('content')
@if ($errors->any())
  <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$errors}}</li>
        @endforeach
      </ul>
    </div>

@endif
	<form class="form-horizontal" action="/Aduan" method="POST" enctype="multipart/form-data">  
    <!-- ENCTYPE MULTIPART/FROM-DATA- UNTUK MEMBACA FILE -->
		
		@csrf
		<!-- {{csrf_field()}} -->
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Text input-->

</div>
<div class="container">
<div class="row">
  <div class="col-md-4">
    <label  for="judul">Judul</label>
    <input id="judul" name="judul" type="text"  class="form-control input-md" required="">
  </div>
  <!-- untuk memperoleh dari kategori -->
  <div class="col-md-4">
    <label class="col-md-3 control-label" for="judul">Kategori</label>  
      <select name="Kategori" id="Kategori" class="form-control">
        @foreach($data_Kategori as $Kategori)
          <option value="{{$Kategori->id}}">
            {{$Kategori->nama}}
          </option>
          @endforeach
      </select>
  </div>
</div>



<br>
<!-- Text input-->
<div class="form-group row">
  <label class="col-md-4" for="isi">Isi</label>  
</div>
  <div class="col-md-8">
  <textarea id="isi" name="isi" type="text" cols="15px" rows="5px" placeholder="" class="form-control input-md" required=""></textarea>
    
  </div>
</div>
<!-- GAMBAR -->
<div class="form-group">
  <label for="gambar" class="control-label col-sm-2">Gambar</label>
  <div class="col-sm-8">
    <input type="file" name="gambar" class="form-group">
  </div>
</div>

<br>
<!-- Button (Double) -->
<div class="form-group row" style="margin-left: 10px">
<!--   <label class="col-md-4 control-label" for="save">Double Button</label>
 -->  <div class="col-md-8">
    <button id="save" name="save" class="btn btn-primary">Save</button>
    <button id="cencel" name="cencel" class="btn btn-info">Cancel</button>
  </div>
  </div>






</fieldset>
</form>

@endsection


<!-- https://github.com/dwijonarko/laravel-blog -->