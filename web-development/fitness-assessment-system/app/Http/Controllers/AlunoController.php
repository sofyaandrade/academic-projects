<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->input('busca');
        $alunos = Aluno::when($busca, function($query, $busca) {
                return $query->where('nome', 'ILIKE', "%{$busca}%");
            })
            ->orderBy('nome')
            ->paginate(10);

        return view('alunos.index', compact('alunos', 'busca'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email',
            'data_nascimento' => 'required|date',
            'telefone' => 'nullable|string|max:20',
        ]);

        Aluno::create($request->all());

        return redirect()->route('alunos.index')->with('success', 'Aluno cadastrado com sucesso.');
    }

    public function edit(Aluno $aluno)
    {
        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, Aluno $aluno)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email,'.$aluno->id,
            'data_nascimento' => 'required|date',
            'telefone' => 'nullable|string|max:20',
        ]);

        $aluno->update($request->all());

        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso.');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso.');
    }
}