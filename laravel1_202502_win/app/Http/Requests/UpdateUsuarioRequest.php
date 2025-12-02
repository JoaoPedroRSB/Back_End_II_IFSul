<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [

      'nome' => 'sometimes|string|max:100',
      'email' => 'sometimes|email|unique:usuarios,email,' . $this->usuario->id,
      'senha' => 'sometimes|string|min:6',
      'cpf' => 'sometimes|string|max:14|unique:usuarios,cpf,' . $this->usuario->id,
      'rg' => 'sometimes|string|max:20',
      'data_nascimento' => 'sometimes|date',
      'cidade' => 'sometimes|string|max:100',
      'estado' => 'sometimes|string|max:2',
      'tipo' => 'prohibited',

      // Campos da livraria (somente donos)
      'nome_livraria' => 'sometimes|string|max:150|unique:usuarios,nome_livraria,' . $this->usuario->id,
      'email_livraria' => 'sometimes|email|max:150|unique:usuarios,email_livraria,' . $this->usuario->id,
      'cnpj' => 'sometimes|string|max:18|unique:usuarios,cnpj,' . $this->usuario->id,
      'celular_contato' => 'sometimes|string|max:20',
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
