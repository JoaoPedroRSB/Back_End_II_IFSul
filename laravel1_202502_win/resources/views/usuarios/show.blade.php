<div class="container">
  <h1>Detalhes do Usuário</h1>

  <ul class="list-group">
    <li class="list-group-item"><strong>Nome:</strong> {{ $usuario->nome }}</li>
    <li class="list-group-item"><strong>Email:</strong> {{ $usuario->email }}</li>
    <li class="list-group-item"><strong>CPF:</strong> {{ $usuario->cpf }}</li>
    <li class="list-group-item"><strong>RG:</strong> {{ $usuario->rg ?? '—' }}</li>
    <li class="list-group-item"><strong>Tipo:</strong> {{ $usuario->tipo }}</li>
    @if($usuario->tipo === 'donodalivraria')
    <li class="list-group-item"><strong>Nome da Livraria:</strong> {{ $usuario->nome_livraria }}</li>
    <li class="list-group-item"><strong>Email da Livraria:</strong> {{ $usuario->email_livraria }}</li>
    <li class="list-group-item"><strong>CNPJ:</strong> {{ $usuario->cnpj }}</li>
    <li class="list-group-item"><strong>Celular de Contato:</strong> {{ $usuario->celular_contato }}</li>
    @endif
  </ul>

  <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>