@extends('layouts.app')

@section('content')

    <section class="section">

        <form action="{{$action}}" method="POST">
            @csrf
            @isset($cobranca)
                @method('PUT')
            @endisset

            <div class="row">
                {{-- Cliente --}}
                <div class="input-field col s6">
                    <div class="form-group">
                        <label for="cliente_id">Cliente</label>
                        <select name="cliente_id" id="cliente_id" class="form-control">
                            <option value="" disabled selected>Selecione um cliente</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{$cliente->id}}"{{old('cliente_id', $cobranca->cliente->id  ?? '') == $cliente->id ? 'selected' : ''}}>{{$cliente->nome}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                {{-- Mês --}}
                <div class="input-field col s6">
                    <div class="form-group">
                        <label for="periodo_id">Mês</label>
                        <select name="periodo_id" id="periodo_id" class="form-control">
                            <option value="" disabled selected>Selecione o mês</option>
                                @foreach ($periodos as $periodo)
                                    <option value="{{$periodo->id}}"{{old('periodo_id', $cobranca->periodo->id  ?? '') == $periodo->id ? 'selected' : ''}}>{{$periodo->nome}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- Ano --}}
                <div class="input-field col s6">
                    <div class="for-group">
                        <label for="ano">Ano</label>
                        <input type="text" name="ano" id="ano" value="{{old('ano', $cobranca->ano ?? '')}}">
                        @error('ano')
                            <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                        @enderror
                    </div>
                </div>
                {{-- Status Pagamento --}}
                <div class="input-field col s4">
                    <div class="form-group">
                        <label for="confirma_pagamento_id">Cliente</label>
                        <select name="confirma_pagamento_id" id="confirma_pagamento_id" class="form-control">
                            <option value="" disabled selected>Status do pagamento</option>
                                @foreach ($confirma_pagamentos as $confirma_pagamento)
                                    <option value="{{$confirma_pagamento->id}}"{{old('cliente_id', $cobranca->confirma_pagamento->id ?? '') == $confirma_pagamento->id ? 'selected' : ''}}>{{$confirma_pagamento->pago}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="right-align">
                <a href="{{route('admin.cobrancas.index')}}" class="btn-flat waves-effect">Cancelar</a>
                <button type="submit" class="btn waves-effect waves-light">Salvar</button>

            </div>

        </form>
    </section>
@endsection
