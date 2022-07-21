<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Cidade;
use App\Vendedor;
use App\Cobrador;
use App\Cobranca;
use App\Plano;
use App\Vencimento;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $clientes = Cliente::all();
        $cidades = Cidade::all();
        $vendedores = Vendedor::all();
        $cobradores = Cobrador::all();
        $cobrancas = Cobranca::all();
        $planos = Plano::all();
        $vencimentos = Vencimento::all();

        $count_clientes = $clientes->count();
        $count_cidades = $cidades->count();
        $count_vendedores = $vendedores->count();
        $count_cobradores = $cobradores->count();
        $count_cobrancas = $cobrancas->count();
        $count_planos = $planos->count();
        $count_vencimentos = $vencimentos->count();

        /* foreach($cobrancas as $cobranca) {
            if($cobranca->confirma_pagamento->pago == "Em aberto")
              echo $cobranca->confirma_pagamento->pago->count();
         } */
         //return $cobranca->confirma_pagamento->pago;
        // dd($$cobranca->confirma_pagamento->count());

        return view('admin.inicial.index', compact('count_clientes', 'count_cidades', 'count_vendedores', 'count_cobradores', 'count_cobrancas', 'count_planos'));
    }
}
