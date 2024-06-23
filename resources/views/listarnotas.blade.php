@extends('layouts.main')
@section('title', 'dashboard')
@section('content')
<main class="min-h-[80vh] flex flex-col bg-gray-100  dark:bg-gray-900 p-2">
    <h1 class="text-center my-5">Listar Notas</h1>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
        <div class="pb-4 bg-white dark:bg-gray-900">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        RA
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        A1
                    </th>
                    <th scope="col" class="px-6 py-3">
                        A2
                    </th>
                    <th scope="col" class="px-6 py-3">
                        P1
                    </th>
                    <th scope="col" class="px-6 py-3">
                        P2
                    </th>
                    <th scope="col" class="px-6 py-3">
                        PD
                    </th>
                    <th scope="col" class="px-6 py-3">
                        MFA
                    </th>
                    <th scope="col" class="px-6 py-3">
                        MFP
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alunos as $aluno)
                @foreach ($aluno->notas as $nota)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$aluno->ra}}
                    </th>
                    <td class="px-6 py-4">
                        {{$aluno->ra}}
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
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Lançar </a>
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Editar </a>
                        <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> Remover </a>
                    </td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>


</main>
@endsection