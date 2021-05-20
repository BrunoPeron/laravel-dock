@extends('layouts.main')

@section('title', 'Decriptografia')

@section('content')

        <div id="event-create-container" class="col-md-6 offset-md-3" style="background-color: #181818; border-radius: 10px; padding-bottom: 150px; margin-top: 25px; padding-top: 50px;">
            <h1 style="color: #ffffff" >Decriptografar senha</h1>
            <form action="/encdec/post" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group" style="margin-top: 35px">
                    <label for="title" style="color: #b3b3b3">Senha encriptada:</label>
                    <input type="text" class="form-control" id="string_request" name="string_request" placeholder="Senha encriptada" required autofocus>
                </div>
                <input type="submit" class="btn btn-primary" value="Decriptografar" style="margin-top: 25px">
                @if(!empty(session('resposta')))
                    <h2>{{session('resposta')}}</h2>
                @endif
            </form>
        </div>
@endsection
