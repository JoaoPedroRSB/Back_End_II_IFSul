<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    use HasFactory;

    protected $table = 'livros';

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
        'criado_por',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'criado_por');
    }
}
