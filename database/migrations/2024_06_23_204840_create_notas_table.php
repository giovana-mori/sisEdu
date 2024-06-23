<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->integer('A1');
            $table->integer('A2');
            $table->integer('P1');
            $table->integer('P2');
            $table->integer('PD');
            $table->integer('MFP');
            $table->integer('MFA');
            $table->foreign('aluno_id')->references('id')->on('alunos');    

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
