<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cobrador;
use App\EnderecoCobrador;
use App\Http\Requests\CobradorRequest;

class CobradorController extends Controller
{

    public function index()
    {
        $cobradors = Cobrador::all();
        return view('admin.cobradors.index', compact('subtitulo', 'cobradors'));
    }


    public function create()
    {
        $action = route('admin.cobradores.store');
        return view('admin.cobradors.form', compact('action'));
    }


    public function store(CobradorRequest $request)
    {
        DB::beginTransaction();

        $cobrador = Cobrador::create($request->all());
        $cobrador->endereco_cobrador()->create($request->all());

        DB::commit();

        $request->session()->flash('sucesso', "Cobrador(a) $request->nome incluido com sucesso");
        return redirect()->route('admin.cobradores.index');
    }


    public function edit($id)
    {
        $cobrador = Cobrador::find($id);
        $action = route('admin.cobradores.update', $cobrador->id);
        return view('admin.cobradors.form', compact('cobrador', 'action'));

    }


    public function update(CobradorRequest $request, $id)
    {
        $cobrador = Cobrador::find($id);

        DB::beginTransaction();
        $cobrador->update($request->all());
        $cobrador->endereco_cobrador->update($request->all());

        DB::commit();

        $request->session()->flash('sucesso', "Cobrador(a) $request->nome alterado com sucesso!");
        return redirect()->route('admin.cobradores.index');
    }


    public function destroy(Request $request, $id)
    {
        $cobrador = Cobrador::find($id);

        DB::beginTransaction();

        $cobrador->endereco_cobrador->delete();

        $cobrador->delete();

        DB::commit();

        $request->session()->flash('sucesso', 'Cobrador(a) excluído com sucesso');
        return redirect()->route('admin.cobradores.index');
    }
}
