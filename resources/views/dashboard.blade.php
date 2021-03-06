@extends('layouts.main')

@section('title', 'Ixcsoft')

@section('content')
    @if(Auth::user()->status == 'enable')
        <div class="col-md-4 offset-md-1" style="margin-top: 40px">
            <div class="row" style="padding-top:10px;  background-color: #181818; padding-bottom: 25px; border-radius: 10px; margin-top: 20px">
                <div class="col-md-3 offset-md-1" style="margin-left: 3%">
                    <div style="padding-top:10px;">
                        <i class="bi bi-unlock-fill" style="font-size: 90px; color: #ffffff;"></i>
                    </div>
                </div>
                <div class="col-md-6">
                    <div  style="padding-top:10px; width: 130%;">
                        <div class="row justify-content-left" style="padding-top:10px; color: #ffffff; font-size: 35px">
                            <label>Decriptografia</label>
                        </div>
                        <div class="row justify-content-left" style="padding-top:10px; color: #ffffff;">
                            <label style="color: #b3b3b3">Decifra uma palavra criptografada</label>
                        </div>
                        <div class="row justify-content-end" style="padding-left:200px; color: #ffffff;">
                            <a href="/encdec" class="btn btn-primary"  style="margin-top: 25px">Prosseguir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 offset-md-2" style="margin-top: 40px">
            <div class="row" style="padding-top:10px;  background-color: #181818; padding-bottom: 25px; border-radius: 10px; margin-top: 20px">
                <div class="col-md-3 offset-md-1" style="margin-left: 3%">
                    <div style="padding-top:10px;">
                        <i class="bi bi-unlock-fill" style="font-size: 90px; color: #ffffff;"></i>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div style="padding-top: 10px; width: 130%">
                        <div class="row justify-content-left" style="padding-top:10px; color: #ffffff; font-size: 35px;">
                            <label>Decriptografia Elastic</label>
                        </div>
                        <div class="row justify-content-left" style="padding-top:10px; color: #ffffff;">
                            <label style="color: #b3b3b3">Decifra a senha do ElasticSearch</label>
                        </div>
                        <div class="row justify-content-end" style="padding-left:200px; color: #ffffff;">
                            <a href="/encdecelastic" class="btn btn-primary"  style="margin-top: 25px">Prosseguir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(Auth::user()->cargo == 'admin')
            <div class="col-md-4 offset-md-1" >
                <div class="row" style="margin-top: 80px; padding-top:10px;  background-color: #181818; padding-bottom: 25px; border-radius: 10px;">
                    <div class="col-md-3 offset-md-1" style="margin-left: 3%">
                        <div style="padding-top:10px;">
                            <i class="bi bi-person-plus-fill" style="font-size: 90px; color: #ffffff;"></i>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="padding-top: 10px; width: 130%">
                            <div class="row justify-content-left" style="padding-top:10px; color: #ffffff;  font-size: 35px">
                                <label>Gerenciar usu??rio</label>
                            </div>
                            <div class="row justify-content-left" style="padding-top:10px; color: #ffffff;">
                                <label style="color: #b3b3b3">Adiciona, edita ou remove usu??rios</label>
                            </div>
                            <div class="row justify-content-end" style="padding-left:200px; color: #ffffff;">
                                <a href="/users/list" class="btn btn-primary"  style="margin-top: 25px">Prosseguir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 offset-md-2">
                <div class="row" style="padding-top:10px;  background-color: #181818; padding-bottom: 25px; border-radius: 10px; margin-top: 80px">
                    <div class="col-md-3 offset-md-1" style="margin-left: 3%">
                        <div style="padding-top:10px;">
                            <i class="bi bi-person-lines-fill" style="font-size: 90px; color: #ffffff;"></i>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="padding-top:10px; width: 130%">
                            <div class="row justify-content-left" style="padding-top:10px; color: #ffffff;  font-size: 35px">
                                <label>Logs de usu??rio</label>
                            </div>
                            <div class="row justify-content-left" style="padding-top:10px; color: #ffffff;">
                                <label style="color: #b3b3b3">Historico de consultas dos usu??rios</label>
                            </div>
                            <div class="row justify-content-end" style="padding-left:200px; color: #ffffff;">
                                <a href="/logs/list" class="btn btn-primary"  style="margin-top: 25px">Prosseguir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @else
        {{App\Http\Controllers\UsersController::validateuser()}}
    @endif

@endsection
