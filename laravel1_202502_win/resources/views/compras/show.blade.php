<h1>Detalhes da Compra</h1>

<p><strong>ID:</strong> {{ $compra->id }}</p>
<p><strong>Usuário:</strong> {{ $compra->usuario->nome ?? 'Anônimo' }}</p>
<p><strong>Livro:</strong> {{ $compra->livro->titulo ?? 'Livro removido' }}</p>
<p><strong>Quantidade:</strong> {{ $compra->quantidade }}</p>
<p><strong>Formato:</strong> {{ ucfirst($compra->formato) }}</p>
<p><strong>Preço Unitário:</strong> R$ {{ number_format($compra->preco_unitario, 2, ',', '.') }}</p>
<p><strong>Total:</strong> R$ {{ number_format($compra->total, 2, ',', '.') }}</p>
<p><strong>Data da Compra:</strong> {{ \Carbon\Carbon::parse($compra->data_compra)->format('d/m/Y H:i') }}</p>
<p><strong>Endereço:</strong> {{ $compra->endereco }}</p>
<p><strong>Forma de Pagamento:</strong> {{ ucfirst($compra->forma_pagamento) }}</p>

<br>

<a href="{{ route('compras.edit', $compra->id) }}">Editar</a> |
<a href="{{ route('compras.index') }}">Voltar</a>