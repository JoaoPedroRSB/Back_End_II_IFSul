<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
  // LOGIN
  public function login(Request $request)
  {
    $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required']
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
      return response()->json(['erro' => 'Credenciais inválidas'], 401);
    }

    // Definição de habilidades do usuário
    $abilities = [$user->habilidade]; // ex: admin, editor, leitor

    $token = $user->createToken('api_token', $abilities)->plainTextToken;

    return response()->json([
      'mensagem' => 'Login realizado com sucesso!',
      'token' => $token,
      'abilities' => $abilities
    ]);
  }

  // LOGOUT (apenas token atual)
  public function logout(Request $request)
  {
    $request->user()->currentAccessToken()->delete();

    return response()->json(['mensagem' => 'Logout realizado. Token revogado.']);
  }

  // REVOGAR TODOS OS TOKENS DO USUÁRIO
  public function logoutAll(Request $request)
  {
    $request->user()->tokens()->delete();

    return response()->json(['mensagem' => 'Todos os tokens foram revogados.']);
  }
}
