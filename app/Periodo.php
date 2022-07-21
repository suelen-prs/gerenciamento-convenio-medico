<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $fillable = ['nome'];

    public function cobrancas()
    {
        return $this->hasMany(Cobranca::class);
    }
}
