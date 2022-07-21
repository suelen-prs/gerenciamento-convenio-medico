<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobrador extends Model
{
    protected $fillable = ['nome', 'rg', 'cpf', 'data_nascimento', 'contato', 'endereco_cobrador_id'];

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
    public function endereco_cobrador()
    {
        return $this->hasOne(EnderecoCobrador::class);
    }
}
