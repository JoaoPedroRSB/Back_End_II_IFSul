<h1>Editar Livro</h1>

<form action="{{ route('livros.update', $livro->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  {{-- Título --}}
  <label for="titulo">Título:</label><br>
  <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $livro->titulo) }}" required><br><br>

  {{-- Autor --}}
  <label for="autor">Autor:</label><br>
  <input type="text" id="autor" name="autor" value="{{ old('autor', $livro->autor) }}" required><br><br>

  {{-- Gênero --}}
  <label for="genero">Gênero:</label><br>
  <input type="text" id="genero" name="genero" value="{{ old('genero', $livro->genero) }}"><br><br>

  {{-- Coleção --}}
  <label for="colecao">Coleção:</label><br>
  <input type="text" id="colecao" name="colecao" value="{{ old('colecao', $livro->colecao) }}"><br><br>

  {{-- Formato --}}
  <label for="formato">Formato:</label><br>
  <select id="formato" name="formato">
    <option value="fisico" @if(old('formato', $livro->formato) == 'fisico') selected @endif>Físico</option>
    <option value="digital" @if(old('formato', $livro->formato) == 'digital') selected @endif>Digital</option>
  </select><br><br>

  {{-- Quantidade --}}
  <label for="quantidade">Quantidade em estoque:</label><br>
  <input type="number" id="quantidade" name="quantidade" min="0" value="{{ old('quantidade', $livro->quantidade) }}" required><br><br>

  {{-- Número de páginas --}}
  <label for="numeroDePaginas">Número de Páginas:</label><br>
  <input type="number" id="numeroDePaginas" name="numeroDePaginas" min="1" value="{{ old('numeroDePaginas', $livro->numeroDePaginas) }}"><br><br>

  {{-- Editora --}}
  <label for="editora">Editora:</label><br>
  <input type="text" id="editora" name="editora" value="{{ old('editora', $livro->editora) }}"><br><br>

  {{-- Sinopse --}}
  <label for="sinopse">Sinopse:</label><br>
  <textarea id="sinopse" name="sinopse" rows="4" cols="50">{{ old('sinopse', $livro->sinopse) }}</textarea><br><br>

  {{-- Lançamento --}}
  <label for="lancamento">Data de Lançamento:</label><br>
  <input type="date" id="lancamento" name="lancamento" min="0" max="2100" value="{{ old('lancamento', $livro->lancamento) }}"><br><br>

  {{-- Preço --}}
  <label for="preco">Preço (R$):</label><br>
  <input type="number" step="0.01" id="preco" name="preco" value="{{ old('preco', $livro->preco) }}" required><br><br>

  {{-- Imagem atual --}}
  <label>Imagem Atual:</label><br>
  @if($livro->imagem)
  <img src="{{ asset('storage/'.$livro->imagem) }}" alt="Imagem do livro" width="100"><br>
  @else
  <p>Nenhuma imagem cadastrada.</p>
  @endif
  <br>

  {{-- Nova imagem --}}
  <label for="imagem">Nova Imagem:</label><br>
  <input type="file" id="imagem" name="imagem" accept="image/*"><br><br>

  {{-- Botões --}}
  <button type="submit">Atualizar</button>
  <a href="{{ route('livros.index') }}">Cancelar</a>
</form>