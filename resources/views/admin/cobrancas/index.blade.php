@extends('layouts.app')

@section('content')

{{-- Filtro de Pesquisa --}}
{{-- <section class="section">
    <form action="{{route('admin.cobrancas.index')}}" method="GET">
        <div class="row valign-wrapper">
            <div class="input-field col s6">

                <select name="vencimento_id" id="vencimento">
                    <option value=""> Selecione um Vencimento</option>

                    @foreach ($clientes as $cliente)
                        <option value="{{$cliente->vencimento}}">{{$cliente->vencimento->dia}}</option>
                    @endforeach

                </select>
            </div>

            <div class="input-field col s6">
                <input type="text" name="cliente" id="cliente">
                <label for="cliente">Cliente</label>
            </div>

        </div>

        <div class="row right-align">
            <a href="{{route('admin.cobrancas.index')}}" class="btn-flat waves-effect">
                Exibir Todos
            </a>
            <button type="submit" class="btn waves-effect waves-light">
                Pesquisar
            </button>
        </div>
    </form>
</section>

<hr/> --}}

{{-- Lista de Cobranças --}}
    <section class="section">
        <table class="highlight">
            <thead>
                <h5>Cobranças</h5>
                <tr>
                    <th>Nome</th>
                    <th>Vencimento</th>
                    <th>Mês</th>
                    <th>Ano</th>
                    <th>Status Pagamento</th>

                    <th class="right-align">Opções</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($cobrancas as $cobranca)
                    <tr>
                        <td>{{$cobranca->cliente->nome}}</td>
                        <td>{{$cobranca->cliente->vencimento->dia}}</td>
                        <td>{{$cobranca->periodo->nome}}</td>
                        <td>{{$cobranca->ano}}</td>
                        <td>{{$cobranca->confirma_pagamento->pago}}</td>
                        <td class="right-align">

                                {{-- Ver --}}
                            @if($cobranca->confirma_pagamento->pago == "Em aberto")
                                <a href="{{route('admin.cobrancas.show', $cobranca->id)}}" title="cobrança">
                                    <span>
                                        <i class="material-icons indigo-text text-darken-2">assignment</i>
                                    </span>
                                </a>
                            @else
                                <a href=""></a>
                            @endif

                                {{-- Editar --}}
                            <a href="{{route('admin.cobrancas.edit', $cobranca->id)}}" title="editar">
                                <span>
                                    <i class="material-icons blue-text text-accent-2">edit</i>
                                </span>
                            </a>

                                {{-- Remover --}}
                            <form action="{{route('admin.cobrancas.destroy', $cobranca->id)}}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')

                                <button style="border:0;background:transparent;" type="submit"title="remover">
                                    <span style="cursor: pointer">
                                        <i class="material-icons red-text text-accent-3">delete_forever</i>
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="2">Não há cobrancas cadastrados</td>
                        </tr>
                    @endforelse
            </tbody>

        </table>
        {{-- <hr>

        <div class="col s4 light-blue lighten-1 !important">
            {{$cobrancas->links()}}
        </div> --}}

        <hr>
        <div>
            <a href="{{route('admin.cobrancas.cobranca-aberto')}}" class="btn-flat waves-effect">Lista de clientes com cobrança em aberto</a>
        </div>
        <div>
            <a href="{{route('admin.cobrancas.cobranca-recibo-aberto')}}" class="btn-flat waves-effect">Lista de cobranças/recibos em aberto</a>
        </div>
        <div class="fixed-action-btn">
            <a href="{{route('admin.cobrancas.create')}}" class="btn-floating btn-large waves-effect waves-light">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </section>

@endsection

