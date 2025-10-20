<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_livro');
            $table->integer('quantidade');
            $table->string('formato');
            $table->decimal('preco_unitario', 10, 2);
            $table->decimal('total', 10, 2);
            $table->date('data_compra');
            $table->string('endereco');
            $table->string('forma_pagamento');
            $table->timestamps();

            // Definindo as chaves estrangeiras
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_livro')->references('id')->on('livros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
