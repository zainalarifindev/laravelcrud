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
<div class="container">	
<div class="row">
            <form class="form-horizontal" action="/Aduan/{{$Aduan->id}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <div class="col-sm-3">
                    <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul Aduan" value="{{$Aduan->judul}}">
                    </div>
                    <div class="col-sm-3">
                        <select name="Kategori" id="Kategori" class="form-control">
                            @foreach ($data_Kategori as $Kategori)
                                <option {{ ($Aduan->Kategori_id==$Kategori->id ? 'selected' : '') }} value="{{$Kategori->id}}"> {{$Kategori->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <textarea name="isi" id="isi" type="textarea" cols="100" rows="10">{{$Aduan->isi}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                      <label for="gambar" class="control-label col-sm-2">Gambar</label>
                      <div class="col-sm-8">
                        <img src="{{asset('images/'.$Aduan->gambar)}}" alt="{{$Aduan->judul}}" width="300px">
                        <input type="file" name="gambar" class="form-group">
                      </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
    </div>
</div>

@endsection
