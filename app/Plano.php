<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $fillable = ['nome', 'valor'];

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
}
