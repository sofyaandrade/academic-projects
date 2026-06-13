@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Cadastrar Novo Aluno</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('alunos.store') }}">
                @csrf
                @include('alunos.form')

                <div class="mt-3">
                    <button class="btn btn-success">Salvar</button>
                    <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
