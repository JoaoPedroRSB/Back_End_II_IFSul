<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
  public function authorize()
  {
    // Se tiver auth, ajuste; por enquanto permitimos
    return true;
  }

  public function rules()
  {
    return [
      'nome' => 'required|string|max:100',
      'email' => 'required|email|unique:usuarios,email',
      'senha' => 'required|string|min:6',
      'cpf' => 'required|string|max:14',
      'rg' => 'nullable|string|max:20',
      'data_nascimento' => 'nullable|date',
      'cidade' => 'nullable|string|max:100',
      'estado' => 'nullable|string|max:2',
      'tipo' => 'nullable|in:usuariocomum,donodalivraria',
      'nome_livraria' => 'nullable|string|max:150',
      'email_livraria' => 'nullable|email|max:150',
      'cnpj' => 'nullable|string|max:18',
      'celular_contato' => 'nullable|string|max:20',
    ];
  }
}
