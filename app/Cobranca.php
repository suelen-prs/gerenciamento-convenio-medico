<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobranca extends Model
{
    protected $fillable = ['pagamento', 'ano', 'cliente_id', 'periodo_id', 'confirma_pagamento_id'];

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function confirma_pagamento()
    {
        return $this->belongsTo(ConfirmaPagamento::class);
    }
}
