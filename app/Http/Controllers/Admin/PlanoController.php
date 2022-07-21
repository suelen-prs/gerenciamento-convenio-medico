<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Plano;
use App\Http\Requests\PlanoRequest;

class PlanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtitulo = 'Planos';
        $planos = Plano::all();
        return view('admin.planos.index', compact('subtitulo', 'planos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.planos.store');
        return view('admin.planos.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanoRequest $request)
    {
        Plano::create($request->all('nome', 'valor'));
        $request->session()->flash('sucesso', "Plano $request->nome incluido com sucesso");
        return redirect()->route('admin.planos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plano = Plano::find($id);
        $action = route('admin.planos.update', $plano->id);
        return view('admin.planos.form', compact('plano', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanoRequest $request, $id)
    {
        $plano = Plano::find($id);
        $plano->update($request->all());

        $request->session()->flash('sucesso', "Plano $request->nome alterada com sucesso!");
        return redirect()->route('admin.planos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Plano::destroy($id);
        $request->session()->flash('sucesso', 'Plano excluído com sucesso');
        return redirect()->route('admin.planos.index');
    }
}
