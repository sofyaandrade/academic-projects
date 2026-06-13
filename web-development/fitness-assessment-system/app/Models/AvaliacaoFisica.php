<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliacaoFisica extends Model
{
    use HasFactory;

    protected $table = 'avaliacoes_fisicas';

    protected $fillable = [
        'aluno_id',
        'data_avaliacao',
        'peso',
        'altura',
        'gordura_corporal',
        'massa_muscular',
        'observacoes',
    ];

    protected $casts = [
        'data_avaliacao' => 'date',
    ];
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}