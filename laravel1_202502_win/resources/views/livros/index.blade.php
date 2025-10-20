<h1>Lista de Livros</h1>
<a href="{{ route('livros.create') }}">Cadastrar Novo Livro</a>
<br><br>

@if(session('success'))
<p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="6">
  <tr>
    <th>ID</th>
    <th>Título</th>
    <th>Autor</th>
    <th>Preço</th>
    <th>Formato</th>
    <th>Ações</th>
  </tr>
  @foreach($livros as $livro)
  <tr>
    <td>{{ $livro->id }}</td>
    <td>{{ $livro->titulo }}</td>
    <td>{{ $livro->autor }}</td>
    <td>R$ {{ number_format($livro->preco, 2, ',', '.') }}</td>
    <td>{{ ucfirst($livro->formato) }}</td>
    <td>
      <a href="{{ route('livros.show', $livro->id) }}">Ver</a> |
      <a href="{{ route('livros.edit', $livro->id) }}">Editar</a> |
      <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Deseja excluir este livro?')">Excluir</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>