<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['codigo', 'nome', 'rg', 'cpf', 'data_nascimento', 'contato', 'vencimento_id', 'cidade_id', 'plano_id', 'cobrador_id', 'endereco_id', 'vendedor_id', 'dependente_id'];



    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function plano()
    {
        return $this->belongsTo(Plano::class);
    }

    public function cobrador()
    {
        return $this->belongsTo(Cobrador::class);
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class);
    }

    public function dependente()
    {
        return $this->hasOne(Dependente::class);
    }

    public function cobrancas()
    {
        return $this->hasMany(Cobranca::class);
    }

    public function vencimento()
    {
        return $this->belongsTo(Vencimento::class);
    }
}
