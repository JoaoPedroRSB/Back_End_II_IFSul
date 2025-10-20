<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;

    protected $table = 'compras';

    protected $fillable = [
        'id_usuario',
        'id_livro',
        'quantidade',
        'formato',
        'preco_unitario',
        'total',
        'data_compra',
        'endereco',
        'forma_pagamento'
    ];

    // Relação com o usuário (quem comprou)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    // Relação com o livro (qual livro foi comprado)
    public function livro()
    {
        return $this->belongsTo(Livros::class, 'id_livro');
    }
}
