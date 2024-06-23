<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Notas;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        $alunos = Aluno::with('notas')->get();
        
        return view('listarnotas', compact('alunos'));
    }
}
