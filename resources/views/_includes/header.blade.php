<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>
    <header>
        <nav
            @if (Route::currentRouteName() == 'site.home') {{-- Se estiver nessa rota, muda a classe --}}
        class="navbar navbar-expand-lg bg-glass bg-opacity-10 navbar-dark fixed-top" 
        @else 
         class="navbar navbar-expand-lg bg-black navbar-dark
        " @endif>
            <div class="container-fluid"> 
                <a class="navbar-brand" href="/">GualbertoEventos</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav ">

                        @auth
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('site.adicionar') }}">Adicionar
                                    Eventos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('meusEventos.evento') }} ">Meus eventos</a>
                            </li>
                        @endauth
                        @guest
                            <a href="/login" class="btn btn-outline-light  h-25 me-2">Fazer login</a>
                            <a href="/register" class="btn btn-new-color  h-25 me-2">Registre-se</a>
                        @endguest

                        <li class="nav-item">
                            @auth
                                <form action="/logout" method="POST">
                                    @csrf
                                    <a href="/logout" class=" btn btn-nc h-auto me-2" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                                </form>
                            @endauth
                            
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

    </header>
