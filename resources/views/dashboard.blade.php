@extends('layouts.main')

@section('title', 'Ixcsoft')

@section('content')
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                <h1>Decriptografia </h1>
                <a href="/encdec"> encdec</a>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                <h1>Decriptografia elastic search</h1>
                <a href="/encdec_elastic"> encdec</a>
            </div>
        </div>
    </div>
    @if($cargo == 'admin' && !empty($cargo))
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                    <h1>Gerenciar usuario</h1>
                    <a href="/users/list"> encdec</a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                    <h1>Logs de usuario</h1>
                    <a href="/logs/list"> encdec</a>
                </div>
            </div>
        </div>
    @endif
@endsection
