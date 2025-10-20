<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\ComprasController;

// Rota padrão de boas-vindas
Route::get('/', function () {
    return view('welcome');
});

// Rota simples de teste
Route::get('/ola', function () {
    echo "Olá, Mundo!";
});

// Rotas de CRUD para Usuários
Route::resource('usuarios', UsuarioController::class);

// Rotas de CRUD para Livros
Route::resource('livros', LivrosController::class);

// Rotas de CRUD para Compras
Route::resource('compras', ComprasController::class);
