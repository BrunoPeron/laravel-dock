@extends('layouts.main')

@section('title', 'Criar usuario')

@section('content')
    <div class="row">
        <div class="row justify-content-center" style="padding-top:10px; margin-left: 25%; background-color: #181818; padding-right: 40px; padding-bottom: 25px; border-radius: 10px; margin-top: 20px; width: 890px">
            <div style="padding-top:10px; margin-right: 20px; margin-left: 20px">
                <i class="bi bi-person-bounding-box" style="font-size: 90px; color: #ffffff;"></i>
            </div>
            <div class="col" style="padding-top:10px;">
                <div class="row justify-content-left" style="padding-top:10px; color: #ffffff; font-size: 35px">
                    <label>Informacoes de usuario</label>
                </div>
                <div class="row justify-content-left" style="padding-top:10px; color: #b3b3b3; font-size: 35px">
                    <label>Nome de usuario</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="{{Auth::user()->name}}" disabled="">
                </div>
                <div class="row justify-content-left" style="padding-top:10px; color: #b3b3b3; font-size: 35px; margin-top: 15px; margin-bottom: 20px">
                    <label>Email do usuario</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="{{Auth::user()->email}}" disabled="">
                </div>
            </div>
        </div>
        <div class="row justify-content-center" style="padding-top:10px; margin-left: 25%; background-color: #181818; padding-right: 40px; padding-bottom: 25px; border-radius: 10px; margin-top: 100px; width: 890px">
            <div style="padding-top:10px; margin-right: 20px; margin-left: 20px">
                <i class="bi bi-key-fill" style="font-size: 90px; color: #ffffff;"></i>
            </div>
            <div class="col" style="padding-top:10px;">
                <div class="row justify-content-left" style="padding-top:10px; color: #ffffff; font-size: 35px">
                    <label>Redefinição de senha</label>
                </div>
                <form action="/users/edit/{{$user->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-left" style="padding-top:10px; color: #b3b3b3; font-size: 35px">
                        <label>Senha</label>
                        <input class="form-control" id="passwordA"  name="passwordA" type="password" placeholder="" >
                    </div>
                    <div class="row justify-content-end" style="padding-left:200px; color: #b3b3b3;">
                        <input type="submit" class="btn btn-primary" value="Confirmar">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
