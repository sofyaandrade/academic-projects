@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Alunos</h1>
        <a href="{{ route('alunos.create') }}" class="btn btn-success">
            ➕ Novo Aluno
        </a>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3 align-items-center">
                <div class="col-auto">
                    <input type="text" name="busca" value="{{ $busca }}" class="form-control" placeholder="Buscar por nome">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Limpar</a>
                </div>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($alunos->count())
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Data de Nascimento</th>
                        <th>Telefone</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alunos as $aluno)
                        <tr>
                            <td>{{ $aluno->nome }}</td>
                            <td>{{ $aluno->email }}</td>
                            <td>{{ $aluno->data_nascimento->format('d/m/Y') }}</td>
                            <td>{{ $aluno->telefone }}</td>
                            <td class="text-end">
                                <a href="{{ route('alunos.edit', $aluno) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('alunos.destroy', $aluno) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $alunos->links() }}
    @else
        <div class="alert alert-info">Nenhum aluno encontrado.</div>
    @endif

</div>
@endsection
