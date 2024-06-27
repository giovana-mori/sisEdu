<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    protected $fillable = [
        //"id", => id vai ser gerado no banco de dados
        'user_id',
        'ra',
        'cep'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notas(){
        return $this->hasMany(Notas::class);
    }

}
