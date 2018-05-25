@extends('welcome')
@section('title',$Aduan->judul)

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="panel panel-default">
    <div class="panel-body">
        <p class="text-muted">By <span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$Aduan->user->name}} | <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> {{date('d-M-Y',strtotime($Aduan->created_at))}}</p>
        <h3>{{$Aduan->judul}}</h3>
        <img src="{{asset('images/'.$Aduan->gambar)}}" alt="{{$Aduan->judul}}" class="img-thumbnail img-responsive">        
        <p>{!! nl2br($Aduan->isi) !!}</p>
    </div>
    <hr>
    <div class="panel-body">
        <h3>Komentar</h3>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="/komentar" class="form-horizontal" method="POST">
            @csrf
            <input type="hidden" name="aduan_id" value="{{$Aduan->id}}">
            <div class="form-group">
                <div class="col-sm-6 col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Nama" required>
                </div>
            
                <div class="col-sm-6 col-md-6">
                    <input type="text" name="email" class="form-control" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 col-md-12">
                    <textarea name="isi" id="isi" rows="5" class="form-control" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6 col-md-6">
                <input type="submit" value="Kirim" type="submit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
    <div class="panel-body">
        @foreach ($Aduan->komentar as $komentar)
        <div class="row comment">
            <div class="head">
                <small><strong class='user'>{{$komentar->user}}</strong> {{date('d-M-Y h:m',strtotime($komentar->created_at))}}</small>
            </div>    
            <p>{{$komentar->isi}}</p>
        </div>            
        @endforeach
    </div>
</div>
</div>
@endsection