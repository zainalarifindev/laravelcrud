@extends('layouts.home')

@section('title','Data Aduan')

@section('content')
@if($message= Session::get('status'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">x</button>
	<strong>{{$message}}</strong>
	
</div>
@endif

<h2>Data Aduan</h2>
<table class="table">
	<tr>
		<td>No</td>
		<td>Judul</td>
		<td>Kategori</td>
		<td>Penulis</td>
		
	</tr>

@foreach ($data_Aduan as $Aduan)
<tr>
	<td>{{$Aduan->id}}</td>
	<td>{{$Aduan->judul}}</td>
	<td>{{$Aduan->kategori->nama}}</td>
	<td>{{$Aduan->user->name}}</td>
	<td>
		<a href="/Aduan/{{$Aduan->id}}/edit" class="btn btn-primary">Edit</a>
		<td><form action="/Aduan/{{$Aduan->id}}" method="post">
			@method('DELETE')
			@csrf
			<button class="btn btn-danger">DELETE</button></form></td>
	</td>
</tr>
@endforeach
</table>
<a href="/Aduan/create" class="btn btn-danger">Tambah data</a>
@endsection