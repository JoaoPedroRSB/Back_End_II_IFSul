<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioUpdateResource extends JsonResource
{
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'nome' => $this->nome,
      'email' => $this->email,
      'tipo' => $this->tipo,
      'updated_at' => $this->updated_at,
    ];
  }
}
