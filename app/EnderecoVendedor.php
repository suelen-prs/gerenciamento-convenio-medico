<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnderecoVendedor extends Model
{
    protected $fillable = ['rua', 'numero', 'complemento', 'bairro'];

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class);
    }

}
