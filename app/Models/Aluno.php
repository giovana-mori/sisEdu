<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ra',
        'cep',
        'endereco',
        'bairro',
        'numero',
        'cidade',
        'uf',
        'complemento'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notas(){
        return $this->hasMany(Notas::class);
    }

}
