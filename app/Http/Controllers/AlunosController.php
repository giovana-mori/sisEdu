<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Notas;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunosController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'aluno') {
            $alunos = Aluno::where('user_id', $user->id)->with(['user'])->get();
        } else {
            $alunos = Aluno::with(['user'])->get();
        }

        return view('listaralunos', compact('alunos'));
    }

    public function show($id)
    {
        //if role is aluno, show only his data
        $user = Auth::user();

        if ($user->role == 'aluno') {
            $aluno = Aluno::where('user_id', $user->id)->first();
        } else {
            $aluno = Aluno::find($id);
        }

        return view('editaralunos', compact('aluno'));
    }
    public function editar($id)
    {
        $aluno = Aluno::find($id);

        return view('editaralunos', compact('aluno'));
    }

    public function update(Request $request, $id)
    {
        //update mode aluno and user
        $request->validate([
            'ra' => 'required|string|max:255',
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'cep' => 'required|string|max:9',
            'endereco' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'complemento' => 'nullable|string|max:255',
            'cidade' => 'required|string|max:255',
            'uf' => 'required|string|max:2',
        ]);

        $aluno = Aluno::findOrFail($id);
        $aluno->update($request->all());

        $user = User::find($aluno->user_id);
        $user->update($request->all());

        return redirect()->back()->with('msg', 'Aluno atualizado com sucesso!');
    }
}
