<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AuthController extends Controller
{
  /**
   * LOGIN (gera token com abilities)
   */
  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|string',
      'senha' => 'required|string'
    ]);

    $usuario = Usuario::where('email', $request->email)->first();

    if (!$usuario || !Hash::check($request->senha, $usuario->senha)) {
      return response()->json([
        'erro' => 'Credenciais inválidas'
      ], 401);
    }

    /**
     * DEFININDO AS ABILITIES
     */
    $abilities = [];

    if ($usuario->tipo === 'donodalivraria') {
      $abilities = ['livros-manage', 'livros-view'];
    } else {
      $abilities = ['livros-view'];
    }

    // Gera token com ABILITIES
    $token = $usuario->createToken('token_acesso', $abilities)->plainTextToken;

    return response()->json([
      'mensagem' => 'Login realizado com sucesso',
      'usuario' => $usuario,
      'token' => $token
    ]);
  }

  /**
   * LOGOUT (revoga o token atual)
   */
  public function logout(Request $request)
  {
    $request->user()->currentAccessToken()->delete();

    return response()->json([
      'mensagem' => 'Logout realizado com sucesso'
    ]);
  }

  /**
   * LOGOUT ALL (revoga todos os tokens do usuário)
   */
  public function logoutAll(Request $request)
  {
    $request->user()->tokens()->delete();

    return response()->json([
      'mensagem' => 'Todos os tokens foram revogados'
    ]);
  }
}
