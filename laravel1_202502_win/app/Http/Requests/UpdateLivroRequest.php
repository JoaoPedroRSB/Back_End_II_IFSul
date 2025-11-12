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
      'titulo' => 'required|string|max:255',
      'autor' => 'required|string|max:255',
      'genero' => 'nullable|string|max:100',
      'colecao' => 'nullable|string|max:100',
      'formato' => 'required|in:fisico,digital',
      'quantidade' => 'nullable|integer|min:0',
      'numeroDePaginas' => 'nullable|integer|min:1',
      'editora' => 'nullable|string|max:100',
      'imagem' => 'nullable|image|max:2048',
      'sinopse' => 'nullable|string',
      'preco' => 'required|numeric|min:0',
      'lancamento' => 'nullable|date',
    ];
  }
}
