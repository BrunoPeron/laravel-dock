@extends('layouts.main')

@section('title', 'Perfil de usuário')

@section('content')
    <div class="container px-5 text-center" >
        <div class="row" style="padding-top:10px; background-color: #181818; padding-bottom: 25px; border-radius: 10px; margin-top: 20px;">
            <div class="col-md-3">
                <div class="padding-top:10px;">
                        <i class="bi bi-person-bounding-box" style="font-size: 90px; color: #ffffff;"></i>
                </div>
            </div>
            <div class="col-md-6">
                <div  style="padding-top:10px;">
                    <div class="row justify-content-left" style="padding-top:10px; color: #ffffff; font-size: 35px">
                        <label>Informações de usuário</label>
                    </div>
                    <div class="row justify-content-left" style="padding-top:10px; color: #b3b3b3; font-size: 20px">
                        <label>Nome de usuário</label>
                        <input class="form-control" id="disabledInput" type="text" placeholder="{{Auth::user()->name}}" disabled="">
                    </div>
                    <div class="row justify-content-left" style="padding-top:10px; color: #b3b3b3; font-size: 20px; margin-top: 15px; margin-bottom: 20px">
                        <label>Email do usuário</label>
                        <input class="form-control" id="disabledInput" type="text" placeholder="{{Auth::user()->email}}" disabled="">
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top:10px; background-color: #181818; padding-bottom: 25px; border-radius: 10px; margin-top: 100px;">
            <div class="col-md-3">
                <div class="padding-top:10px;">
                    <i class="bi bi-key-fill" style="font-size: 90px; color: #ffffff;"></i>
                </div>
            </div>
            <div class="col-md-6">
                <div style="padding-top:10px;">
                    <div class="row justify-content-left" style="padding-top:10px; color: #ffffff; font-size: 35px">
                        <label>Redefinição de senha</label>
                    </div>
                    <form action="/users/edit/{{$user->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-left">
                            <x-jet-validation-errors class="mb-4"/>
                            @if (session('status'))
                                <div class="mb-2 font-medium text-sm text-red-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        <div class="row justify-content-left" style="padding-top:10px; color: #b3b3b3; font-size: 20px">
                            <label>Senha atual</label>
                            <input class="form-control" id="passwordA"  name="passwordA" type="password" placeholder="Digite a sua senha atual..." required>
                        </div>
                        <div class="row justify-content-left" style="padding-top:10px; color: #b3b3b3; font-size: 20px">
                            <label>Senha</label>
                            <input class="form-control" id="novaSenha"  name="novaSenha" type="password" placeholder="Digite a nova senha" required>
                        </div>
                        <div class="row justify-content-left" style="padding-top:10px; color: #b3b3b3; font-size: 20px">
                            <label>Redigite a senha</label>
                            <input class="form-control" id="novaRSenha"  name="novaRSenha" type="password" placeholder="Confirme a senha" required>
                        </div>
                        <div class="row justify-content-end" style="padding-left:200px; color: #b3b3b3; margin-top: 25px">
                            <input type="submit" class="btn btn-primary" value="Confirmar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
