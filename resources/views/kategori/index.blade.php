@extends('layouts.home')

@section('title','Data Kategori')

@section('content')
@if($message= Session::get('status'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">x</button>
	<strong>{{$message}}</strong>
	
</div>
@endif

<h2>Data Kategori</h2>
<table class="table">
	<tr>
		<td>No</td>
		<td>Nama</td>
		<td>Keterangan</td>
		
	</tr>

@foreach ($data_Kategori as $Kategori)
<tr>
	<td>{{$Kategori->id}}</td>
	<td>{{$Kategori->nama}}</td>
	<td>{{$Kategori->keterangan}}</td>
	<td>
		<a href="/Kategori/{{$Kategori->id}}/edit" class="btn btn-primary">Edit</a>
		<td><form action="/Kategori/{{$Kategori->id}}" method="post">
			@method('DELETE')
			@csrf
			<button class="btn btn-danger">DELETE</button></form></td>
	</td>
</tr>
@endforeach
</table>
<a href="/Kategori/create" class="btn btn-danger">Tambah data</a>
@endsection