<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use App\Http\Resources\CompraStoreResource;
use App\Http\Resources\CompraUpdateResource;
use App\Models\Compras;
use Illuminate\Support\Facades\Auth;

class ComprasController extends Controller
{
  public function index()
  {
    // opcional: se quiser que só admin veja todas, pode checar tipo aqui
    return CompraStoreResource::collection(Compras::all());
  }

  public function show(Compras $compra)
  {
    return new CompraStoreResource($compra);
  }

  public function store(StoreCompraRequest $request)
  {
    $dados = $request->validated();

    // força id_usuario para o usuário autenticado
    $dados['id_usuario'] = Auth::id();

    if (empty($dados['total'])) {
      $dados['total'] = $dados['quantidade'] * $dados['preco_unitario'];
    }

    $dados['data_compra'] = now();

    $compra = Compras::create($dados);
    return new CompraStoreResource($compra);
  }

  public function update(UpdateCompraRequest $request, Compras $compra)
  {
    $user = Auth::user();

    // Verifica se o usuário logado é o dono da compra ou admin da livraria
    if ($compra->id_usuario !== $user->id && $user->tipo !== 'donodalivraria') {
      return response()->json(['erro' => 'Acesso negado.'], 403);
    }

    $dados = $request->validated();

    // Verifica se quantidade ou preco_unitario foram modificados
    if (isset($dados['quantidade']) || isset($dados['preco_unitario'])) {
      // Se a quantidade ou preço unitário mudaram, recalcula o total
      $dados['total'] = (isset($dados['quantidade']) ? $dados['quantidade'] : $compra->quantidade) *
        (isset($dados['preco_unitario']) ? $dados['preco_unitario'] : $compra->preco_unitario);
    }

    // Atualiza a compra com os novos dados
    $compra->update($dados);

    // Retorna o recurso de resposta
    return new CompraUpdateResource($compra);
  }

  public function destroy(Compras $compra)
  {
    $user = Auth::user();

    if ($compra->id_usuario !== $user->id && $user->tipo !== 'donodalivraria') {
      return response()->json(['erro' => 'Acesso negado.'], 403);
    }

    $compra->delete();
    return response()->json(['mensagem' => 'Compra removida com sucesso!'], 200);
  }
}
