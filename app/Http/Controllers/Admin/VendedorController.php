<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Vendedor;
use App\Cliente;
use App\EnderecoVendedor;
use App\Http\Requests\VendedorRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class VendedorController extends Controller
{

    public function index()
    {
        $vendedors = Vendedor::all();
        return view('admin.vendedors.index', compact('subtitulo', 'vendedors'));
    }


    public function create()
    {
        $action = route('admin.vendedores.store');
        return view('admin.vendedors.form', compact('action'));
    }


    public function store(VendedorRequest $request)
    {
        DB::beginTransaction();

        $vendedor = Vendedor::create($request->all());
        $vendedor->endereco_vendedor()->create($request->all());

        DB::commit();

        $request->session()->flash('sucesso', "Vendedor(a) $request->nome incluido com sucesso");
        return redirect()->route('admin.vendedores.index');
    }


    public function edit($id)
    {
        $vendedor = Vendedor::find($id);
        $action = route('admin.vendedores.update', $vendedor->id);
        return view('admin.vendedors.form', compact('vendedor', 'action'));

    }


    public function update(VendedorRequest $request, $id)
    {
        $vendedor = Vendedor::find($id);

        DB::beginTransaction();

        $vendedor->update($request->all());
        $vendedor->endereco_vendedor->update($request->all());

        DB::commit();

        $request->session()->flash('sucesso', "Vendedor(a) $request->nome alterado com sucesso!");
        return redirect()->route('admin.vendedores.index');
    }


    public function destroy(Request $request, $id)
    {
        $vendedor = Vendedor::find($id);

        DB::beginTransaction();

        $vendedor->endereco_vendedor->delete();

        $vendedor->delete();

        DB::commit();

        $request->session()->flash('sucesso', 'Vendedor(a) excluído com sucesso');
        return redirect()->route('admin.vendedores.index');
    }

    public function relatorio()
    {
        $clientes = Cliente::all();
        $vendedors = Vendedor::all();
        $count = 0;

        if ($clientes->vendedor_id == $vendedor->nome){
            $count = $clientes->vencimento_id->count();
        }

        $pdf = Pdf::loadView('admin.vendedores.relatorio', compact('clientes', 'vendedors',' count'));

        return $pdf->setPaper('a4')->stream('relatorio_comissao_vendedor.pdf');

    }
}
