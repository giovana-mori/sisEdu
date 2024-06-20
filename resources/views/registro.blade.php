@extends('layouts.main')
@section('title', 'Registro')
@section('content')
    <main class="min-h-[80vh] flex justify-center items-center flex-col bg-gray-100">
        <h1 class="text-2xl mb-6 font-bold text-gray-700">Registro</h1>
        <form class="w-full max-w-sm md:max-w-xl bg-white p-6 rounded-lg shadow-lg mb-2" action="{{ route('registro.post') }}" method="POST">
            @csrf

            <div class="mb-4 md:flex md:space-x-4">
                <div class="md:w-1/2">
                    <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">Nome</label>
                    <input
                        type="text"
                        id="nome"
                        name="name"
                        class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nome"
                        value="{{ old('name') }}"
                    >
                    @if ($errors->has('name'))
                        <p class="text-red-500 text-xs mt-2">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="md:w-1/2">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Email"
                        value="{{ old('email') }}"
                    >
                    @if ($errors->has('email'))
                        <p class="text-red-500 text-xs mt-2">{{ $errors->first('email') }}</p>
                    @endif
                </div>
            </div>
            <div class="mb-4 md:flex md:space-x-4">
                <div class="md:w-1/2">
                    <label for="senha" class="block text-gray-700 text-sm font-bold mb-2">Senha</label>
                    <input
                        type="password"
                        id="senha"
                        name="password"
                        class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Senha"
                    >
                    @if ($errors->has('password'))
                        <p class="text-red-500 text-xs mt-2">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="md:w-1/2">
                    <label for="confirma-senha" class="block text-gray-700 text-sm font-bold mb-2">Confirmar senha</label>
                    <input
                        type="password"
                        id="confirma-senha"
                        name="password_confirmation"
                        class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Confirme a senha"
                    >
                    @if ($errors->has('password_confirmation'))
                        <p class="text-red-500 text-xs mt-2">{{ $errors->first('password_confirmation') }}</p>
                    @endif
                </div>
            </div>
            <div class="mb-4 md:flex md:space-x-4">
                <div class="w-full">
                    <label for="telefone" class="block text-gray-700 text-sm font-bold mb-2">Telefone</label>
                    <input
                        type="text"
                        id="telefone"
                        name="telefone"
                        class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Telefone"
                        value="{{ old('telefone') }}"
                    >
                    @if ($errors->has('telefone'))
                        <p class="text-red-500 text-xs mt-2">{{ $errors->first('telefone') }}</p>
                    @endif
                </div>
            </div>
            <div class="mb-6">
                <label for="tipo-usuario" class="block text-gray-700 text-sm font-bold mb-2">Tipo de Usuário</label>
                <select
                    id="tipo-usuario"
                    name="role"
                    class="border rounded w-full py-1 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onchange="carregaFormularioEspecifico()"
                >
                    <option value="#" class="text-gray-300">--selecione uma opção--</option>
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
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
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
                    <div class="mb-4">
                        <label for="ra" class="block text-gray-700 text-sm font-bold mb-2">RA</label>
                        <input
                            type="text"
                            id="ra"
                            name="ra"
                            class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="RA"
                            value="{{ old('ra') }}"
                        >
                        @if ($errors->has('ra'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('ra') }}</p>
                        @endif
                </div>
                <div class="mb-4">
                    <label for="cep" class="block text-gray-700 text-sm font-bold mb-2">CEP</label>
                    <input
                        type="text"
                        id="cep"
                        name="cep"
                        class="border rounded w-full py-1 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="CEP"
                        value="{{ old('cep') }}"
                        >
                        @if ($errors->has('cep'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('cep') }}</p>
                        @endif
                </div>
`;
            } else if (tipo === 'professor') {
                form.innerHTML = `
                    <div class="mb-4">
                        <label for="rm" class="block text-gray-700 text-sm font-bold mb-2">RM</label>
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

        // Carregar os campos específicos corretamente ao recarregar a página com erros de validação
        document.addEventListener('DOMContentLoaded', function() {
            carregaFormularioEspecifico();
        });
    </script>
@endsection
