<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompraRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'id_livro' => 'sometimes|exists:livros,id',
      'quantidade' => 'sometimes|integer|min:1',
      'formato' => 'sometimes|in:fisico,digital',
      'preco_unitario' => 'sometimes|numeric|min:0',
      'total' => 'sometimes|numeric|min:0',
      'endereco' => 'sometimes|string|max:255',
      'forma_pagamento' => 'sometimes|in:cartao,boleto,pix',
    ];
  }
}
