<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LivroUpdateResource extends JsonResource
{
  public function toArray($request)
  {
    return [
      'mensagem' => 'Livro atualizado com sucesso!',
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
        'updated_at' => $this->updated_at,
      ],
    ];
  }
}
