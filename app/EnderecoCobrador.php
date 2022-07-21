<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnderecoCobrador extends Model
{
    protected $fillable = ['cobrador_id', 'rua', 'numero', 'complemento', 'bairro'];

    public function cobrador()
    {
        return $this->belongsTo(Cobrador::class);
    }
}
