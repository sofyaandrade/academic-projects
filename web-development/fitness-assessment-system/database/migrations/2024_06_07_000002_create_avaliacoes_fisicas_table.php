<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('avaliacoes_fisicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id')->constrained('alunos')->onDelete('cascade');
            $table->date('data_avaliacao');
            $table->decimal('peso', 5, 2);
            $table->decimal('altura', 5, 2);
            $table->decimal('gordura_corporal', 5, 2);
            $table->decimal('massa_muscular', 5, 2);
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('avaliacoes_fisicas');
    }
};