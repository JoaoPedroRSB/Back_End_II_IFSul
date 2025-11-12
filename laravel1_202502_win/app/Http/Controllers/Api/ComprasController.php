<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use App\Http\Resources\CompraStoreResource;
use App\Http\Resources\CompraUpdateResource;
use App\Models\Compras;

class ComprasController extends Controller
{
  // POST - Criar compra
  public function store(StoreCompraRequest $request)
  {
    $dados = $request->validated();

    // Calcula o total automaticamente, se não enviado
    if (empty($dados['total'])) {
      $dados['total'] = $dados['quantidade'] * $dados['preco_unitario'];
    }

    // Adiciona a data atual
    $dados['data_compra'] = now();

    $compra = Compras::create($dados);
    return new CompraStoreResource($compra);
  }

  // PUT - Atualizar compra
  public function update(UpdateCompraRequest $request, Compras $compra)
  {
    $dados = $request->validated();

    // Atualiza total se quantidade/preço forem alterados
    if (empty($dados['total']) && isset($dados['quantidade']) && isset($dados['preco_unitario'])) {
      $dados['total'] = $dados['quantidade'] * $dados['preco_unitario'];
    }

    $compra->update($dados);
    return new CompraUpdateResource($compra);
  }

  // DELETE - Remover compra
  public function destroy(Compras $compra)
  {
    $compra->delete();
    return response()->json(['mensagem' => 'Compra removida com sucesso!'], 200);
  }
}
