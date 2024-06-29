@extends('layouts.main')
@section('title', 'Registro')
@section('content')
<main class="min-h-[80.9vh] flex justify-center items-center flex-col ">
    <h1 class="text-4xl my-6 text-white">Registro</h1>
    <form class="w-full max-w-sm md:max-w-xl bg-gray-700 p-6 rounded-lg my-6 shadow-lg mb-" action="{{ route('registro.post') }}" method="POST">
        @csrf

        <div class="mb-4 md:flex md:space-x-4">
            <div class="md:w-1/2">
                <label for="nome" class="nomeblock text-white text-sm font-bold mb-2">Nome</label>
                <input type="text" required id="nome" name="name" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nome" value="{{ old('name') }}">
                @if ($errors->has('name'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="md:w-1/2">
                <label for="email" class="nomeblock text-white text-sm font-bold mb-2">Email</label>
                <input type="email" required id="email" name="email" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('email') }}</p>
                @endif
            </div>
        </div>
        <div class="mb-4 md:flex md:space-x-4">
            <div class="md:w-1/2">
                <label for="senha" class="nomeblock text-white text-sm font-bold mb-2">Senha</label>
                <input type="password" required id="senha" name="password" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Senha">
                @if ($errors->has('password'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="md:w-1/2">
                <label for="confirma-senha" class="nomeblock text-white text-sm font-bold mb-2">Confirmar senha</label>
                <input type="password" required id="confirma-senha" name="password_confirmation" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Confirme a senha">
                @if ($errors->has('password_confirmation'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('password_confirmation') }}</p>
                @endif
            </div>
        </div>
        <div class="mb-4 md:flex md:space-x-4">
            <div class="w-full">
                <label for="telefone" class="nomeblock text-white text-sm font-bold mb-2">Telefone</label>
                <input type="text" required id="telefone" name="telefone" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Telefone" value="{{ old('telefone') }}">
                @if ($errors->has('telefone'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('telefone') }}</p>
                @endif
            </div>
        </div>
        <div class="mb-4">
            <label for="tipo-usuario" class="nomeblock text-white text-sm font-bold mb-2">Tipo de Usuário</label>
            <select id="tipo-usuario" required name="role" class="border rounded w-full py-1 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="carregaFormularioEspecifico()">
                <option value="#" class="text-gray-700">--selecione uma opção--</option>
                <option value="aluno" class="text-gray-700" {{ old('role') == 'aluno' ? 'selected' : '' }}>Aluno</option>
                <option value="professor" class="text-gray-700" {{ old('role') == 'professor' ? 'selected' : '' }}>Professor</option>
            </select>
            @if ($errors->has('role'))
            <p class="text-red-500 text-xs mt-2">{{ $errors->first('role') }}</p>
            @endif
        </div>
        <div id="formularioEspecifico" style="display: none">
            <!-- Campos específicos serão carregados aqui -->
             
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Registrar
            </button>
        </div>
    </form>
</main>
<script>
    function carregaFormularioEspecifico() {
        const tipo = document.querySelector('#tipo-usuario').value;
        const form = document.querySelector('#formularioEspecifico');

        if (tipo === 'aluno') {
            form.innerHTML = `
                <div class="mb-4 md:flex md:space-x-4">
                    <div class="md:w-1/2">
                        <label for="ra" class="block text-white text-sm font-bold mb-2">RA</label>
                        <input type="text" id="ra" required name="ra" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="RA" value="{{ old('ra') }}">
                        @if ($errors->has('ra'))
                            <p class="text-red-500 text-xs mt-2">{{ $errors->first('ra') }}</p>
                        @endif
                    </div>
                
                    <div class="md:w-1/2">
                        <label for="cep" class="block text-white text-sm font-bold mb-2">CEP</label>
                        <input type="text"  maxlength="9" required id="cep" name="cep" oninput="keyCEP(this)" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="CEP" value="{{ old('cep') }}">
                        @if ($errors->has('cep'))
                            <p class="text-red-500 text-xs mt-2">{{ $errors->first('cep') }}</p>
                        @endif
                        </div
                    </div>
                </div>
                <div class="mb-4 md:flex md:space-x-4">
                    <div class="md:w-1/2">
                        <label for="endereco" class="block text-white text-sm font-bold mb-2">Endereço</label>
                        <input type="text" id="endereco" required name="endereco" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Endereço" value="{{ old('endereco') }}" readonly>
                        @if ($errors->has('endereco'))
                            <p class="text-red-500 text-xs mt-2">{{ $errors->first('endereco') }}
                        </p>
                        @endif
                    </div>
                    <div class="md:w-1/2">
                        <label for="bairro" class="block text-white text-sm font-bold mb-2">Bairro</label>
                        <input type="text" id="bairro" required name="bairro" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Bairro" value="{{ old('bairro') }}" readonly>
                        @if ($errors->has('bairro'))
                            <p class="text-red-500 text-xs mt-2">{{ $errors->first('bairro') }}</p>
                        @endif
                    </div>
                </div>
                <div class="mb-4 md:flex md:space-x-4">
                    <div class="md:w-1/2">
                        <label for="numero" class="block text-white text-sm font-bold mb-2">Numero</label>
                        <input type="text" id="numero" required name="numero" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Numero" value="{{ old('numero') }}">
                        @if ($errors->has('numero'))
                            <p class="text-red-500 text-xs mt-2">{{ $errors->first('numero') }}
                        @endif
                    </div>
                    <div class="md:w-1/2">
                        <label for="complemento" class="block text-white text-sm font-bold mb-2">Complemento</label>
                        <input type="text" id="complemento" name="complemento" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Complemento" value="{{ old('complemento') }}">
                    </div>
                </div>
                <div class="mb-4 md:flex md:space-x-4">
                    <div class="md:w-1/2">
                        <label for="uf" class="block text-white text-sm font-bold mb-2">Estado</label>
                        <input type="text" id="uf" required name="uf" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Estado" value="{{ old('uf') }}" readonly>
                        @if ($errors->has('uf'))
                            <p class="text-red-500 text-xs mt-2">{{ $errors->first('uf') }}
                        @endif
                    </div>
                    <div class="md:w-1/2">
                        <label for="cidade" class="block text-white text-sm font-bold mb-2">Cidade</label>
                        <input type="text" id="cidade" required name="cidade" class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Cidade" value="{{ old('cidade') }}" readonly>
                        @if ($errors->has('cidade'))
                            <p class="text-red-500 text-xs mt-2">{{ $errors->first('cidade') }}</p>
                        @endif
                    </div>
                </div>
                
                `;

        } else if (tipo === 'professor') {
            form.innerHTML = `
                    <div class="mb-4">
                        <label for="rm" class="nomeblock text-white text-sm font-bold mb-2">RM</label>
                        <input
                            type="text"
                            id="rm"
                            name="rm"
                            class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="RM"
                            value="{{ old('rm') }}"
                        >
                        @if ($errors->has('rm'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('rm') }}</p>
                        @endif
                </div>
`;
        } else {
            form.innerHTML = '';
        }

        form.style.display = tipo === '#' ? 'none' : 'block';
    }

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

    document.addEventListener('DOMContentLoaded', function() {
        carregaFormularioEspecifico();

    });
</script>
@endsection