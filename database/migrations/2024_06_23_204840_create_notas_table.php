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
            $table->decimal('A1', 4, 2);
            $table->decimal('A2', 4, 2);
            $table->decimal('P1', 4, 2);
            $table->decimal('P2', 4, 2);
            $table->decimal('PD', 4, 2);
            $table->decimal('MFP', 4, 2);
            $table->decimal('MFA', 4, 2);
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
