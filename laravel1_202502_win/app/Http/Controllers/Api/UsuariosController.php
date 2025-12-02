<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Http\Resources\UsuarioStoreResource;
use App\Http\Resources\UsuarioUpdateResource;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
  /**
   * POST - Criar usuário (PÚBLICO)
   */
  public function store(StoreUsuarioRequest $request)
  {
    $dados = $request->validated();

    $usuario = Usuario::create($dados);

    return new UsuarioStoreResource($usuario);
  }

  /**
   * GET - Listar usuários (PÚBLICO)
   */
  public function index()
  {
    return UsuarioStoreResource::collection(Usuario::all());
  }

  /**
   * GET - Mostrar um usuário específico (PÚBLICO)
   */
  public function show(Usuario $usuario)
  {
    return new UsuarioStoreResource($usuario);
  }

  /**
   * PUT - Atualizar usuário
   * (somente o próprio usuário)
   */
  public function update(UpdateUsuarioRequest $request, Usuario $usuario)
  {
    $user = Auth::user();

    if ($user->id !== $usuario->id) {
      return response()->json(['erro' => 'Acesso negado.'], 403);
    }

    $dados = $request->validated();

    $usuario->update($dados);

    return new UsuarioUpdateResource($usuario);
  }

  /**
   * DELETE - Remover usuário
   * (somente o próprio usuário OU admin)
   */
  public function destroy(Usuario $usuario)
  {
    $user = Auth::user();

    if ($user->id !== $usuario->id && $user->tipo !== 'donodalivraria') {
      return response()->json(['erro' => 'Acesso negado.'], 403);
    }

    $usuario->delete();

    return response()->json(['mensagem' => 'Usuário removido com sucesso!'], 200);
  }
}
