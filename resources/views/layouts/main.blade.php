<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>@yield('title')</title>
    <!-- Fonte do Google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <!-- CSS Bootstrap -->
    <!-- CSS da aplicação -->
    <link rel="stylesheet" href="/css/styles.css">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body style="background-color: #121212">
<header style="background-color:#000000; border-bottom-color: #272727">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#000000; ">
        <div class="collapse navbar-collapse" id="navbar" style="background-color:#000000;">
            <a href="/" class="navbar-brand">
                <img src="/img/ixc.png" alt="Ixc soft">
            </a>
            <ul class="navbar-nav">
                @auth
                    <div class="ml-3 relative" >
                        <x-jet-dropdown align="right" width="48" style="background-color: #282828; color: #eaeaea">
                            <x-slot name="trigger">
                                <div style="padding-left: 20px; padding-right: 20px; background-color: #282828; border-radius: 15px; padding-top: 5px; padding-bottom: 5px; margin-top: 2px">
                                    <span style="background-color: #282828; color: #eaeaea; ">
                                        <button type="button" style="background-color: #282828; color: #eaeaea;">
                                            {{ Auth::user()->name }}
                                        </button>
                                    </span>
                                </div>
                            </x-slot>
                            <x-slot name="content">
                                <div style="background-color: #1b5e20">
                                    <div class="block px-4 py-2 text-xs text-gray-400" style="background-color: #282828; color: #eaeaea; border-color: #272727">
                                        {{ __('Manage Account') }}
                                    </div>
                                    <x-jet-dropdown-link href="{{ route('profile.show') }}" style="background-color: #282828; color: #eaeaea; border-color: #272727">
                                        {{ __('Profile') }}
                                    </x-jet-dropdown-link>
                                    {{--                                <div class="border-t border-gray-100" style="border-bottom-color: #272727"></div>--}}
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                             onclick="event.preventDefault();
                                                this.closest('form').submit();" style="background-color: #282828; color: #eaeaea; border-color: #272727">
                                            {{ __('Log Out') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    {{--                    #fff--}}
                @endauth
                @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link" style="color: #b5b5b5">Entrar</a>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
<main>
    <div class="container-fluid">
        <div class="row">
            {{--            @if(session('msg-alert'))--}}
            {{--                <p class="msg">{{session('msg-alert')}}</p>--}}
            {{--                <div class="mb-2 font-medium text-sm text-green-600">--}}
            {{--                    {{ session('msg-alert') }}--}}
            {{--                </div>--}}
            {{--            @endif--}}
            {{--            @if(session('msg-sucess'))--}}
            {{--                <p class="msg">{{session('msg-sucess')}}</p>--}}
            {{--            @endif--}}
            @yield('content')
        </div>
    </div>
</main>
<footer style="background-color: #000000;">
    <p style="color: #ffffff">IXCSoft &copy; 2021</p>
</footer>
</body>
</html>
