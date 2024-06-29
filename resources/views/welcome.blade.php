@extends('layouts.main')
@section('title', 'sisedu-grupo4')
@section('content')
<main class="min-h-[80vh] flex justify-center items-center flex-col bg-contain bg-center" style="background-image: url('{{asset('images/mao-desenhada-de-volta-ao-fundo-da-escola_23-2149050322.jpg' )}}');">
    <div class="mx-auto my-3 overflow-hidden shadow-[0px_0px_5px_3px_rgba(0,0,0,0.3)] rounded-lg">
        <div class="bg-white text-center w-full max-w-md py-3">
            <h1 class="text-2xl mb-0 font-bold text-[#0071c0]">Grupo 4</h1>
            <h3 class="text-xl mb-0 font-bold text-[#0071c0]">Alunos:</h3>
        </div>
        <ul class="list-disc list-inside bg-white p-6 pt-3 space-y-2 w-full max-w-md">
            <li class="text-gray-700 font-bold">Arthur Servidor Calchi</li>
            <li class="text-gray-700 font-bold">Cassia Helena Voltolin</li>
            <li class="text-gray-700 font-bold">Davi Monteiro</li>
            <li class="text-gray-700 font-bold">Gabriel Costal Fogo</li>
            <li class="text-gray-700 font-bold">Giovana Mori</li>
            <li class="text-gray-700 font-bold">Pedro Lucas dos Santos Hernandes</li>
            <li class="text-gray-700 font-bold">Rafael Paschoalotti</li>
        </ul>
    </div>
</main>
@endsection