<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompraUpdateResource extends JsonResource
{
  public function toArray($request)
  {
    return [
      'mensagem' => 'Compra atualizada com sucesso!',
      'dados' => [
        'id' => $this->id,
        'usuario' => $this->usuario->nome ?? 'Anônimo',
        'livro' => $this->livro->titulo ?? 'Livro não encontrado',
        'quantidade' => $this->quantidade,
        'total' => number_format($this->total, 2, ',', '.'),
        'endereco' => $this->endereco,
        'forma_pagamento' => $this->forma_pagamento,
        'updated_at' => $this->updated_at,
      ],
    ];
  }
}
