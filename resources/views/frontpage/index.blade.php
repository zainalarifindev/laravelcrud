@extends('welcome')
@section('title','Aduan Projects')
@section('content')
    @foreach ($data_Aduan as $Aduan)
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<img src="{{asset('images/'.$Aduan->gambar)}}" alt="{{$Aduan->judul}}" class="img-thumbnail img-responsive">
						<p class="text-muted">By <span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$Aduan->user->name}} | <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> {{date('d-M-Y',strtotime($Aduan->created_at))}}</p>
						<h3>{{$Aduan->judul}}</h3>
						<p>{{str_limit($Aduan->isi,100)}}</p>
						<a href="/show/{{$Aduan->id}}" class="btn btn-default">Read more...</a>
					</div>
				</div>
			</div>   
    @endforeach
@endsection