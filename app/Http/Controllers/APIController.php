<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use GuzzleHttp\Psr7\Request;
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

    //cadastrar nota tipo post
    public function store(Request $request)
    {
        // $aluno = Aluno::find($request->ra);

        return [];

        // if (!$aluno) {
        //     return response()->json(['error' => 'Aluno não encontrado'], 404);
        // }

        // $aluno->notas()->create([
        //     'nota' => $request->nota,
        //     'materia' => $request->materia,
        // ]);

        // return response()->json(['success' => 'Nota cadastrada com sucesso'], 200);
    }
}
