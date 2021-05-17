@extends('layouts.main')

@section('title', 'Ixcsoft')

@section('content')
    @if($cargo == 'admin')
    <div class="row" style="margin-left: auto; margin-right: auto; width: 75%">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Log dos usuarios do sistema</h4>
                    <form action="/logs/list/search" method="GET" enctype="multipart/form-data">
                    <div class="input-group no-border" style="width: 50%;">
                        <input type="text" value="" class="form-control" placeholder="Search..." style=" border-radius: 10px" name="text">
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <ion-icon name="search"></ion-icon>
                            <div class="ripple-container"></div>
                        </button>
                    </div>
                    <div style="margin-top: 10px">
                        <label for="title">Consultar por ...</label>
                        <div>
                            <input type="radio"  name="type" value="users.name" checked> Usuario
                            <input type="radio"  name="type" value="logs.data_consulta"> Data
                            <input type="radio"  name="type" value="logs.string_request"> Senha decriptografada
                            <input type="radio"  name="type" value="users.email"> Email
                            {{--            a senha sera criptografada no banco por md5                --}}
                        </div>
                    </div>
                        <a href="/logs/list" class="nav-link" style="color: black">Limpar consulta</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Senha decriptografada
                                    </th>
                                    <th>
                                        Data da consulta
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($logs as $log)
                            <tr>
                                <td>
                                    {{$log->id}}
                                </td>
                                <td>
                                    {{$log->name}}
                                </td>
                                <td>
                                    {{$log->email}}
                                </td>
                                <td>
                                    {{$log->string_request}}
                                </td>
                                <td>
                                    {{$log->data_consulta}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </form>
        {{$logs->links()}}
    </div>
    @endif
@endsection
