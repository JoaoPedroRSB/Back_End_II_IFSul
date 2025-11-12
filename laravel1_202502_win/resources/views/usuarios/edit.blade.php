<div class="container">
  <h1>Editar Usuário</h1>

  <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label>Nome</label>
      <input type="text" name="nome" class="form-control" value="{{ old('nome', $usuario->nome) }}" required>
    </div>
    <br>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email', $usuario->email) }}" required>
    </div>
    <br>

    <div class="mb-3">
      <label>Senha (deixe em branco para manter a atual)</label>
      <input type="password" name="senha" class="form-control">
    </div>
    <br>

    <div class="mb-3">
      <label>CPF</label>
      <input type="text" name="cpf" class="form-control" value="{{ old('cpf', $usuario->cpf) }}" required>
    </div>
    <br>

    <div class="mb-3">
      <label>RG</label>
      <input type="text" name="rg" class="form-control" value="{{ old('rg', $usuario->rg) }}">
    </div>
    <br>

    <div class="mb-3">
      <label>Data de Nascimento</label>
      <input type="date" name="data_nascimento" class="form-control" value="{{ old('data_nascimento', $usuario->data_nascimento) }}">
    </div>
    <br>

    <div class="mb-3">
      <label>Cidade</label>
      <input type="text" name="cidade" class="form-control" value="{{ old('cidade', $usuario->cidade) }}">
    </div>
    <br>

    <div class="mb-3">
      <label>Estado</label>
      <input type="text" name="estado" class="form-control" maxlength="2" value="{{ old('estado', $usuario->estado) }}">
    </div>
    <br>

    <div class="mb-3">
      <label>Tipo de Usuário</label>
      <select name="tipo" id="tipo" class="form-control" required>
        <option value="usuariocomum" {{ old('tipo', $usuario->tipo) === 'usuariocomum' ? 'selected' : '' }}>Usuário Comum</option>
        <option value="donodalivraria" {{ old('tipo', $usuario->tipo) === 'donodalivraria' ? 'selected' : '' }}>Dono da Livraria</option>
      </select>
    </div>
    <hr>

    @php
    $exibirCampos = old('tipo', $usuario->tipo) === 'donodalivraria';
    @endphp

    <div id="campos-livraria" @if(!$exibirCampos) style="display: none;" @endif>
      <h3>Dados da Livraria</h3>

      <div class="mb-3">
        <label>Nome da Livraria</label>
        <input type="text" name="nome_livraria" class="form-control" value="{{ old('nome_livraria', $usuario->nome_livraria) }}">
      </div>
      <br>

      <div class="mb-3">
        <label>Email da Livraria</label>
        <input type="email" name="email_livraria" class="form-control" value="{{ old('email_livraria', $usuario->email_livraria) }}">
      </div>
      <br>

      <div class="mb-3">
        <label>CNPJ</label>
        <input type="text" name="cnpj" class="form-control" value="{{ old('cnpj', $usuario->cnpj) }}">
      </div>
      <br>

      <div class="mb-3">
        <label>Celular de Contato</label>
        <input type="text" name="celular_contato" class="form-control" value="{{ old('celular_contato', $usuario->celular_contato) }}">
      </div>
    </div>
    <br>

    <button type="submit" class="btn btn-success">Salvar Alterações</button>
    <br>
    <br>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
  </form>
</div>

<script>
  document.getElementById('tipo').addEventListener('change', function() {
    const campos = document.getElementById('campos-livraria');
    if (this.value === 'donodalivraria') {
      campos.style.display = 'block';
    } else {
      campos.style.display = 'none';
    }
  });
</script>