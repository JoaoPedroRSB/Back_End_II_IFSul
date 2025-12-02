<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a criação da tabela 'usuarios'.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('email', 150)->unique();
            $table->string('senha');
            $table->string('cpf', 14)->unique();
            $table->string('rg', 20)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('cidade', 100)->nullable();
            $table->string('estado', 2)->nullable();
            $table->enum('tipo', ['usuariocomum', 'donodalivraria'])->default('usuariocomum');

            // Campos exclusivos apenas para donodalivraria
            $table->string('nome_livraria', 150)->nullable();
            $table->string('email_livraria', 150)->nullable();
            $table->string('cnpj', 18)->nullable();
            $table->string('celular_contato', 20)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverte a criação da tabela 'usuarios'.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
