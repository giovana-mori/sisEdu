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
    public function home()
    {
        $user = Auth::user();

        if ($user->role == 'aluno') {
            $alunos = Aluno::where('user_id', $user->id)->with(['user'])->get();
        } else {
            $alunos = Aluno::with(['user'])->get();
        }

        return view('listaralunos', compact('alunos'));
    }

    //cadastrar notas
    public function save(Request $request)
    {
        $aluno = Aluno::where('ra', $request->ra)->first();
        $notas = new Notas();
        $notas->aluno_id = $aluno->id;
        $notas->A1 = $request->A1;
        $notas->A2 = $request->A2;
        $notas->P1 = $request->P1;
        $notas->P2 = $request->P2;
        $notas->PD = $request->PD;
        $notas->MFA = $request->MFA;
        $notas->MFP = $request->MFP;
        $notas->save();

        return redirect()->back()->with('success', 'Notas cadastradas com sucesso!');
    }
    public function delete($id)
    {
        Aluno::where('id', $id)->first()->delete();
        return redirect('listarnotas')->with('msg', 'Nota excluida com sucesso');
    }

    
}
