<h1>Registrar Compra</h1>

<form action="{{ route('compras.store') }}" method="POST">
  @csrf

  <label>Usuário:</label><br>
  <select name="id_usuario" required>
    <option value="">-- Selecione --</option>
    @foreach($usuarios as $usuario)
    <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
    @endforeach
  </select><br><br>

  <label>Livro:</label><br>
  <select name="id_livro" required>
    @foreach($livros as $livro)
    <option value="{{ $livro->id }}" data-preco="{{ $livro->preco }}">
      {{ $livro->titulo }}
    </option>
    @endforeach
  </select><br><br>

  <label>Quantidade:</label><br>
  <input type="number" name="quantidade" value="1" min="1" required><br><br>

  <label>Formato:</label><br>
  <select name="formato">
    <option value="fisico">Físico</option>
    <option value="digital">Digital</option>
  </select><br><br>

  <label>Preço Unitário:</label><br>
  <input type="number" step="0.01" name="preco_unitario" required><br><br>

  <label>Total:</label><br>
  <input type="number" step="0.01" name="total" readonly required><br><br>

  <label>Forma de Pagamento:</label><br>
  <select name="forma_pagamento" required>
    <option value="cartao">Cartão</option>
    <option value="boleto">Boleto</option>
    <option value="pix">PIX</option>
  </select><br><br>

  <label>Endereço de Entrega:</label><br>
  <input type="text" name="endereco" placeholder="Rua, número, cidade..." required><br><br>

  <button type="submit">Salvar</button>
  <a href="{{ route('compras.index') }}">Cancelar</a>
</form>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const selectLivro = document.querySelector('select[name="id_livro"]');
    const quantidade = document.querySelector('input[name="quantidade"]');
    const precoUnitario = document.querySelector('input[name="preco_unitario"]');
    const total = document.querySelector('input[name="total"]');

    function calcularTotal() {
      const qtd = parseFloat(quantidade.value) || 0;
      const preco = parseFloat(precoUnitario.value) || 0;
      total.value = (qtd * preco).toFixed(2);
    }

    // Atualiza preço unitário ao selecionar livro
    selectLivro.addEventListener('change', function() {
      const preco = this.options[this.selectedIndex].getAttribute('data-preco');
      precoUnitario.value = preco ? parseFloat(preco).toFixed(2) : '';
      calcularTotal();
    });

    quantidade.addEventListener('input', calcularTotal);
    precoUnitario.addEventListener('input', calcularTotal);
  });
</script>