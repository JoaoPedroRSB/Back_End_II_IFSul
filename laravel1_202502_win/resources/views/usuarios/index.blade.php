<div class="container">
  <h1>Lista de Usuários</h1>
  <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Usuário</a>
  <br><br>

  @if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-dark table-striped" border="1" cellpadding="6">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Tipo</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($usuarios as $usuario)
      <tr>
        <td>{{ $usuario->id }}</td>
        <td>{{ $usuario->nome }}</td>
        <td>{{ $usuario->email }}</td>
        <td>{{ $usuario->tipo }}</td>
        <td>
          <a href="{{ route('usuarios.show', $usuario) }}" class="btn btn-info btn-sm">Ver</a>
          <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-warning btn-sm">Editar</a>
          <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir este usuário?')">Excluir</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>