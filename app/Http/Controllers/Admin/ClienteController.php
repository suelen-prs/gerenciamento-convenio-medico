<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ClienteRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Cliente;
use App\Cidade;
use App\Plano;
use App\Cobrador;
use App\Vendedor;
use App\Vencimento;
use App\Endereco;
use App\Dependente;
use App\User;


class ClienteController extends Controller
{
    public function index()
    {
        $user = User::all();
        $clientes = Cliente::all();
        $count = $clientes->count();

        //dd($clientes);
        return view('admin.clientes.index', compact('clientes', 'user', 'count'));
    }

    public function create()
    {
        $cidades = Cidade::all();
        $planos = Plano::all();
        $cobradors = Cobrador::all();
        $vendedors = Vendedor::all();
        $vencimentos = Vencimento::all();

        $action = route('admin.clientes.store');
        return view('admin.clientes.form', compact('action', 'cidades', 'planos', 'cobradors', 'vendedors', 'vencimentos'));
    }

    public function store(ClienteRequest $request)
    {
        DB::beginTransaction();

        $cliente = Cliente::create($request->all());
        $cliente->endereco()->create($request->all());
        $cliente->dependente()->create($request->all());

        DB::commit();

        $request->session()->flash('sucesso', "Cliente incluido com sucesso");
        return redirect()->route('admin.clientes.index');
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);

        return view('admin.clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);

        $cidades = Cidade::all();
        $planos = Plano::all();
        $cobradors = Cobrador::all();
        $vendedors = Vendedor::all();
        $vencimentos = Vencimento::all();

        $action = route('admin.clientes.update', $cliente->id);
        return view('admin.clientes.form', compact('cliente', 'action', 'cidades', 'planos', 'cobradors', 'vendedors', 'vencimentos'));
    }

    public function update(ClienteRequest $request, $id)
    {
        $cliente = Cliente::find($id);

        DB::beginTransaction();

        $cliente->update($request->all());
        $cliente->endereco->update($request->all());
        $cliente->dependente->update($request->all());

        DB::commit();

        $request->session()->flash('sucesso', "Cliente atualizado com sucesso");
        return redirect()->route('admin.clientes.index');
    }

    public function destroy(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        DB::beginTransaction();

        $cliente->endereco->delete();

        $cliente->dependente->delete();

        $cliente->delete();

        DB::commit();

        $request->session()->flash('sucesso', "Cliente excluido com sucesso");
        return redirect()->route('admin.clientes.index');


    }
    public function lista_clientes()
    {
        $clientes = Cliente::orderBy('nome', 'asc')->get();

        $pdf = Pdf::loadView('admin.clientes.lista_clientes', compact('clientes'));

        return $pdf->setPaper('a4', 'landscape')->stream('Lista_de_clientes.pdf');
    }
}
