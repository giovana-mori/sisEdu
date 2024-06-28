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
        ::-webkit-scrollbar {
      width: 12px; /* Largura da barra de rolagem */
    }

    /* Estiliza o fundo da barra de rolagem */
    ::-webkit-scrollbar-track {
      background: #111827; /* Cor do fundo da track */
    }

    /* Estiliza o thumb da barra de rolagem */
    ::-webkit-scrollbar-thumb {
      background-color: #111827; /* Cor do thumb */
      border-radius: 10px; /* Bordas arredondadas */
      border: 3px solid #f1f1f1; /* Espaço ao redor do thumb */
    }

    </style>
    
</head>
<body class="min-h-screen flex flex-col bg-gray-900">
<header class="flex justify-between p-6 bg-gray-700 shadow-md items-center top-0 z-10">
    <a href="/" class="uppercase text-3xl font-bold text-gray-100">sisedu</a>
    <nav>
       @guest
            <a href="{{ route('login') }}"
            class="bg-emerald-600 text-white px-3 py-1 cursor-pointer rounded hover:bg-emerald-700">Login</a>
            <a href="{{ route('registro') }}"
            class="px-3 py-1 bg-emerald-600 text-white rounded hover:bg-emerald-700 cursor-pointer ml-2">Registrar</a>
       @endguest
       @auth
            <form action="/logout" method="post">
                @csrf
                <a  class="bg-emerald-600 text-white px-3 py-1 cursor-pointer rounded hover:bg-emerald-700" href="{{route('logout')}}"
                onclick="event.preventDefault();this.closest('form').submit()">Sair</a>
            </form>
       @endauth
    </nav>
</header>
@if(session('msg'))
    <div class="w-full bg-emerald-200 text-emerald-700 p-3 flex justify-between items-center" id="msg-success">
        <div>
            {{ session('msg') }}
        </div>
        <div class="flex ps-[300px]">
            <button onclick="closeBox('msg-success')">X</button>
        </div>
    </div>
@endif
@yield('content')
<footer class="bg-gray-700 shadow-md p-5 text-center text-gray-100">
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
