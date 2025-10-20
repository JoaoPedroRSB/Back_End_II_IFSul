<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'cpf',
        'rg',
        'data_nascimento',
        'cidade',
        'estado',
        'tipo',
        'nome_livraria',
        'email_livraria',
        'cnpj',
        'celular_contato',
    ];

    protected $hidden = ['senha'];

    // Relação com livros criados
    public function livros()
    {
        return $this->hasMany(Livros::class, 'criado_por');
    }

    // Relação com compras realizadas
    public function compras()
    {
        return $this->hasMany(Compras::class, 'id_usuario');
    }

    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = bcrypt($value);
    }
}
