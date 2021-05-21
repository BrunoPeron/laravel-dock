{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        @if (session('status'))--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ session('status') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form method="POST" action="{{ route('login') }}" style="background-color: #181818; color: #ffffff">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />--}}
{{--            </div>--}}

{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="flex items-center">--}}
{{--                    <x-jet-checkbox id="remember_me" name="remember" />--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-jet-button class="btn btn-primary">--}}
{{--                    {{ __('Log in') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}


@extends('layouts.main')

@section('title', 'Criar usuario')

@section('content')
    <div class="row">
        <div class="row justify-content-center" style="padding-top:10px; margin-left: 25%; background-color: #181818; padding-right: 40px; padding-bottom: 25px; border-radius: 10px; margin-top: 100px; width: 890px">
            <div class="row justify-content-center" style="padding-top:10px; margin-right: 20px; margin-left: 20px">
{{--                <i class="bi bi-key-fill" style="font-size: 90px; color: #ffffff;"></i>--}}
                <img src="/img/ixc.png" alt="Ixc soft" width="25%">
            </div>
            <div class="col" style="padding-top:10px;">
                <div class="row justify-content-left" style="padding-top:10px; color: #ffffff; font-size: 35px">
                    <label>Login de usuario</label>
                </div>
                <form method="POST" action="{{ route('login') }}" style="background-color: #181818; color: #ffffff">
                    <div class="row justify-content-left" style="padding-top:10px; color: #b3b3b3; font-size: 35px">
                        <label>Email</label>
                            <input class="form-control" id="email" name="email" type="email" placeholder="" >
                        </div>
                        <div class="row justify-content-left" style="padding-top:10px; color: #b3b3b3; font-size: 35px">
                            <label>Senha</label>
                            <input class="form-control" id="password"  name="password" type="password" placeholder="" >
                        </div>
                        <div class="row justify-content-end" style="padding-left:200px; color: #b3b3b3; margin-top: 40px">
                            <input type="submit" class="btn btn-primary" value="Confirmar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
