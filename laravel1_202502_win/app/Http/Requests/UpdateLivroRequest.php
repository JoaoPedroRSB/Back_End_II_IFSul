<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLivroRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'titulo' => 'sometimes|string|max:255',
      'autor' => 'sometimes|string|max:255',
      'genero' => 'sometimes|string|max:255',
      'sinopse' => 'sometimes|string|max:5000',
      'colecao' => 'sometimes|string|max:255',
      'formato' => 'sometimes|in:fisico,digital',
      'quantidade' => 'sometimes|integer|min:0',
      'numeroDePaginas' => 'sometimes|integer|min:1',
      'editora' => 'sometimes|string|max:255',
      'preco' => 'sometimes|numeric|min:0',
      'lancamento' => 'sometimes|date',
      'avaliacao' => 'sometimes|numeric|min:0|max:5',
      'vendas' => 'sometimes|integer|min:0',
      'imagem' => 'sometimes|string|max:255',
    ];
  }
}
