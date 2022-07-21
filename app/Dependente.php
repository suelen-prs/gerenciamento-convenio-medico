<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependente extends Model
{
    protected $fillable = ['nome1', 'nome2', 'nome3', 'nome4', 'nome5'];

    public function cliente()
    {
        return $this->belongsTo(Cliete::class);
    }
}
