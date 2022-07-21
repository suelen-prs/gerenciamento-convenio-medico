<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfirmaPagamento extends Model
{
    protected $fillable = ['pago'];

    public function cobrancas()
    {
        return $this->hasMany(Cobranca::class);
    }
}
