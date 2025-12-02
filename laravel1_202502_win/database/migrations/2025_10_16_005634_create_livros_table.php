<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();  // Cria a chave primária auto-incrementada
            $table->string('titulo');  // Título do livro
            $table->string('autor');  // Autor do livro
            $table->string('genero');  // Gênero do livro
            $table->string('colecao')->nullable();  // Coleção do livro, se houver
            $table->enum('formato', ['fisico', 'digital']);  // Formato do livro (fisico ou digital)
            $table->integer('quantidade')->default(0);  // Quantidade em estoque
            $table->integer('numeroDePaginas');  // Número de páginas
            $table->string('editora');  // Editora do livro
            $table->string('imagem')->nullable();  // Caminho da imagem (opcional)
            $table->text('sinopse');  // Sinopse do livro
            $table->decimal('preco', 8, 2);  // Preço do livro
            $table->date('lancamento');  // Data de lançamento
            $table->integer('vendas')->default(0);  // Número de vendas
            $table->decimal('avaliacao', 2, 1)->default(0);  // Avaliação (0 a 5)
            $table->foreignId('criado_por')->constrained('usuarios');  // Relacionamento com o usuário
            $table->timestamps();  // Cria os campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
