<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsuariosController as UsuariosApiController;
use App\Http\Controllers\Api\LivrosController as LivrosApiController;
use App\Http\Controllers\Api\ComprasController as ComprasApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aqui é ficam as rotas da API, organizadas por versão (v1).
| A atividade 4 exige apenas POST, PUT e DELETE, mas as rotas GET
| foram incluídas para facilitar os testes no Postman.
|
*/

Route::get('/', function () {
  return response()->json([
    'mensagem' => 'API Laravel v1 está online 🚀',
    'versao' => '1.0'
  ]);
});

Route::prefix('v1')->group(function () {

  /*
    |--------------------------------------------------------------------------
    | Rotas de Usuários
    |--------------------------------------------------------------------------
    */
  Route::get('usuarios', [UsuariosApiController::class, 'index'])->name('usuarios.index');
  Route::get('usuarios/{usuario}', [UsuariosApiController::class, 'show'])->name('usuarios.show');
  Route::post('usuarios', [UsuariosApiController::class, 'store'])->name('usuarios.store');
  Route::put('usuarios/{usuario}', [UsuariosApiController::class, 'update'])->name('usuarios.update');
  Route::delete('usuarios/{usuario}', [UsuariosApiController::class, 'destroy'])->name('usuarios.destroy');

  /*
    |--------------------------------------------------------------------------
    | Rotas de Livros
    |--------------------------------------------------------------------------
    */
  Route::get('livros', [LivrosApiController::class, 'index'])->name('livros.index');
  Route::get('livros/{livro}', [LivrosApiController::class, 'show'])->name('livros.show');
  Route::post('livros', [LivrosApiController::class, 'store'])->name('livros.store');
  Route::put('livros/{livro}', [LivrosApiController::class, 'update'])->name('livros.update');
  Route::delete('livros/{livro}', [LivrosApiController::class, 'destroy'])->name('livros.destroy');

  /*
    |--------------------------------------------------------------------------
    | Rotas de Compras
    |--------------------------------------------------------------------------
    */
  Route::get('compras', [ComprasApiController::class, 'index'])->name('compras.index');
  Route::get('compras/{compra}', [ComprasApiController::class, 'show'])->name('compras.show');
  Route::post('compras', [ComprasApiController::class, 'store'])->name('compras.store');
  Route::put('compras/{compra}', [ComprasApiController::class, 'update'])->name('compras.update');
  Route::delete('compras/{compra}', [ComprasApiController::class, 'destroy'])->name('compras.destroy');
});
