{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h1 class="text-center mb-4">Painel da Academia</h1>

    <div class="row justify-content-center">

        <div class="col-md-5">
            <div class="card border-primary shadow-sm mb-4">
                <div class="card-body text-center">
                    <h4 class="card-title">📋 Gerenciar Alunos</h4>
                    <p class="card-text">Cadastre, edite ou visualize os alunos da academia.</p>
                    <a href="{{ route('alunos.index') }}" class="btn btn-primary">Ir para Alunos</a>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card border-success shadow-sm mb-4">
                <div class="card-body text-center">
                    <h4 class="card-title">📈 Avaliações Físicas</h4>
                    <p class="card-text">Gerencie as avaliações de desempenho dos alunos.</p>
                    <a href="{{ route('avaliacoes.index') }}" class="btn btn-success">Ir para Avaliações</a>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
