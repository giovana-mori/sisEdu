@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
<main class="min-h-[80.9vh] flex flex-col items-center px-5 py-2">
    <h1 class="text-center my-5 text-4xl text-gray-100">
        {{ auth()->user()->role == 'professor' ? 'Editar Aluno' : 'Editar Perfil'}}
    </h1>

    <form class="w-full mx-auto max-w-sm md:max-w-xl bg-gray-700 p-6 rounded-lg shadow-lg mb-" action="{{ auth()->user()->role == 'professor' ? route('aluno.update', $aluno->id) : route('perfil.update', $aluno->id) }}}" method="POST">
        @csrf
        <div class="mb-4 md:flex md:space-x-4">
            <div class="md:w-1/2">
                <label for="ra" class="block text-white text-sm font-bold mb-2">RA</label>
                <input type="text" required id="ra" name="ra" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="RA" value="{{ old('ra') ?? $aluno->ra }}">
                @if ($errors->has('ra'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('ra') }}</p>
                @endif
            </div>
            <div class="md:w-1/2">
                <label for="nome" class="block text-white text-sm font-bold mb-2">Nome</label>
                <input type="nome" required id="nome" name="nome" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nome" value="{{ old('nome') ?? $aluno->user->nome }}">
                @if ($errors->has('nome'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('nome') }}</p>
                @endif
            </div>
        </div>
        <div class="mb-4 md:flex md:space-x-4">
            <div class="md:w-1/2">
                <label for="telefone" class="block text-white text-sm font-bold mb-2">Telefone</label>
                <input type="text" required id="telefone" name="telefone" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Telefone" value="{{ old('telefone') ?? $aluno->user->telefone }}">
                @if ($errors->has('telefone'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('telefone') }}</p>
                @endif
            </div>
            <div class="md:w-1/2">
                <label for="cep" class="block text-white text-sm font-bold mb-2">CEP</label>
                <input type="text" required id="cep" name="cep" oninput="keyCEP(this)" maxlength="9" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="CEP" value="{{ old('cep') ?? $aluno->cep }}">
                @if ($errors->has('cep'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('cep') }}</p>
                @endif
            </div>
        </div>
        <div class="mb-4 md:flex md:space-x-4">
            <div class="md:w-1/2">
                <label for="endereco" class="block text-white text-sm font-bold mb-2">Endereço</label>
                <input type="text" required id="endereco" readonly name="endereco" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Endereço" value="{{ old('endereco') ?? $aluno->endereco }}">
                @if ($errors->has('endereco'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('endereco') }}</p>
                @endif
            </div>
            <div class="md:w-1/2">
                <label for="bairro" class="block text-white text-sm font-bold mb-2">Bairro</label>
                <input type="text" required id="bairro" readonly name="bairro" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Bairro" value="{{ old('bairro') ?? $aluno->bairro }}">
                @if ($errors->has('bairro'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('bairro')  }}</p>
                @endif
            </div>
        </div>
        <div class="mb-4 md:flex md:space-x-4">
            <div class="md:w-1/2">
                <label for="numero" class="block text-white text-sm font-bold mb-2">Número</label>
                <input type="text" required id="numero" name="numero" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Número" value="{{ old('numero') ?? $aluno->numero }}">
                @if ($errors->has('numero'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('numero') }}</p>
                @endif
            </div>
            <div class="md:w-1/2">
                <label for="complemento" class="block text-white text-sm font-bold mb-2">Complemento</label>
                <input type="text" id="complemento" name="complemento" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Complemento" value="{{ old('complemento') ?? $aluno->complemento }}">
                @if ($errors->has('complemento'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('complemento') }}</p>
                @endif
            </div>
        </div>
        <div class="mb-4 md:flex md:space-x-4">
            <div class="md:w-1/2">
                <label for="cidade" class="block text-white text-sm font-bold mb-2">Cidade</label>
                <input type="text" required id="cidade" readonly name="cidade" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Cidade" value="{{ old('cidade') ?? $aluno->cidade }}">
                @if ($errors->has('cidade'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('cidade') }}</p>
                @endif
            </div>
            <div class="md:w-1/2">
                <label for="uf" class="block text-white text-sm font-bold mb-2">UF</label>
                <input type="text" required id="uf" readonly name="uf" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="UF" value="{{ old('uf') ?? $aluno->uf }}">
                @if ($errors->has('uf'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('uf') }}</p>
                @endif
            </div>
        </div>

        <div class="flex items-center justify-between gap-5">
            <a href="{{ auth()->user()->role == 'professor' ? route('aluno.index') : route('minhasnotas')}}" class="bg-gray-500 text-center hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Voltar</a>
            <button type="submit" class="flex-1 text-center bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Atualizar dados
            </button>
        </div>
    </form>
</main>

<script>
    async function consultarCEP(cep) {
        const cepLimpo = cep.replace(/\D/g, ''); // Remove caracteres não numéricos

        if (cepLimpo.length !== 8) {
            throw new Error('CEP inválido. O CEP deve conter 8 dígitos.');
        }

        const url = `https://viacep.com.br/ws/${cepLimpo}/json/`;

        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error('Erro ao consultar o CEP.');
            }

            const dados = await response.json();

            if (dados.erro) {
                throw new Error('CEP não encontrado.');
            }

            return dados;
        } catch (error) {
            console.error('Erro:', error);
            throw error;
        }
    }

    function keyCEP(e) {
        const cep = e.value.replace(/\D/g, '');

        if (cep.length >= 8) {
            e.value = cep.replace(/^(\d{5})(\d)/, '$1-$2');
            consultarCEP(cep)
                .then(dados => {
                    document.querySelector('#endereco').value = dados.logradouro;
                    document.querySelector('#bairro').value = dados.bairro;
                    document.querySelector('#cidade').value = dados.localidade;
                    document.querySelector('#uf').value = dados.uf;
                })
                .catch(error => console.error('Erro:', error));
        }

    }
</script>
@endsection