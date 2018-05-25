@extends('layouts.home')

@section('title','Data User')

@section('content')
@if($message= Session::get('status'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">x</button>
	<strong>{{$message}}</strong>
	
</div>
@endif

<h2>Data User</h2>
<table class="table">
	<tr>
		<td>No</td>
		<td>Name</td>
		<td>Email</td>
		<td>Level</td>
<!-- 		<td>Password</td>
 -->
		<td>Action</td>		
	</tr>

@foreach ($data_User as $User)
<tr>
	<td>{{$User->id}}</td>
	<td>{{$User->name}}</td>
	<td>{{$User->email}}</td>
	<td>{{$User->level}}</td>
	<!-- <td>{{$User->password}}</td>
 -->	<td>
		<a href="/User/{{$User->id}}/edit" class="btn btn-primary">Edit</a>
		<td><form action="/User/{{$User->id}}" method="post">
			@method('DELETE')
			@csrf
			<button class="btn btn-danger">DELETE</button></form></td>
	</td>
</tr>
@endforeach
</table>
<a href="/User/create" class="btn btn-danger">Tambah data</a>
@endsection