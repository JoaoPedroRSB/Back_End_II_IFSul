<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [

      // Usuário
      'nome' => 'required|string|max:100',
      'email' => 'required|email|unique:usuarios,email',
      'senha' => 'required|string|min:6',
      'cpf' => 'required|string|max:14|unique:usuarios,cpf',
      'rg' => 'nullable|string|max:20',
      'data_nascimento' => 'nullable|date',
      'cidade' => 'nullable|string|max:100',
      'estado' => 'nullable|string|max:2',
      'tipo' => 'required|in:usuariocomum,donodalivraria',

      // Apenas se for donodalivraria
      'nome_livraria' => 'required_if:tipo,donodalivraria|string|max:150|unique:usuarios,nome_livraria',
      'email_livraria' => 'required_if:tipo,donodalivraria|email|max:150|unique:usuarios,email_livraria',
      'cnpj' => 'required_if:tipo,donodalivraria|string|max:18|unique:usuarios,cnpj',
      'celular_contato' => 'required_if:tipo,donodalivraria|string|max:20',
    ];
  }

  public function messages()
  {
    return [
      'email.unique' => 'Email já está cadastrado.',
      'cpf.unique' => 'CPF já está cadastrado.',
      'email_livraria.unique' => 'Email da livraria já está cadastrado.',
      'cnpj.unique' => 'CNPJ já está cadastrado.',
      'nome_livraria.unique' => 'Nome da livraria já está cadastrado.',
    ];
  }
}
