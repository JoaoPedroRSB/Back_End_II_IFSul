<div class="container">
  <h2>Cadastrar Novo Livro</h2>

  <!-- Exibe mensagens de erro ou sucesso -->
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('livros.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Campo para Título -->
    <div class="form-group">
      <label for="titulo">Título</label>
      <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
    </div>
    <br>

    <!-- Campo para Autor -->
    <div class="form-group">
      <label for="autor">Autor</label>
      <input type="text" class="form-control" id="autor" name="autor" value="{{ old('autor') }}" required>
    </div>
    <br>

    <!-- Campo para Gênero -->
    <div class="form-group">
      <label for="genero">Gênero</label>
      <input type="text" class="form-control" id="genero" name="genero" value="{{ old('genero') }}">
    </div>
    <br>

    <!-- Campo para Coleção -->
    <div class="form-group">
      <label for="colecao">Coleção</label>
      <input type="text" class="form-control" id="colecao" name="colecao" value="{{ old('colecao') }}">
    </div>
    <br>

    <!-- Campo para Formato -->
    <div class="form-group">
      <label for="formato">Formato</label>
      <select class="form-control" id="formato" name="formato" required>
        <option value="fisico" {{ old('formato') == 'fisico' ? 'selected' : '' }}>Físico</option>
        <option value="digital" {{ old('formato') == 'digital' ? 'selected' : '' }}>Digital</option>
      </select>
    </div>
    <br>

    <!-- Campo para Quantidade -->
    <div class="form-group">
      <label for="quantidade">Quantidade</label>
      <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ old('quantidade', 0) }}" required>
    </div>
    <br>

    <!-- Campo para Número de Páginas -->
    <div class="form-group">
      <label for="numeroDePaginas">Número de Páginas</label>
      <input type="number" class="form-control" id="numeroDePaginas" name="numeroDePaginas" value="{{ old('numeroDePaginas') }}">
    </div>
    <br>

    <!-- Campo para Editora -->
    <div class="form-group">
      <label for="editora">Editora</label>
      <input type="text" class="form-control" id="editora" name="editora" value="{{ old('editora') }}">
    </div>
    <br>

    <!-- Campo para Imagem -->
    <div class="form-group">
      <label for="imagem">Imagem</label>
      <input type="file" class="form-control-file" id="imagem" name="imagem">
    </div>
    <br>

    <!-- Campo para Sinopse -->
    <div class="form-group">
      <label for="sinopse">Sinopse</label>
      <textarea class="form-control" id="sinopse" name="sinopse" rows="4">{{ old('sinopse') }}</textarea>
    </div>
    <br>

    <!-- Campo para Preço -->
    <div class="form-group">
      <label for="preco">Preço</label>
      <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="{{ old('preco') }}" required>
    </div>
    <br>

    <!-- Campo para Data de Lançamento -->
    <div class="form-group">
      <label for="lancamento">Lançamento</label>
      <input type="date" class="form-control" id="lancamento" name="lancamento" value="{{ old('lancamento') }}">
    </div>
    <br>

    <!-- Campo para Vendas -->
    <div class="form-group">
      <label for="vendas">Vendas</label>
      <input type="number" class="form-control" id="vendas" name="vendas" value="{{ old('vendas', 0) }}">
    </div>
    <br>

    <!-- Campo para Avaliação -->
    <div class="form-group">
      <label for="avaliacao">Avaliação</label>
      <input type="number" step="0.1" max="5" class="form-control" id="avaliacao" name="avaliacao" value="{{ old('avaliacao', 0) }}">
    </div>
    <br>

    <button type="submit" class="btn btn-primary">Cadastrar Livro</button>
  </form>
</div>