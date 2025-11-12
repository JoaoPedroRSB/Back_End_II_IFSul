<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LivroStoreResource extends JsonResource
{
  public function toArray($request)
  {
    return [
      'mensagem' => 'Livro cadastrado com sucesso!',
      'dados' => [
        'id' => $this->id,
        'titulo' => $this->titulo,
        'autor' => $this->autor,
        'genero' => $this->genero,
        'colecao' => $this->colecao,
        'formato' => $this->formato,
        'quantidade' => $this->quantidade,
        'numeroDePaginas' => $this->numeroDePaginas,
        'editora' => $this->editora,
        'preco' => $this->preco,
        'lancamento' => $this->lancamento,
        'created_at' => $this->created_at,
      ],
    ];
  }
}
