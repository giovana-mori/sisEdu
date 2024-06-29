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
                class="text-white px-3 py-1 cursor-pointer rounded hover:border">Login</a>
            <a href="{{ route('registro') }}"
                class="text-white px-3 py-1 cursor-pointer rounded hover:border">Registrar</a>
       @endguest
       @auth
            <form action="/logout" method="post">
                @csrf
                <a  class="text-white px-3 py-1 cursor-pointer rounded hover:border" href="{{route('logout')}}"
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

    function calculaNotasAutomatico() {
    const p1 = parseFloat(document.querySelector('#p1').value) || 0;
    const p2 = parseFloat(document.querySelector('#p2').value) || 0;
    const a1 = parseFloat(document.querySelector('#a1').value) || 0;
    const a2 = parseFloat(document.querySelector('#a2').value) || 0;
    const pd = parseFloat(document.querySelector('#pd').value) || 0;

    const mfa = (p1 + p2 + a1 + a2 + pd) / 5;
    const mfp = ((p1 * 0.15) + (p2 * 0.15) + (a1 * 0.2) + (a2 * 0.2) + (pd * 0.3)) / 5;

    document.querySelector('#mfa').value = mfa.toFixed(2);
    document.querySelector('#mfp').value = mfp.toFixed(2);
}

</script>
</body>
</html>
