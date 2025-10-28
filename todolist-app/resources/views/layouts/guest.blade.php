<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Autenticação')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-md-6 col-lg-5">

                <header class="bg-dark p-3 ps-4 text-white d-flex align-items-center rounded-top">
                    <h3 class="mb-0 h5">Organizador de Tarefas</h3>
                    <i class="bi bi-check2-circle ms-2 fs-4"></i>

                    <div class="d-flex align-items-center ms-auto">
                        @guest
                            @if (Request::routeIs('register'))
                                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Entrar</a>
                            @else

                                <a href="{{ route('register') }}" class="btn btn-light btn-sm">Registrar</a>
                            @endif
                        @else
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm"
                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                    Sair
                                </a>
                            </form>
                        @endauth
                    </div>
                    </header>

                <div class="card shadow-sm rounded-bottom">
                    <div class="card-body p-4">
                        {{ $slot }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
