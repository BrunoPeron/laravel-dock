@extends('layouts.main')

@section('title', 'hdc')

@section('content')
    @if($cargo == 'admin')
        <div class="container px-5 text-center">
            <div class="row" style="background-color: #181818; padding: 35px; border-radius: 15px; margin-top: 100px">
                <div class="col-md-12">
                    <div class="row justify-content-left" style="padding-top:10px; color: #ffffff; font-size: 35px; padding-bottom: 20px">
                        <label>Gerenciar usuarios do sistema</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table" style="border-radius: 15px;">
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

                            </th>
                            <th>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    {{$user->id}}
                                </td>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    <button type="button" rel="tooltip" title="" data-original-title="Edit Task" >
                                        <a class="btn btn-primary" href="/users/edit/{{ $user->id }}"><i class="bi bi-pencil-square"></i> Editar</a>
                                    </button>
                                </td>
                                <td>
                                    <form action="/users/delete/{{ $user->id }}" method="POST" style="width: 100px;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary"><i class="bi bi-trash-fill"></i> Deletar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            {{ $users->links() }}
                        </div>
                        <div class="row justify-content-end">
                            <a href="/users/create" class="btn btn-primary">Criar um usuario</a>
                        </div>
                    </div>
                <p1>{{$status ?? ''}}</p1>
            </div>
        </div>
    @endif


@endsection
