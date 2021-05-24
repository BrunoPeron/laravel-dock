@extends('layouts.main')

@section('title', 'Ixcsoft')

@section('content')
    @if(Auth::user()->cargo == 'admin')
    <div class="row" style="margin-left: auto; margin-right: auto; width: 75%; color: #ffffff; margin-top: 8%">
        <div class="col-md-12" >
            <div class="card" style="background-color: #181818; border-radius: 15px; color: #ffffff;">
                <div class="card-header card-header-primary" >
                    <h4 class="card-title" style="color: #ffffff;">Log dos usuarios do sistema</h4>
                    <form action="/logs/list/search" method="GET" enctype="multipart/form-data">
                    <div class="input-group no-border" style="width: 50%;">
                        <input type="text" value="" class="form-control" placeholder="Search..." style="border-radius: 10px" name="text">
                        <button type="submit" class="btn btn-primary" style="width: 42px; border-radius: 15px">
                            <i class="bi bi-search" style="color:#ffffff;"></i>
                            <div class="ripple-container">
                            </div>
                        </button>
                    </div>
                    <div style="margin-top: 10px">
                        <label for="title">Consultar por ...</label>
                        <div>
                            <input type="radio"  name="type" value="users.name" {{$checked['users.name']}}> Usuario
                            <input type="radio"  name="type" value="logs.data_consulta" {{$checked['logs.data_consulta']}}> Data
                            <input type="radio"  name="type" value="logs.string_request" {{$checked['logs.string_request']}}> Senha decriptografada
                            <input type="radio"  name="type" value="users.email" {{$checked['users.email']}}> Email
                        </div>
                        <div class="btn btn-primary" style="width: 160px; height: 40px; margin-top: 20px">
                            <a href="/logs/list" style="color: #ffffff">Limpar consulta</a>
                        </div>
                    </div>
                    <div class="card-body"  style="border-radius: 15px">
                        <div class="table-responsive">
                            <table class="table" style="border-radius: 15px">
                                <thead class=" text-primary"  style="border-radius: 15px">
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
                                        {{$log->data_consulta}}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </form>
                <div style="margin-left: 35%">
                    @if(isset($request))
                        {!! $logs->appends($request)->links() !!}
                    @else
                        {!! $logs->links() !!}
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
