<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.tailwindcss.com"></script>

    <title>@yield('title')</title>
</head>
<body class="bg-gray-100">

<header class="w-full bg-gray-800 p-4 text-white flex justify-between items-center shadow-md">

    <div class="flex items-center">
        <h3 class="text-xl font-bold">Organizador de Tarefas</h3>
        <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    </div>

    <div class="flex items-center">
        @guest
            <a href="{{ route('login') }}" class="py-2 px-3 bg-gray-600 hover:bg-gray-700 rounded-md text-sm font-medium me-2">Login</a>
            <a href="{{ route('register') }}" class="py-2 px-3 bg-white text-gray-800 hover:bg-gray-200 rounded-md text-sm font-medium">Registrar</a>
        @else
            <span class="text-gray-300 me-3">Olá, {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <a href="{{ route('logout') }}"
                   class="py-2 px-3 bg-gray-600 hover:bg-gray-700 rounded-md text-sm font-medium"
                   onclick="event.preventDefault(); this.closest('form').submit();">
                    Sair
                </a>
            </form>
        @endauth
    </div>
</header>

<main>
    @if (session('success'))
        <div class="max-w-5xl mx-auto mt-6 px-6">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @yield('content')
</main>

<footer class="w-full bg-gray-800 p-4 text-center text-white fixed bottom-0">
    <p>Desenvolvido por Sarah Lima</p>
</footer>

</body>
</html>
