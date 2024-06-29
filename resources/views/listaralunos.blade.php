@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
<main class="min-h-[80.9vh] flex flex-col px-5 py-2">
    <h1 class="text-center my-5 text-4xl text-gray-100">Listar Alunos</h1>

    @if (count($alunos) === 0)
    <p class="text-center text-2xl text-gray-100">Nenhum aluno encontrado</p>
    @else
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-md overflow-hidden">
        <thead class="text-xs text-gray-400 uppercase bg-gray-700">
            <tr>
                <th scope="col" class="p-3">RA</th>
                <th scope="col" class="p-3">Nome</th>
                <th scope="col" class="p-3">E-mail</th>
                <th scope="col" class="p-3">Telefone</th>
                @if (Auth::user()->role === 'professor')
                <th scope="col" class="p-3">Ações</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="p-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$aluno->ra}}
                </th>
                <td class="p-3">
                    {{$aluno->user->nome}}
                </td>
                <td class="p-3">
                    {{$aluno->user->email}}
                </td>
                <td class="p-3">
                    {{$aluno->user->telefone}}
                </td>
                @if (Auth::user()->role === 'professor')
                <td class="p-3 flex max-w-[170px]">
                    <a href="/alunos/editar/{{$aluno->id}}" class="bg-blue-600 font-medium text-white px-3 py-1 cursor-pointer rounded-md hover:bg-blue-700">Editar</a>
                    <button type="button" onclick="deletarAluno('{{$aluno->id}}')" class="bg-red-600 font-medium text-white px-3 py-1 cursor-pointer rounded-md hover:bg-red-700 ms-1">Deletar</button>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</main>

<script>
    function deletarAluno(id = undefined) {
        if (!id || id == undefined) {
            return;
        }

        let desejaDeletar = confirm("Tem certeza que deseja deletar este aluno?");
        if (desejaDeletar) {
            const myHeaders = new Headers();
            const requestOptions = {
                method: "DELETE",
                headers: myHeaders,
                redirect: "follow"
            };

            fetch(`/api/alunos/${id}`, requestOptions)
                .then((response) => response.json())
                .then((result) => {
                    console.log(result)
                    alert(result.success);
                    window.location.reload();
                })
                .catch((error) => console.error(error));
            fetch("/api/alunos", requestOptions);
        }
    }
</script>
@endsection