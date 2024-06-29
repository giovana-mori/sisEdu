@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
<main class="min-h-[80.9vh] flex flex-col px-5 py-2">
    <h1 class="text-center my-5 text-4xl text-gray-100">Listar Notas</h1>

    {{-- @if (Auth::user()->role === 'professor')
    <div class="flex items-center bg-gray-700 p-3 mb-2 rounded-md w-56 gap-1.5">
        <div>
            <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
        </div>
        <input type="text" id="table-search" class="bg-gray-700 focus:outline-none text-gray-400 rounded-md" placeholder="Search for items">
    </div>
    @endif --}}

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-md overflow-hidden">
        <thead class="text-xs text-gray-400 uppercase bg-gray-700">
            <tr>
                <th scope="col" class="p-3">RA</th>
                <th scope="col" class="p-3"></th>
                <th scope="col" class="p-3">A1</th>
                <th scope="col" class="p-3">A2</th>
                <th scope="col" class="p-3">P1</th>
                <th scope="col" class="p-3">P2</th>
                <th scope="col" class="p-3">PD</th>
                <th scope="col" class="p-3">MFA</th>
                <th scope="col" class="p-3">MFP</th>
                @if (Auth::user()->role === 'professor')
                <th scope="col" class="p-3">Ações</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @if (Auth::user()->role === 'professor')
            <tr class="border-b bg-gray-800 border-gray-700">
                <form class="w-full flex flex-wrap" action="{{ route('notas.store') }}" method="POST">
                    @csrf
                    <td class="p-3">
                        <select class="border border-gray-300 rounded-md px-2 py-1 w-full" name="ra">
                            @foreach ($alunos as $aluno)
                            <option value="{{ $aluno->ra }}">{{ $aluno->ra }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="p-3">
                        <!-- <input type="text" name="nome" class="border border-gray-300 rounded-md px-2 py-1 w-full" placeholder="Nome"> -->
                    </td>
                    <td class="p-3">
                        <input type="number" name="A1" id="a1" class="border border-gray-300 rounded-md px-2 py-1 w-full" placeholder="A1">
                    </td>
                    <td class="p-3">
                        <input type="number" name="A2" id="a2" class="border border-gray-300 rounded-md px-2 py-1 w-full" placeholder="A2">
                    </td>
                    <td class="p-3">
                        <input type="number" name="P1" id="p1" class="border border-gray-300 rounded-md px-2 py-1 w-full" placeholder="P1">
                    </td>
                    <td class="p-3">
                        <input type="number" name="P2" id="p2" class="border border-gray-300 rounded-md px-2 py-1 w-full" placeholder="P2">
                    </td>
                    <td class="p-3">
                        <input type="number" name="PD" id="pd" class="border border-gray-300 rounded-md px-2 py-1 w-full" placeholder="PD" onchange="calcularDadosAutomatico()">
                    </td>
                    <td class="p-3">
                        <input type="texxt" readonly name="MFA" id="mfa" class="border border-gray-300 rounded-md px-2 py-1 w-full" placeholder="MFA">
                    </td>
                    <td class="p-3">
                        <input type="text" readonly name="MFP" id="mfp" class="border border-gray-300 rounded-md px-2 py-1 w-full" placeholder="MFP">
                    </td>
                    <td class="p-3 flex">
                        <button type="submit" class="bg-emerald-600 font-medium text-white px-3 py-1 cursor-pointer rounded-md hover:bg-emerald-700">Cadastrar</button>
                    </td>
                </form>
            </tr>
            @endif
            @foreach ($alunos as $aluno)
            @foreach ($aluno->notas as $nota)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="p-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$aluno->ra}}
                </th>
                <td class="p-3">
                    {{$aluno->user->nome}}
                </td>
                <td class="p-3">
                    {{$nota->A1}}
                </td>
                <td class="p-3">
                    {{$nota->A2}}
                </td>
                <td class="p-3">
                    {{$nota->P1}}
                </td>
                <td class="p-3">
                    {{$nota->P2}}
                </td>
                <td class="p-3">
                    {{$nota->PD}}
                </td>
                <td class="p-3">
                    {{$nota->MFA}}
                </td>
                <td class="p-3">
                    {{$nota->MFP}}
                </td>
                @if (Auth::user()->role === 'professor')
                <td class="p-3 flex max-w-[170px]">
                    <a href="#" class="bg-blue-600 font-medium text-white px-3 py-1 cursor-pointer rounded-md hover:bg-blue-700">Editar</a>
                    <a href="#" class="bg-red-600 font-medium text-white px-3 py-1 cursor-pointer rounded-md hover:bg-red-700 ms-1">Deletar</a>
                </td>
                @endif
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
</main>

<script>
    function calcularDadosAutomatico() {
        const a1 = parseFloat(document.getElementById('a1').value);
        const a2 = parseFloat(document.getElementById('a2').value);
        const p1 = parseFloat(document.getElementById('p1').value);
        const p2 = parseFloat(document.getElementById('p2').value);
        const pd = parseFloat(document.getElementById('pd').value);

        if (!isNaN(a1) && !isNaN(a2) && !isNaN(p1) && !isNaN(p2) && !isNaN(pd)) {
            const mfa = (a1 + a2 + p1 + p2 + pd) / 5;
            const mfp = (a1 * 0.15 + a2 * 0.15 + p1 * 0.02 + p2 * 0.02 + pd * 0.03) / 5;

            document.getElementById('mfa').value = mfa.toFixed(2);
            document.getElementById('mfp').value = mfp.toFixed(2);
        }
    }
    // const myHeaders = new Headers();
    // const formdata = new FormData();
    // formdata.append("id_pessoa", "2");
    // formdata.append("assunto", "TESTE");
    // formdata.append("descricao", "TESTANDO");

    // const requestOptions = {
    //     method: "GET",
    //     headers: myHeaders,
    //     body: formdata,
    //     redirect: "follow"
    // };

    // fetch("http://127.0.0.1:8000/api/alunos", requestOptions)
    //     .then((response) => response.text())
    //     .then((result) => console.log(result))
    //     .catch((error) => console.error(error));
</script>
@endsection