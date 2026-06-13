<div class="mb-3">
    <label>Aluno</label>
    <select name="aluno_id" class="form-control" required>
        <option value="">Selecione</option>
        @foreach($alunos as $aluno)
            <option value="{{ $aluno->id }}" {{ old('aluno_id', $avaliacao->aluno_id ?? '') == $aluno->id ? 'selected' : '' }}>
                {{ $aluno->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Data da Avaliação</label>
    <input type="date" name="data_avaliacao" class="form-control" value="{{ old('data_avaliacao', isset($avaliacao) ? $avaliacao->data_avaliacao->format('Y-m-d') : '') }}" required>
</div>

<div class="mb-3">
    <label>Peso (kg)</label>
    <input type="number" step="0.01" name="peso" class="form-control" value="{{ old('peso', $avaliacao->peso ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Altura (m)</label>
    <input type="number" step="0.01" name="altura" class="form-control" value="{{ old('altura', $avaliacao->altura ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Gordura Corporal (%)</label>
    <input type="number" step="0.01" name="gordura_corporal" class="form-control" value="{{ old('gordura_corporal', $avaliacao->gordura_corporal ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Massa Muscular (kg)</label>
    <input type="number" step="0.01" name="massa_muscular" class="form-control" value="{{ old('massa_muscular', $avaliacao->massa_muscular ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Observações</label>
    <textarea name="observacoes" class="form-control">{{ old('observacoes', $avaliacao->observacoes ?? '') }}</textarea>
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