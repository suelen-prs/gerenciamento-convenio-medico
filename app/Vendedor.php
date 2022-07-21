<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $fillable = ['nome', 'rg', 'cpf', 'data_nascimento', 'contato'];

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
    public function endereco_vendedor()
    {
        return $this->hasOne(EnderecoVendedor::class);
    }
}
