<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompraRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'id_livro' => 'required|exists:livros,id',
      'quantidade' => 'required|integer|min:1',
      'formato' => 'required|in:fisico,digital',
      'preco_unitario' => 'required|numeric|min:0',
      'total' => 'sometimes|numeric|min:0',
      'endereco' => 'required|string|max:255',
      'forma_pagamento' => 'required|in:cartao,boleto,pix',
    ];
  }
}
