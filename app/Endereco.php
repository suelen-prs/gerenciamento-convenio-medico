<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['rua', 'numero', 'complemento', 'bairro'];

    public function cliente()
    {
        return $this->belongsTo(Cliete::class);
    }
}
