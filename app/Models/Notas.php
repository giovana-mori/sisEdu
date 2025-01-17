<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use HasFactory;
    protected $fillable = [
        'aluno_id',
        'A1',
        'A2',
        'P1',
        'P2',
        'PD',
        'MFA',
        'MFP'
    ];

    public function Alunos()
    {
        return $this->belongsTo(Aluno::class);
    }
}
