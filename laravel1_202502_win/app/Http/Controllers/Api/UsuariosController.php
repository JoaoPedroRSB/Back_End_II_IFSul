<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Http\Resources\UsuarioStoreResource;
use App\Http\Resources\UsuarioUpdateResource;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
  // POST - Criar usuário
  public function store(StoreUsuarioRequest $request)
  {
    $usuario = Usuario::create($request->validated());
    return new UsuarioStoreResource($usuario);
  }

  // PUT - Atualizar usuário
  public function update(UpdateUsuarioRequest $request, Usuario $usuario)
  {
    $usuario->update($request->validated());
    return new UsuarioUpdateResource($usuario);
  }

  // DELETE - Remover usuário
  public function destroy(Usuario $usuario)
  {
    $usuario->delete();
    return response()->json(['mensagem' => 'Usuário removido com sucesso!'], 200);
  }
}
