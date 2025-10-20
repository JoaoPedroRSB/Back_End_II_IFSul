<h1>Detalhes do Livro</h1>

<p><strong>ID:</strong> {{ $livro->id }}</p>
<p><strong>Título:</strong> {{ $livro->titulo }}</p>
<p><strong>Autor:</strong> {{ $livro->autor }}</p>
<p><strong>Gênero:</strong> {{ $livro->genero }}</p>
<p><strong>Formato:</strong> {{ ucfirst($livro->formato) }}</p>
<p><strong>Preço:</strong> R$ {{ number_format($livro->preco, 2, ',', '.') }}</p>
<p><strong>Sinopse:</strong> {{ $livro->sinopse }}</p>
<p><strong>Avaliação:</strong> {{ $livro->avaliacao }} / 5</p>
<p><strong>Lançamento:</strong> {{ $livro->lancamento }}</p>
<p><strong>Vendas:</strong> {{ $livro->vendas }}</p>
<p><strong>Editora:</strong> {{ $livro->editora }}</p>
<p><strong>Quantidade:</strong> {{ $livro->quantidade }}</p>
<p><strong>Número de Páginas:</strong> {{ $livro->numeroDePaginas }}</p>

<!-- Exibindo a imagem -->
@if($livro->imagem)
<p><strong>Imagem:</strong></p>
<img src="{{ asset('storage/' . $livro->imagem) }}" alt="Imagem do livro" style="max-width: 200px; max-height: 300px;">
@endif

<a href="{{ route('livros.edit', $livro->id) }}">Editar</a> |
<a href="{{ route('livros.index') }}">Voltar</a>