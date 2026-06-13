@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Avaliações Físicas</h1>

    <a href="{{ route('avaliacoes.create') }}" class="btn btn-primary mb-3">Nova Avaliação</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Aluno</th>
                <th>Data Avaliação</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Gordura Corporal</th>
                <th>Massa Muscular</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($avaliacoes as $avaliacao)
                <tr>
                    <td>{{ $avaliacao->aluno->nome }}</td>
                    <td>{{ $avaliacao->data_avaliacao->format('d/m/Y') }}</td>
                    <td>{{ $avaliacao->peso }} kg</td>
                    <td>{{ $avaliacao->altura }} m</td>
                    <td>{{ $avaliacao->gordura_corporal }}%</td>
                    <td>{{ $avaliacao->massa_muscular }} kg</td>
                    <td>
                        <a href="{{ route('avaliacoes.edit', $avaliacao) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('avaliacoes.destroy', $avaliacao) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $avaliacoes->links() }}
</div>
@endsection