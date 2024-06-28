@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
<main class="min-h-[80.9vh] flex flex-col px-5 py-2">
    <h1 class="text-center my-5 text-4xl text-gray-100">Listar Notas</h1>

    <div class="flex items-center bg-gray-700 p-2 mb-2 rounded-sm w-56 gap-1.5">
        <div class="">
            <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
        </div>
        <input type="text" id="table-search" class="bg-gray-700 focus:outline-none text-gray-400" placeholder="Search for items">
    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-400 uppercase bg-gray-700">
            <tr>
                <th scope="col" class="px-6 py-3">RA</th>
                <th scope="col" class="px-6 py-3">Nome</th>
                <th scope="col" class="px-6 py-3">A1</th>
                <th scope="col" class="px-6 py-3">A2</th>
                <th scope="col" class="px-6 py-3">P1</th>
                <th scope="col" class="px-6 py-3">P2</th>
                <th scope="col" class="px-6 py-3">PD</th>
                <th scope="col" class="px-6 py-3">MFA</th>
                <th scope="col" class="px-6 py-3">MFP</th>
                <th scope="col" class="px-6 py-3">Ações</th>
            </tr>
        </thead>
        <tbody>
            <!-- Formulário para cadastrar aluno -->
            <tr class="border-b bg-gray-800 border-gray-700">
                <form class="w-full flex flex-wrap" action="/cadastrar-aluno" method="POST">
                    @csrf
                    <td class="px-6 py-4">
                        <input 
                            type="text"
                            name="ra"
                            class="border border-gray-300 rounded px-2 py-1 w-full"
                            placeholder="RA"
                        >
                    </td>
                    <td class="px-6 py-4">
                        <input 
                            type="text"
                            name="nome"
                            class="border border-gray-300 rounded px-2 py-1 w-full"
                            placeholder="Nome">
                    </td>
                    <td class="px-6 py-4">
                        <input 
                            type="text"
                            name="A1"
                            id="a1"
                            class="border border-gray-300 rounded px-2 py-1 w-full"
                            placeholder="A1"
                        >
                    </td>
                    <td class="px-6 py-4">
                        <input 
                            type="text"
                            name="A2"
                            id="a2"
                            class="border border-gray-300 rounded px-2 py-1 w-full"
                            placeholder="A2"
                        >
                    </td>
                    <td class="px-6 py-4">
                        <input 
                            type="text"
                            name="P1" 
                            id="p1"
                            class="border border-gray-300 rounded px-2 py-1 w-full" 
                            placeholder="P1"
                        >
                    </td>
                    <td class="px-6 py-4">
                        <input 
                            type="text" 
                            name="P2"
                            id="p2"
                            class="border border-gray-300 rounded px-2 py-1 w-full" 
                            placeholder="P2"
                        >
                    </td>
                    <td class="px-6 py-4">
                        <input 
                            type="text"
                            name="PD"
                            id="pd"
                            class="border border-gray-300 rounded px-2 py-1 w-full"
                            placeholder="PD"
                            onchange="calcularDadosAutomatico()"
                        >
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" name="MFA" class="border border-gray-300 rounded px-2 py-1 w-full" placeholder="MFA">
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" name="MFP" class="border border-gray-300 rounded px-2 py-1 w-full" placeholder="MFP">
                    </td>
                    <td class="px-6 py-4 flex">
                        <button type="submit" class="bg-emerald-600 text-white px-3 py-1 cursor-pointer rounded hover:bg-emerald-700">
                            Cadastrar
                        </button>
                    </td>
                </form>
            </tr>
            @foreach ($alunos as $aluno)
                @foreach ($aluno->notas as $nota)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$aluno->ra}}
                    </th>
                    <td class="px-6 py-4">
                        {{$aluno->nome}}
                    </td>
                    <td class="px-6 py-4">
                        {{$nota->A1}}
                    </td>
                    <td class="px-6 py-4">
                        {{$nota->A2}}
                    </td>
                    <td class="px-6 py-4">
                        {{$nota->P1}}
                    </td>
                    <td class="px-6 py-4">
                        {{$nota->P2}}
                    </td>
                    <td class="px-6 py-4">
                        {{$nota->PD}}
                    </td>
                    <td class="px-6 py-4">
                        {{$nota->MFA}}
                    </td>
                    <td class="px-6 py-4">
                        {{$nota->MFP}}
                    </td>
                    <td class="px-6 py-4 flex max-w-[170px]">
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lançar</a>
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Editar</a>
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Remover</a>
                    </td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</main>
@endsection
