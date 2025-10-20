<h1>Editar Compra</h1>

<form action="{{ route('compras.update', $compra->id) }}" method="POST">
  @csrf
  @method('PUT')

  <label>Usuário:</label><br>
  <select name="id_usuario" required>
    <option value="">-- Selecione --</option>
    @foreach($usuarios as $usuario)
    <option value="{{ $usuario->id }}" @if($compra->id_usuario == $usuario->id) selected @endif>
      {{ $usuario->nome }}
    </option>
    @endforeach
  </select><br><br>

  <label>Livro:</label><br>
  <select name="id_livro" required>
    @foreach($livros as $livro)
    <option value="{{ $livro->id }}" @if($compra->id_livro == $livro->id) selected @endif>
      {{ $livro->titulo }}
    </option>
    @endforeach
  </select><br><br>

  <label>Quantidade:</label><br>
  <input type="number" name="quantidade" value="{{ $compra->quantidade }}" required><br><br>

  <label>Formato:</label><br>
  <select name="formato" required>
    <option value="fisico" @if($compra->formato == 'fisico') selected @endif>Físico</option>
    <option value="digital" @if($compra->formato == 'digital') selected @endif>Digital</option>
  </select><br><br>

  <label>Preço Unitário:</label><br>
  <input type="number" step="0.01" name="preco_unitario" value="{{ $compra->preco_unitario }}" required><br><br>

  <label>Total:</label><br>
  <input type="number" step="0.01" name="total" value="{{ $compra->total }}" readonly><br><br>

  <label>Endereço:</label><br>
  <input type="text" name="endereco" value="{{ $compra->endereco }}" required><br><br>

  <label>Forma de Pagamento:</label><br>
  <select name="forma_pagamento" required>
    <option value="cartao" @if($compra->forma_pagamento == 'cartao') selected @endif>Cartão</option>
    <option value="boleto" @if($compra->forma_pagamento == 'boleto') selected @endif>Boleto</option>
    <option value="pix" @if($compra->forma_pagamento == 'pix') selected @endif>PIX</option>
  </select><br><br>

  <label>Data da Compra:</label><br>
  <input type="text" value="{{ \Carbon\Carbon::parse($compra->data_compra)->format('d/m/Y H:i') }}" readonly><br><br>

  <button type="submit">Atualizar</button>
  <a href="{{ route('compras.index') }}">Cancelar</a>
</form>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const quantidade = document.querySelector('input[name="quantidade"]');
    const precoUnitario = document.querySelector('input[name="preco_unitario"]');
    const total = document.querySelector('input[name="total"]');

    function calcularTotal() {
      const q = parseFloat(quantidade.value) || 0;
      const p = parseFloat(precoUnitario.value) || 0;
      total.value = (q * p).toFixed(2);
    }

    quantidade.addEventListener('input', calcularTotal);
    precoUnitario.addEventListener('input', calcularTotal);
  });
</script>