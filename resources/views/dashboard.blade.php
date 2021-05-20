@extends('layouts.main')

@section('title', 'Ixcsoft')

@section('content')
    <div class="row justify-content-start" style="padding-top:10px; margin-left: 20%; background-color: #181818; padding-right: 40px; padding-bottom: 25px; border-radius: 10px; margin-top: 20px">
        <div class="col" style="padding-top:10px;">
            <i class="bi bi-unlock-fill" style="font-size: 90px; color: #ffffff;"></i>
        </div>
        <div class="col" style="padding-top:10px;">
            <div class="row justify-content-left" style="padding-top:10px; color: #ffffff; font-size: 35px">
                <label>Decriptografia</label>
            </div>
            <div class="row justify-content-left" style="padding-top:10px; color: #ffffff;">
                <label>Decifra uma palavra criptografada</label>
            </div>
            <div class="row justify-content-end" style="padding-left:200px; color: #ffffff;">
                <a href="/encdec" class="btn btn-primary"  style="margin-top: 25px">Prosseguir</a>
            </div>
        </div>
    </div>


    <div class="row justify-content-start" style="padding-top:10px; margin-left: 5%; background-color: #181818; padding-right: 40px; padding-bottom: 25px; border-radius: 10px; margin-top: 20px">
        <div class="col" style="padding-top:10px;">
            <i class="bi bi-unlock-fill" style="font-size: 90px; color: #ffffff;"></i>
        </div>
        <div class="col" style="padding-top:10px;">
            <div class="row justify-content-left" style="padding-top:10px; color: #ffffff; font-size: 35px;">
                <label>Decriptografia</label>
            </div>
            <div class="row justify-content-left" style="padding-top:10px; color: #ffffff;">
                <label>Decifra a senha do ElasticSearch</label>
            </div>
            <div class="row justify-content-end" style="padding-left:200px; color: #ffffff;">
                <a href="/encdec_elastic" class="btn btn-primary"  style="margin-top: 25px">Prosseguir</a>
            </div>
        </div>
    </div>

    @if($cargo == 'admin' && !empty($cargo))
        <div class="row justify-content-start" style="margin-top: 80px; padding-top:10px; margin-left: 20%; background-color: #181818; padding-right: 40px; padding-bottom: 25px; border-radius: 10px;">
            <div class="col" style="padding-top:10px;">
                <i class="bi bi-person-plus-fill" style="font-size: 90px; color: #ffffff;"></i>
            </div>
            <div class="col" style="padding-top:10px;">
                <div class="row justify-content-left" style="padding-top:10px; color: #ffffff;  font-size: 35px">
                    <label>Gerenciar usuario</label>
                </div>
                <div class="row justify-content-left" style="padding-top:10px; color: #ffffff;">
                    <label>Adiciona, edita ou remove usuarios</label>
                </div>
                <div class="row justify-content-end" style="padding-left:200px; color: #ffffff;">
                    <a href="/users/list" class="btn btn-primary"  style="margin-top: 25px">Prosseguir</a>
                </div>
            </div>
        </div>


        <div class="row justify-content-start" style="padding-top:10px; margin-left: 5%; background-color: #181818; padding-right: 40px; padding-bottom: 25px; border-radius: 10px; margin-top: 80px">
            <div class="col" style="padding-top:10px;">
                <i class="bi bi-person-lines-fill" style="font-size: 90px; color: #ffffff;"></i>
            </div>
            <div class="col" style="padding-top:10px;">
                <div class="row justify-content-left" style="padding-top:10px; color: #ffffff;  font-size: 35px">
                    <label>Logs de usuario</label>
                </div>
                <div class="row justify-content-left" style="padding-top:10px; color: #ffffff;">
                    <label>Historico de consultas dos usuarios</label>
                </div>
                <div class="row justify-content-end" style="padding-left:200px; color: #ffffff;">
                    <a href="/logs/list" class="btn btn-primary"  style="margin-top: 25px">Prosseguir</a>
                </div>
            </div>
        </div>
    @endif
@endsection
