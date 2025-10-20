<div class="container">
  <h1>Cadastrar Usuário</h1>

  <form action="{{ route('usuarios.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label>Nome:</label>
      <input type="text" name="nome" class="form-control" required>
    </div>
    <br>

    <div class="mb-3">
      <label>Email:</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <br>

    <div class="mb-3">
      <label>Senha:</label>
      <input type="password" name="senha" class="form-control" required>
    </div>
    <br>

    <div class="mb-3">
      <label>CPF:</label>
      <input type="text" name="cpf" class="form-control" required>
    </div>
    <br>

    <div class="mb-3">
      <label>RG:</label>
      <input type="text" name="rg" class="form-control">
    </div>
    <br>

    <div class="mb-3">
      <label>Data de Nascimento:</label>
      <input type="date" name="data_nascimento" class="form-control">
    </div>
    <br>

    <div class="mb-3">
      <label>Cidade:</label>
      <input type="text" name="cidade" class="form-control">
    </div>
    <br>

    <div class="mb-3">
      <label>Estado:</label>
      <input type="text" name="estado" class="form-control" maxlength="2">
    </div>
    <br>

    <div class="mb-3">
      <label>Tipo de Usuário:</label>
      <select name="tipo" id="tipo" class="form-control" required>
        <option value="usuariocomum">Usuário Comum</option>
        <option value="donodalivraria">Dono da Livraria</option>
      </select>
    </div>
    <br>

    <div id="campos-livraria" style="display: none;">
      <h4>Dados da Livraria</h4>

      <div class="mb-3">
        <label>Nome da Livraria:</label>
        <input type="text" name="nome_livraria" class="form-control">
      </div>
      <br>

      <div class="mb-3">
        <label>Email da Livraria:</label>
        <input type="email" name="email_livraria" class="form-control">
      </div>
      <br>

      <div class="mb-3">
        <label>CNPJ:</label>
        <input type="text" name="cnpj" class="form-control">
      </div>
      <br>

      <div class="mb-3">
        <label>Celular de Contato:</label>
        <input type="text" name="celular_contato" class="form-control">
      </div>
    </div>

    <br>
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('usuarios.index') }}" type="cancel" class="btn btn-secondary">Cancelar</a>
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