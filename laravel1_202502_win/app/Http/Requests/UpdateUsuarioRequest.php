<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    $usuarioId = $this->route('usuario')->id ?? null;

    return [
      'nome' => 'required|string|max:100',
      'email' => ['required', 'email', Rule::unique('usuarios', 'email')->ignore($usuarioId)],
      'senha' => 'nullable|string|min:6',
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
