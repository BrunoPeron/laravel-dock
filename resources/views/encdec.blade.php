@extends('layouts.main')

@section('title', 'Decriptografia')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Decriptografar senha</h1>
        <form action="/encdec/post" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Senha encriptada:</label>
                <input type="text" class="form-control" id="string_request" name="string_request" placeholder="Senha encriptada" required autofocus>
            </div>
            <input type="submit" class="btn btn-primary" value="Decriptografar">
            @if(!empty(session('resposta')))
                <h2>{{session('resposta')}}</h2>
            @endif
        </form>
    </div>

@endsection
