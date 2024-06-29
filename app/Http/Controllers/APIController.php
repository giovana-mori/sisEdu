<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Notas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    public function alunos($id = null)
    {
        // $user = Auth::user();

        if ($id || $id != null) {
            $aluno = Aluno::find($id);

            if (!$aluno) {
                return [];
            }
        }

        $aluno = Aluno::with(['notas', 'user'])->get();
        return $aluno;
    }

    public function notas()
    {
        $aluno = Aluno::with(['notas', 'user'])->get();
        return response()->json(['success' => $aluno], 200);
    }

    public function alterarNotas(Request $request)
    {

        $aluno = Aluno::where('ra', $request->ra)->first();

        if (!$aluno) {
            return response()->json(['error' => 'Aluno não encontrado'], 404);
        }

        Notas::where('aluno_id', $aluno->id)->update(
            [
                'A1' => $request->A1,
                'A2' => $request->A2,
                'P1' => $request->P1,
                'P2' => $request->P2,
                'PD' => $request->PD,
                'MFA' => $request->MFA,
                'MFP' => $request->MFP
            ]
        );
        return response()->json(['success' => 'Notas atualizadas com sucesso'], 200);
    }

    public function deletarNota($id)
    {
        $nota = Notas::find($id);

        if (!$nota) {
            return response()->json(['error' => 'Nota não encontrada'], 404);
        }

        $nota->delete();
        return response()->json(['success' => 'Nota deletada com sucesso'], 200);
    }
    public function deletarAluno($id)
    {
        $aluno = Aluno::find($id);

        if (!$aluno) {
            return response()->json(['error' => 'Aluno não encontrado'], 404);
        }

        $aluno->delete();
        return response()->json(['success' => 'Aluno deletado com sucesso'], 200);
    }
}
