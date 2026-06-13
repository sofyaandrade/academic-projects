<?php

namespace App\Http\Controllers;

use App\Models\AvaliacaoFisica;
use App\Models\Aluno;
use Illuminate\Http\Request;

class AvaliacaoFisicaController extends Controller
{
    public function index()
    {
        $avaliacoes = AvaliacaoFisica::with('aluno')->orderBy('data_avaliacao', 'desc')->paginate(10);
        return view('avaliacoes.index', compact('avaliacoes'));
    }

    public function create()
    {
        $alunos = Aluno::orderBy('nome')->get();
        return view('avaliacoes.create', compact('alunos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'data_avaliacao' => 'required|date',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
            'gordura_corporal' => 'required|numeric',
            'massa_muscular' => 'required|numeric',
            'observacoes' => 'nullable|string',
        ]);

        AvaliacaoFisica::create($request->all());

        return redirect()->route('avaliacoes.index')->with('success', 'Avaliação cadastrada com sucesso.');
    }

    public function show(AvaliacaoFisica $avaliaco)
    {
        return redirect()->route('avaliacoes.edit', ['avaliaco' => $avaliaco]);
    }

    public function edit(AvaliacaoFisica $avaliaco)
    {
        $alunos = Aluno::orderBy('nome')->get();
        return view('avaliacoes.edit', compact('avaliaco', 'alunos'));
    }

    public function update(Request $request, AvaliacaoFisica $avaliaco)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'data_avaliacao' => 'required|date',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
            'gordura_corporal' => 'required|numeric',
            'massa_muscular' => 'required|numeric',
            'observacoes' => 'nullable|string',
        ]);

        $avaliaco->update($request->all());

        return redirect()->route('avaliacoes.index')->with('success', 'Avaliação atualizada com sucesso.');
    }

    public function destroy(AvaliacaoFisica $avaliaco)
    {
        $avaliaco->delete();
        return redirect()->route('avaliacoes.index')->with('success', 'Avaliação excluída com sucesso.');
    }
}