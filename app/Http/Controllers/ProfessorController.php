<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Notas;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if($user->role == 'aluno'){
            $alunos = Aluno::where('user_id', $user->id)->with(['notas', 'user'])->get();
        }else{
            $alunos = Aluno::with(['notas', 'user'])->get();
        }
        
        return view('listarnotas', compact('alunos'));
    }
    
}
