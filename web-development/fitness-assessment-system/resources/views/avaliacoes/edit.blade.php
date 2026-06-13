@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Avaliação Física</h1>

    <form method="POST" action="{{ route('avaliacoes.update', ['avaliaco' => $avaliaco]) }}">

        @csrf
        @method('PUT')

        @include('avaliacoes.form')

        <button class="btn btn-primary mt-3">Atualizar</button>
        <a href="{{ route('avaliacoes.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection