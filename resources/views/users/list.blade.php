@extends('layouts.main')

@section('title', 'hdc')

@section('content')
    @if($cargo == 'admin')
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="profile">
                    <table class="table">
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                {{--                        <td>--}}
                                {{--                        </td>--}}
                                <td>{{$user->name}}</td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task" >
                                        <a class="material-icons" href="/users/edit/{{ $user->id }}"><ion-icon name="create-outline"></ion-icon>edit</a>
                                    </button>
                                    <form action="/users/delete/{{ $user->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <a href="/users/create">Criar um usuario</a>
                    <p1>{{$status ?? ''}}</p1>
                </div>
            </div>
        </div>
    @endif

@endsection
