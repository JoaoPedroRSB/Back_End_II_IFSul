<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    use HasFactory;

    protected $table = 'livros'; // Garantir que estamos utilizando a tabela correta.

    protected $fillable = [
        'titulo',
        'autor',
        'genero',
        'colecao',
        'formato',
        'quantidade',
        'numeroDePaginas',
        'editora',
        'imagem',
        'sinopse',
        'preco',
        'lancamento',
        'vendas',
        'avaliacao',
        'criado_por', // Supondo que isso esteja relacionado a um usuário
    ];

    // Caso tenha um relacionamento com o usuário, por exemplo, o dono do livro
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'criado_por');
    }
}
