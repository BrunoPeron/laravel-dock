
@extends('layouts.main')

@section('title', 'Criar usuario')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3" style="background-color: #181818; border-radius: 15px; margin-top: 20px    ">
        <div class="row justify-content-left" style="padding-top:10px; color: #ffffff; font-size: 35px; padding-bottom: 20px">
            <label>Criar usuario</label>
        </div>
        @if(session('msg-alert'))
            <div class="mb-2 font-medium text-sm text-red-600">
                {{ session('msg-alert') }}
            </div>
        @endif
        @if(session('msg-sucess'))
            <div class="mb-2 font-medium text-sm text-green-600">
                {{ session('msg-sucess') }}
            </div>
        @endif
        <form action="/users/post" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group" style="color: #b3b3b3;" >
                <label for="title">Nome do usuario:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome de usuario" required autofocus>
            </div>
            <div class="form-group" style="color: #b3b3b3;">
                <label for="title">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group" style="color: #b3b3b3;">
                <label for="title">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
            </div>
            <div class="form-group">
                <label for="title" style="color: #b3b3b3;">Permissão do usuario</label>
                <div class="form-group" style="color: #b3b3b3;">
                    <input type="radio"  name="cargo" value="user" style="margin-right: 10px" checked>  Usuario
                </div>
                <div class="form-group" style="color: #b3b3b3;">
                    <input type="radio"  name="cargo" value="admin" style="margin-right: 10px">  Administrador
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Usuario">
        </form>
    </div>
@endsection
