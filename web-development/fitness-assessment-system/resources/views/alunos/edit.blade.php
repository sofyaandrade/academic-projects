@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Aluno</h1>

    <form method="POST" action="{{ route('alunos.update', $aluno) }}">
        @csrf @method('PUT')

        @include('alunos.form')

        <button class="btn btn-primary mt-3">Atualizar</button>
        <a href="{{ route('alunos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection