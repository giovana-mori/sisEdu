<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index()
    {
        return view('registro');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:50',
                'password' => 'required|string|min:8|confirmed',
                'email' => 'required|email|unique:users,email',
                'telefone' => 'required|digits_between:10,15',
                'role' => 'required|in:aluno,professor',
                'rm' => 'required_if:role,professor|string|max:255',
                'cep' => 'required_if:role,aluno|string|max:20',
                'ra' => 'required_if:role,aluno|string|max:255',
                'endereco' => 'nullable|string|max:255',
                'numero' => 'nullable|string|max:255',
                'bairro' => 'nullable|string|max:255',
                'cidade' => 'nullable|string|max:255',
                'estado' => 'nullable|string|max:255',
            ],
            [
                'name.required' => 'Preencha o campo nome.',
                'name.string' => 'O campo nome deve ser uma string.',
                'name.max' => 'O campo nome não pode ter mais que 50 caracteres.',

                'email.unique' => 'Já existe uma conta com este email.',
                'email.email' => 'O email não é valiado.',
                'email.required' => 'Preencha o campo email.',

                'password.required' => 'Preencha o campo senha.',
                'password.min' => 'O campo senha deve ter no mínimo 8 caracteres.',
                'password.confirmed' => 'A confirmação da senha não coincide.',

                'telefone.required' => 'Preencha o campo telefone.',
                'telefone.digits_between' => 'O campo telefone deve ter entre 10 e 15 dígitos.',

                'role.required' => 'Preencha o campo função.',

                'rm.required_if' => 'Preencha o campo RM quando a função for professor.',
                'rm.max' => 'O campo RM não pode ter mais que 255 caracteres.',

                'cep.required_if' => 'Preencha o campo CEP quando a função for aluno.',
                'cep.max' => 'O campo CEP não pode ter mais que 20 caracteres.',

                'ra.required_if' => 'Preencha o campo RA quando a função for aluno.',
                'ra.max' => 'O campo RA não pode ter mais que 255 caracteres.',

                'endereco.required_if' => 'Preencha o campo endereço quando a função for aluno.',
                'endereco.max' => 'O campo endereço não pode ter mais que 255 caracteres.',
                
                'numero.required_if' => 'Preencha o campo número quando a função for aluno.',
                'numero.max' => 'O campo número não pode ter mais que 255 caracteres.',

                'bairro.required_if' => 'Preencha o campo bairro quando a função for aluno.',
                'bairro.max' => 'O campo bairro não pode ter mais que 255 caracteres.',

                'cidade.required_if' => 'Preencha o campo cidade quando a função for aluno.',
                'cidade.max' => 'O campo cidade não pode ter mais que 255 caracteres.',

                'uf.required_if' => 'Preencha o campo estado quando a função for aluno.',
                'uf.max' => 'O campo estado não pode ter mais que 255 caracteres.',
            ]
        );

        $user = User::create([
            'nome' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'telefone' => $request->telefone,
            'role' => $request->role
        ]);


        if ($user->role === 'aluno') {
            Aluno::create([
                'user_id' => $user->id,
                'ra' => $request->ra,
                'cep' => $request->cep,
                'endereco' => $request->endereco,
                'numero' => $request->numero,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'uf' => $request->uf,
                'complemento' => $request->complemento
            ]);
        } elseif ($user->role === 'professor') {
            Professor::create([
                'user_id' => $user->id,
                'rm' => $request->rm
            ]);
        }

        return redirect()->route('login')->with('msg', 'Registrado com sucesso !');
    }
}
