<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Http\Resources\LivroStoreResource;
use App\Http\Resources\LivroUpdateResource;
use App\Models\Livros;
use Illuminate\Support\Facades\Storage;

class LivrosController extends Controller
{
  // POST - Criar livro
  public function store(StoreLivroRequest $request)
  {
    $dados = $request->validated();

    // Upload de imagem, se houver
    if ($request->hasFile('imagem')) {
      $path = $request->file('imagem')->store('imagens/livros', 'public');
      $dados['imagem'] = $path;
    }

    $livro = Livros::create($dados);
    return new LivroStoreResource($livro);
  }

  // PUT - Atualizar livro
  public function update(UpdateLivroRequest $request, Livros $livro)
  {
    $dados = $request->validated();

    // Se nova imagem for enviada, substitui
    if ($request->hasFile('imagem')) {
      // Deleta imagem anterior se existir
      if ($livro->imagem && Storage::disk('public')->exists($livro->imagem)) {
        Storage::disk('public')->delete($livro->imagem);
      }

      $path = $request->file('imagem')->store('imagens/livros', 'public');
      $dados['imagem'] = $path;
    }

    $livro->update($dados);
    return new LivroUpdateResource($livro);
  }

  // DELETE - Remover livro
  public function destroy(Livros $livro)
  {
    if ($livro->imagem && Storage::disk('public')->exists($livro->imagem)) {
      Storage::disk('public')->delete($livro->imagem);
    }

    $livro->delete();
    return response()->json(['mensagem' => 'Livro removido com sucesso!'], 200);
  }
}
