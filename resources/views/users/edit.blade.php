@extends('layouts.main')

@section('title', 'Criar usuario')

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3" style="background-color: #181818; border-radius: 15px; margin-top: 10%    ">
        <div class="row justify-content-left" style="padding-top:10px; color: #ffffff; font-size: 35px; padding-bottom: 20px">
            <label>Editar usuario</label>
        </div>
        <form action="/users/edit/{{$user->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group" style="color: #b3b3b3;" >
                <label for="title">Nome do usuario:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome de usuario" value="{{$user->name}}" required autofocus>
            </div>
            <div class="form-group" style="color: #b3b3b3;">
                <label for="title">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}">
            </div>
            <div class="form-group" style="color: #b3b3b3;">
                <label for="title">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" value="" placeholder="Senha">
            </div>
            {{--            <div class="form-group">--}}
            {{--                <label for="title">Permissão do usuario</label>--}}
            {{--                <div class="form-group">--}}
            {{--                    <input type="checkbox" name="items[]" value="Cadeiras"> Administrador--}}
            {{--                </div>--}}
            {{--                <div class="form-group">--}}
            {{--                    <input type="checkbox" name="items[]" value="Palco"> Usuario--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <input type="submit" class="btn btn-primary" value="Confirmar">
        </form>
    </div>

@endsection
