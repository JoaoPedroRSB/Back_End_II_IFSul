<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompraStoreResource extends JsonResource
{
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'id_usuario' => $this->id_usuario,
      'id_livro' => $this->id_livro,
      'quantidade' => $this->quantidade,
      'formato' => $this->formato,
      'preco_unitario' => $this->preco_unitario,
      'total' => $this->total,
      'data_compra' => $this->data_compra,
      'endereco' => $this->endereco,
      'forma_pagamento' => $this->forma_pagamento,
      'created_at' => $this->created_at,
    ];
  }
}
