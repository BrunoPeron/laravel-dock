<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Fonte do Google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- CSS da aplicação -->
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="collapse navbar-collapse" id="navbar">
            <a href="/" class="navbar-brand">
                <img src="/img/ixc.png" alt="Ixc soft">
            </a>
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <a href="/encdec" class="nav-link">Decriptografar</a>
                    </li>

                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout"
                               class="nav-link"
                               onclick="event.preventDefault();
                    this.closest('form').submit();">
                                Sair
                            </a>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Entrar</a>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
<main>
    <div class="container-fluid">
        <div class="row">
            @if(session('msg-alert'))
                <p class="msg">{{session('msg-alert')}}</p>
            @endif
            @if(session('msg-sucess'))
                <p class="msg">{{session('msg-sucess')}}</p>
            @endif
            @yield('content')
        </div>
    </div>
</main>
<footer>
    <p>IXC Soft &copy; 2021</p>
</footer>
<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>
</html>
