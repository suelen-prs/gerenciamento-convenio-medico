<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable = ['nome'];

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
}
