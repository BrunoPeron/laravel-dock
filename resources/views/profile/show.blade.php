@extends('layouts.main')

@section('title', 'Criar usuario')

@section('content')
        <div class="row justify-content-center" style="background-color: #181818; border-radius: 15px; color: #ffffff">
            <div class="row justify-content-center" style="padding-top:10px; color: #ffffff; font-size: 35px; padding-bottom: 20px">
                <label>{{Auth::user()->cargo}}</label>
            </div>
        </div>
        <div class="row justify-content-center" style="background-color: #181818; border-radius: 15px; color: #ffffff">
            <div class="row justify-content-md-center" style="padding-top:10px; color: #ffffff; font-size: 35px; padding-bottom: 20px">
                <label>Gerenciar usuarios do sistema</label>
            </div>
        </div>

@endsection
