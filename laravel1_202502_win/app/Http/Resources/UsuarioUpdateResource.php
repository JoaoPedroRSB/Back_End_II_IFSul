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
      'senha' => $this->senha,
      'cpf' => $this->cpf,
      'rg' => $this->rg,
      'data_nascimento' => $this->data_nascimento,
      'cidade' => $this->cidade,
      'estado' => $this->estado,
      'tipo' => $this->tipo,

      // Campos de donodalivraria
      'nome_livraria' => $this->when($this->tipo === 'donodalivraria', $this->nome_livraria),
      'email_livraria' => $this->when($this->tipo === 'donodalivraria', $this->email_livraria),
      'cnpj' => $this->when($this->tipo === 'donodalivraria', $this->cnpj),
      'celular_contato' => $this->when($this->tipo === 'donodalivraria', $this->celular_contato),
    ];
  }
}
