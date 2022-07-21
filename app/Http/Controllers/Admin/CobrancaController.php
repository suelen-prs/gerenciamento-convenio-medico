<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cobranca;
use App\Cliente;
use App\Periodo;
use App\ConfirmaPagamento;
use App\Vencimento;
use Barryvdh\DomPDF\Facade\Pdf;

class CobrancaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cobrancas = Cobranca::orderBy('confirma_pagamento_id', 'asc')->get();
        //$cobrancas = Cobranca::orderBy('confirma_pagamento_id', 'asc')->simplePaginate(3);
        /* $clientes = Cliente::orderBy('nome')->get();
        $vencimentos = Vencimento::all(); */


        // Filtro de vencimento
        if($request->vencimento_id)
        {
            $cobrancas->where('vencimento_id', $request->vencimento_id);

        }

        // filtro de cliente
        if($request->clientes)
        {
            $cobrancas->where('cliente', 'like', "%$request->cliente%");
        }

      //  $cobrancas = $cobrancas->get();

        return view('admin.cobrancas.index', compact('cobrancas'/* , 'vencimentos', 'clientes' */));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $periodos = Periodo::all();
        $confirma_pagamentos = ConfirmaPagamento::all();
        $action = route('admin.cobrancas.store');
        return view('admin.cobrancas.form', compact('action', 'clientes', 'periodos', 'confirma_pagamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        Cobranca::create($request->all());

        $request->session()->flash('sucesso', "Cobrança cadastrada com sucesso");
        return redirect()->route('admin.cobrancas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cobranca = Cobranca::find($id);

        $pdf = Pdf::loadView('admin.cobrancas.show', compact('cobranca'));


        return $pdf->setPaper('a4')->stream('Cobranca.pdf');

        //return view('admin.cobrancas.show', compact('cobranca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cobranca = Cobranca::find($id);

        $clientes = Cliente::all();
        $periodos = Periodo::all();
        $confirma_pagamentos = ConfirmaPagamento::all();
        $action = route('admin.cobrancas.update', $cobranca->id);
        return view('admin.cobrancas.form', compact('cobranca', 'action', 'clientes', 'periodos', 'confirma_pagamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cobranca = Cobranca::find($id);
        $cobranca->update($request->all());

        $request->session()->flash('sucesso', "Cobranca $request->nome alterada com sucesso!");
        return redirect()->route('admin.cobrancas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Cobranca::destroy($id);
        $request->session()->flash('sucesso', 'Cobranca excluída com sucesso');
        return redirect()->route('admin.cobrancas.index');
    }

    public function cobrancas_aberto()
    {
        $cobrancas = Cobranca::orderBy('cliente_id', 'asc')->get();

        $pdf = Pdf::loadView('admin.cobrancas.cobrancas_abertas', compact('cobrancas'));

        return $pdf->setPaper('a4')->stream('Cobranca.pdf');

    }

    public function cobrancas_recibo_aberto()
    {
        $cobrancas = Cobranca::orderBy('cliente_id', 'asc')->get();

        $pdf = Pdf::loadView('admin.cobrancas.cobranca_recibo_aberto', compact('cobrancas'));

        return $pdf->setPaper('a4')->stream('Cobranca.pdf');

    }
}
