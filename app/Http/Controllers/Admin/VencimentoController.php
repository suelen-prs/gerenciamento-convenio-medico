<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Vencimento;

class VencimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vencimentos = Vencimento::all();

        return view('admin.vencimentos.index', compact('subtitulo', 'vencimentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.vencimentos.store');
        return view('admin.vencimentos.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Vencimento::create($request->all());

        $request->session()->flash('sucesso', "Vencimento incluido com sucesso");
        return redirect()->route('admin.vencimentos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vencimento = Vencimento::find($id);
        $action = route('admin.vencimentos.update', $vencimento->id);
        return view('admin.vencimentos.form', compact('vencimento', 'action'));
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
        $vencimento = Vencimento::find($id);
        $vencimento->update($request->all());

        $request->session()->flash('sucesso', "Vencimento alterado com sucesso!");
        return redirect()->route('admin.vencimentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Vencimento::destroy($id);
        $request->session()->flash('sucesso', 'Vencimento excluído com sucesso');
        return redirect()->route('admin.vencimentos.index');
    }
}
