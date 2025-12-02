<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'tipo', // usuariocomum ou donodalivraria
        'nome_livraria',
        'email_livraria',
        'cnpj',
        'celular_contato',
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

    /**
     * Mutator: sempre criptografar senha automaticamente
     */
    public function setSenhaAttribute($value)
    {
        if ($value) {
            $this->attributes['senha'] = bcrypt($value);
        }
    }

    /**
     * Abilities do Sanctum baseado no tipo de usuário
     */
    public function abilitiesFromTipo(): array
    {
        return $this->tipo === 'donodalivraria'
            ? ['admin']
            : ['user'];
    }

    /**
     * Relação com Livros
     */
    public function livros()
    {
        return $this->hasMany(Livros::class, 'criado_por');
    }

    /**
     * Relação com Compras
     */
    public function compras()
    {
        return $this->hasMany(Compras::class, 'id_usuario');
    }
}
