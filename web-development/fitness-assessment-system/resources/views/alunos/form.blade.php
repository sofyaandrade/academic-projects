
<div class="mb-3">
    <label>Nome</label>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $aluno->nome ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $aluno->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Data de Nascimento</label>
    <input type="date" name="data_nascimento" class="form-control" value="{{ old('data_nascimento', isset($aluno) ? $aluno->data_nascimento->format('Y-m-d') : '') }}" required>
</div>

<div class="mb-3">
    <label>Telefone</label>
    <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $aluno->telefone ?? '') }}">
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif