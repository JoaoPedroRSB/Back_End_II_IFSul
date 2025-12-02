<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLivroRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'titulo' => 'required|string|max:255',
      'autor' => 'required|string|max:255',
      'genero' => 'required|string|max:255',
      'sinopse' => 'required|string|max:5000',
      'colecao' => 'nullable|string|max:255',
      'formato' => 'required|in:fisico,digital',
      'quantidade' => 'required|integer|min:0',
      'numeroDePaginas' => 'required|integer|min:1',
      'editora' => 'required|string|max:255',
      'preco' => 'required|numeric|min:0',
      'lancamento' => 'required|date',
      'avaliacao' => 'numeric|min:0|max:5',
      'vendas' => 'integer|min:0',
      'imagem' => 'nullable|string|max:255',
    ];
  }
}
