<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Livros;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;

class LivrosController extends Controller
{
  public function index()
  {
    return Livros::all();
  }

  public function show($id)
  {
    return Livros::findOrFail($id);
  }

  public function store(StoreLivroRequest $request)
  {
    try {
      if (!$request->user()->tokenCan('livros-manage')) {
        return response()->json(['erro' => 'Ação não autorizada (livros-manage necessário)'], 403);
      }

      $dados = $request->validated();

      // Definir campos obrigatórios internamente
      $dados['criado_por'] = $request->user()->id;
      $dados['vendas'] = $dados['vendas'] ?? 0;
      $dados['avaliacao'] = $dados['avaliacao'] ?? 0.0;

      // Se enviar imagem, faz upload; se não enviar, ignora
      if ($request->hasFile('imagem')) {
        $dados['imagem'] = $request->file('imagem')->store('livros', 'public');
      } else {
        // Permitir deixar null sem quebrar
        $dados['imagem'] = null;
      }

      $livro = Livros::create($dados);

      return response()->json([
        'mensagem' => 'Livro cadastrado com sucesso',
        'livro' => $livro
      ], 201);
    } catch (\Exception $e) {
      return response()->json([
        'erro' => 'Erro ao adicionar livro',
        'mensagem' => $e->getMessage(),
        'trace' => $e->getTraceAsString()
      ], 500);
    }
  }

  public function update(UpdateLivroRequest $request, $id)
  {
    if (!$request->user()->tokenCan('livros-manage')) {
      return response()->json(['erro' => 'Ação não autorizada'], 403);
    }

    $livro = Livros::findOrFail($id);
    $dados = $request->validated();

    // Garantir consistência
    $dados['vendas'] = $dados['vendas'] ?? $livro->vendas;
    $dados['avaliacao'] = $dados['avaliacao'] ?? $livro->avaliacao;

    // Upload da imagem somente se enviada
    if ($request->hasFile('imagem')) {
      $dados['imagem'] = $request->file('imagem')->store('livros', 'public');
    }

    // Caso NÃO envie imagem no update → mantém a atual
    if (!isset($dados['imagem'])) {
      $dados['imagem'] = $livro->imagem;
    }

    $livro->update($dados);

    return response()->json([
      'mensagem' => 'Livro atualizado com sucesso',
      'livro' => $livro
    ]);
  }

  public function destroy(Request $request, $id)
  {
    if (!$request->user()->tokenCan('livros-manage')) {
      return response()->json(['erro' => 'Ação não autorizada'], 403);
    }

    $livro = Livros::findOrFail($id);
    $livro->delete();

    return response()->json(['mensagem' => 'Livro excluído com sucesso']);
  }
}
