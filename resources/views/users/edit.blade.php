{{--<div class="form-group">--}}
{{--    <form class="form-signin" action="/users/post" method="POST">--}}
{{--        @csrf--}}
{{--        <input type="text" name="name" class="form-control" id="form-text" placeholder="name" required autofocus>--}}
{{--            <span role="alert" class="error-msg" id="errormsg_0_Passwd"></span>--}}
{{--        <input type="text" name="email" class="form-control" id="form-text" placeholder="email" required autofocus>--}}
{{--            <span role="alert" class="error-msg" id="errormsg_0_Passwd"></span>--}}
{{--        <input type="text" name="password" class="form-control" id="form-text" placeholder="password" required autofocus>--}}
{{--            <span role="alert" class="error-msg" id="errormsg_0_Passwd"></span>--}}
{{--        <span role="alert" class="error-msg" id="errormsg_0_Passwd"></span>--}}
{{--        <input type="submit" value="Registrar usuario" class="btn btn-lg btn-primary btn-block" />--}}
{{--        <span class="clearfix"></span>--}}
{{--    </form>--}}
{{--</div>--}}
{{--@extends('layouts.main')--}}

{{--@section('title', 'hdc')--}}

{{--@section('content')--}}
{{--    <td>{{$status ?? ''}}</td>--}}
{{--    <p1>{{$msg ?? ''}}</p1>--}}

{{--@endsection--}}


@extends('layouts.main')

@section('title', 'Criar usuario')

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Criar usuario</h1>
        <form action="/users/edit/{{$user->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Nome do usuario:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome de usuario" value="{{$user->name}}" required autofocus>
            </div>
            <div class="form-group">
                <label for="title">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}">
            </div>
            <div class="form-group">
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
