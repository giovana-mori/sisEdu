<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <style>
        @keyframes subir {
            from{
                margin-top:0;

            }to{
                 margin-top: -50px;
             }
        }

        .subir{
            animation: 1s subir forwards;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-gray-900">
<header class="flex justify-between p-6 bg-white shadow-md items-center top-0 z-10">
    <a href="/" class="uppercase text-3xl font-bold text-blue-500">sisedu</a>
    <nav>
       @guest
            <a href="{{ route('login') }}"
            class="bg-blue-500 text-white px-3 py-1 cursor-pointer rounded hover:bg-blue-700">Login</a>
            <a href="{{ route('registro') }}"
            class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-700 cursor-pointer ml-2">Registrar</a>
       @endguest
       @auth
            <form action="/logout" method="post">
                @csrf
                <a  class="bg-blue-500 text-white px-3 py-1 cursor-pointer rounded hover:bg-blue-700" href="{{route('logout')}}"
                onclick="event.preventDefault();this.closest('form').submit()">Sair</a>
            </form>
       @endauth
    </nav>
</header>
@if(session('msg'))
    <div class="w-full bg-green-200 text-green-500 p-3 flex justify-between items-center" id="msg-success">
        <div>
            {{ session('msg') }}
        </div>
        <div class="flex ps-[300px]">
            <button onclick="closeBox('msg-success')">X</button>
        </div>
    </div>
@endif
@yield('content')
<footer class="bg-white shadow-md p-5 text-center">
    &copy; Todos os direitos reservados 2024. Equipe: Nome da Equipe. Faculdade de Tecnologia de Jahu
</footer>
<script>
    function closeBox(id) {
        let box = document.querySelector('#'+id);
        box.classList.add('subir');
    }
</script>
</body>
</html>
