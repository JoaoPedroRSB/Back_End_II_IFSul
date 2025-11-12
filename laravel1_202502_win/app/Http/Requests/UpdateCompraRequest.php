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
      'id_usuario' => 'nullable|exists:usuarios,id',
      'id_livro' => 'required|exists:livros,id',
      'quantidade' => 'required|integer|min:1',
      'formato' => 'required|in:fisico,digital',
      'preco_unitario' => 'required|numeric|min:0',
      'total' => 'nullable|numeric|min:0',
      'endereco' => 'nullable|string|max:255',
      'forma_pagamento' => 'required|in:cartao,boleto,pix',
    ];
  }
}
