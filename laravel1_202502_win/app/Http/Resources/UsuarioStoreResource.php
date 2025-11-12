<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioStoreResource extends JsonResource
{
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'nome' => $this->nome,
      'email' => $this->email,
      'tipo' => $this->tipo,
      'created_at' => $this->created_at,
    ];
  }
}
