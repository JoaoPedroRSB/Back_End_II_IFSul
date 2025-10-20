<h1>Lista de Compras</h1>

<a href="{{ route('compras.create') }}">Registrar Nova Compra</a>
<br><br>

@if(session('success'))
<p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="6">
  <tr>
    <th>ID</th>
    <th>Usuário</th>
    <th>Livro</th>
    <th>Quantidade</th>
    <th>Total</th>
    <th>Forma de Pagamento</th>
    <th>Endereço</th>
    <th>Ações</th>
  </tr>

  @foreach($compras as $compra)
  <tr>
    <td>{{ $compra->id }}</td>
    <td>{{ $compra->usuario->nome ?? 'Anônimo' }}</td>
    <td>{{ $compra->livro->titulo ?? 'Livro removido' }}</td>
    <td>{{ $compra->quantidade }}</td>
    <td>R$ {{ number_format($compra->total, 2, ',', '.') }}</td>
    <td>{{ ucfirst($compra->forma_pagamento) }}</td>
    <td>{{ $compra->endereco }}</td>
    <td>
      <a href="{{ route('compras.show', $compra->id) }}">Ver</a> |
      <a href="{{ route('compras.edit', $compra->id) }}">Editar</a> |
      <form action="{{ route('compras.destroy', $compra->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Deseja excluir esta compra?')">Excluir</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>