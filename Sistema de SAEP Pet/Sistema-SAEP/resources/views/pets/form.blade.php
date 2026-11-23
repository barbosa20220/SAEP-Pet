<div class="row">
<div class="col-md-6 mb-3"><label class="form-label">Tutor</label><select class="form-select" name="tutor_id" required><option value="">Selecione</option>@foreach($tutores as $t)<option value="{{ $t->id }}" @selected(old('tutor_id',$pet->tutor_id ?? '')==$t->id)>{{ $t->nome }}</option>@endforeach</select></div>
<div class="col-md-6 mb-3"><label class="form-label">Nome do pet</label><input class="form-control" name="nome" value="{{ old('nome',$pet->nome ?? '') }}" required></div>
<div class="col-md-4 mb-3"><label class="form-label">Espécie</label><select class="form-select" name="especie" required>@foreach(['Cachorro','Gato','Ave','Outro'] as $e)<option @selected(old('especie',$pet->especie ?? '')==$e)>{{ $e }}</option>@endforeach</select></div>
<div class="col-md-4 mb-3"><label class="form-label">Raça</label><input class="form-control" name="raca" value="{{ old('raca',$pet->raca ?? '') }}"></div>
<div class="col-md-4 mb-3"><label class="form-label">Porte</label><select class="form-select" name="porte"><option value="">Não informado</option>@foreach(['Pequeno','Médio','Grande'] as $p)<option @selected(old('porte',$pet->porte ?? '')==$p)>{{ $p }}</option>@endforeach</select></div>
<div class="col-md-4 mb-3"><label class="form-label">Nascimento</label><input class="form-control" type="date" name="data_nascimento" value="{{ old('data_nascimento',$pet->data_nascimento ?? '') }}"></div>
</div>
