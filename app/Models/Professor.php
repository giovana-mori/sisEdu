<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        //"id" => o id vai ser gerado no banco de dados,
        "user_id",
        'rm'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
