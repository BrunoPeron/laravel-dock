@extends('layouts.main')

@section('title', 'Criar usuario')

@section('content')
    <div class="container px-5 text-center">
        <div class="row" style="background-color: #181818; padding-bottom: 25px; border-radius: 10px; margin-top: 100px; width: 100%">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="row justify-content-center" style="padding-top:10px; margin-right: 20px; margin-left: 20px">
                        <img src="/img/ixc.png" alt="Ixc soft" width="10%">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col" style="padding-top:10px; padding-left: 50px">
                        <div class="row" style="padding-top:10px; color: #ffffff; font-size: 35px">
                            <label>Login de usuario</label>
                        </div>
                        <form method="POST" action="{{ route('login') }}" style="background-color: #181818; color: #ffffff">
                            <div class="row justify-content-left">
                            <x-jet-validation-errors class="mb-4"/>
                                @if (session('status'))
                                    <div class="mb-2 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row justify-content-left" style=" color: #b3b3b3; font-size: 20px">
                                <label>Email</label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Digite seu email de usuario" >
                            </div>
                            <div class="row justify-content-left" style="padding-top:10px; color: #b3b3b3; font-size: 20px">
                                <label>Senha</label>
                                <input class="form-control" id="password"  name="password" type="password" placeholder="Digite sua senha" >
                            </div>
                            <div class="row justify-content-end" style="padding-left:200px; color: #b3b3b3; margin-top: 40px">
                                <input type="submit" class="btn btn-primary" value="Confirmar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
