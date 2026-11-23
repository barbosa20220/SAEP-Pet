<div class="row">
<div class="col-md-6 mb-3"><label class="form-label">Nome</label><input class="form-control" name="nome" value="{{ old('nome',$tutor->nome ?? '') }}" required></div>
<div class="col-md-6 mb-3"><label class="form-label">CPF</label><input class="form-control" name="cpf" value="{{ old('cpf',$tutor->cpf ?? '') }}" placeholder="Opcional"></div>
<div class="col-md-6 mb-3"><label class="form-label">Telefone</label><input class="form-control" name="telefone" value="{{ old('telefone',$tutor->telefone ?? '') }}" required></div>
<div class="col-md-6 mb-3"><label class="form-label">E-mail</label><input class="form-control" type="email" name="email" value="{{ old('email',$tutor->email ?? '') }}" required></div>
<div class="col-12 mb-3"><label class="form-label">Endereço</label><input class="form-control" name="endereco" value="{{ old('endereco',$tutor->endereco ?? '') }}"></div>
</div>
