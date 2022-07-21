<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vencimento extends Model
{
    protected $fillable = ['dia'];

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
}
