<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UsuariosController as UsuariosApiController;
use App\Http\Controllers\Api\LivrosController as LivrosApiController;
use App\Http\Controllers\Api\ComprasController as ComprasApiController;

Route::prefix('v1')->group(function () {

  /*
    |--------------------------------------------------------------------------
    | Rotas Públicas (sem autenticação)
    |--------------------------------------------------------------------------
    */

  // Login
  Route::post('login', [AuthController::class, 'login'])->name('auth.login');

  // Cadastro de usuário
  Route::post('usuarios', [UsuariosApiController::class, 'store'])
    ->name('usuarios.store');

  // Leituras públicas
  Route::get('usuarios', [UsuariosApiController::class, 'index'])
    ->name('usuarios.index');

  Route::get('usuarios/{usuario}', [UsuariosApiController::class, 'show'])
    ->name('usuarios.show');

  // LIVROS — públicos para todos (logados ou não)
  Route::get('livros', [LivrosApiController::class, 'index'])
    ->name('livros.index');

  Route::get('livros/{livro}', [LivrosApiController::class, 'show'])
    ->name('livros.show');

  // COMPRAS — somente leitura é pública
  Route::get('compras', [ComprasApiController::class, 'index'])
    ->name('compras.index');

  Route::get('compras/{compra}', [ComprasApiController::class, 'show'])
    ->name('compras.show');

  /*
    |--------------------------------------------------------------------------
    | Rotas Protegidas (Sanctum)
    |--------------------------------------------------------------------------
    */
  Route::middleware('auth:sanctum')->group(function () {

    /*
        |--------------------------------------------------------------------------
        | Controle de Autenticação
        |--------------------------------------------------------------------------
        */
    Route::post('logout', [AuthController::class, 'logout'])
      ->name('auth.logout');

    Route::post('logout-all', [AuthController::class, 'logoutAll'])
      ->name('auth.logout.all');

    /*
        |--------------------------------------------------------------------------
        | Usuários — somente o próprio pode editar/deletar
        |--------------------------------------------------------------------------
        */
    Route::put('usuarios/{usuario}', [UsuariosApiController::class, 'update'])
      ->name('usuarios.update');

    Route::delete('usuarios/{usuario}', [UsuariosApiController::class, 'destroy'])
      ->name('usuarios.destroy');

    /*
        |--------------------------------------------------------------------------
        | Livros — DONO DA LIVRARIA
        |-----------------------------------------------------------------------
        */

    Route::post('livros', [LivrosApiController::class, 'store'])
      ->name('livros.store');

    Route::put('livros/{livro}', [LivrosApiController::class, 'update'])
      ->name('livros.update');

    Route::delete('livros/{livro}', [LivrosApiController::class, 'destroy'])
      ->name('livros.destroy');

    /*
        |--------------------------------------------------------------------------
        | Compras — qualquer usuário LOGADO pode comprar/editar/cancelar
        |--------------------------------------------------------------------------
        */

    Route::post('compras', [ComprasApiController::class, 'store'])
      ->name('compras.store');

    Route::put('compras/{compra}', [ComprasApiController::class, 'update'])
      ->name('compras.update');

    Route::delete('compras/{compra}', [ComprasApiController::class, 'destroy'])
      ->name('compras.destroy');
  });
});
