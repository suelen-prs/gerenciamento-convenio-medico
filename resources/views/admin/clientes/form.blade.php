@extends('layouts.app')

@section('content')

<section class="section">
    <form action="{{$action}}" method="POST">
        @csrf

        @isset($cliente)
            @method('PUT')
        @endisset

        <div class="row">
            <div class="input-field col s6">
                <h4>Cadastro de Cliente</h4>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <h6>Dados Pessoais</h6>
                <hr>
            </div>
        </div>
        {{-- Código --}}
        <div class="row">
            <div class="input-field col s4">
                <div class="for-group">
                    <label for="codigo">Código</label>
                    <input type="text" name="codigo" id="codigo" value="{{old('codigo', $cliente->codigo ?? '')}}">
                    @error('codigo')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            {{-- Nome --}}
            <div class="input-field col s8">
                <div class="for-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{old('nome', $cliente->nome ?? '')}}">
                    @error('nome')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
        </div>

        {{-- RG --}}
        <div class="row">
            <div class="input-field col s3">
                <div class="for-group">
                    <label for="rg">RG</label>
                    <input type="text" name="rg" id="rg" value="{{old('rg', $cliente->rg ?? '')}}">
                    @error('rg')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            {{-- CPF --}}
            <div class="input-field col s3">
                <div class="for-group">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" value="{{old('cpf', $cliente->cpf ?? '')}}">
                    @error('cpf')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            {{-- Data de Nascimento --}}
            <div class="input-field col s3">
                <div class="for-group">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input type="text" name="data_nascimento" id="data_nascimento" value="{{old('data_nascimento', $cliente->data_nascimento ?? '')}}">
                    @error('data_nascimento')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            {{-- Contato --}}
            <div class="input-field col s3">
                <div class="for-group">
                    <label for="contato">Contato</label>
                    <input type="text" name="contato" id="contato" value="{{old('contato', $cliente->contato ?? '')}}">
                    @error('contato')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <h6>Endereço</h6>
                <hr>
            </div>
        </div>
        {{-- Rua --}}
        <div class="row">
            <div class="input-field col s3">
                <div class="for-group">
                    <label for="rua">Rua</label>
                    <input type="text" name="rua" id="rua" value="{{old('rua', $cliente->endereco->rua ?? '')}}">
                    @error('rua')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            {{-- Número --}}
            <div class="input-field col s3">
                <div class="for-group">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" id="numero" value="{{old('numero', $cliente->endereco->numero ?? '')}}">
                    @error('numero')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            {{-- Complemento --}}
            <div class="input-field col s3">
                <div class="for-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" name="complemento" id="complemento" value="{{old('complemento', $cliente->endereco->complemento ?? '')}}">
                    @error('complemento')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            {{-- Bairro --}}
            <div class="input-field col s3">
                <div class="for-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" id="bairro" value="{{old('bairro', $cliente->endereco->bairro ?? '')}}">
                    @error('bairro')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <h6>Dados do Plano</h6>
                <hr>
            </div>
        </div>
        <div class="row">
            {{-- Cidade --}}
            <div class="input-field col s4">
                <div class="form-group">
                    <label for="cidade_id">Cidade</label>
                    <select name="cidade_id" id="cidade_id" class="form-control">
                        <option value="" disabled selected>Selecione a cidade</option>
                            @foreach ($cidades as $cidade)
                                <option value="{{$cidade->id}}"{{old('cidade_id', $cliente->cidade->id ?? '') == $cidade->id ? 'selected' : ''}}>{{$cidade->nome}}</option>
                            @endforeach
                    </select>
                    @error('cidade_id')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            {{-- Plano --}}
            <div class="input-field col s4">
                <div class="form-group">
                    <label for="plano_id">Plano</label>
                    <select name="plano_id" id="plano_id" class="form-control">
                        <option value="" disabled selected>Selecione o plano</option>
                            @foreach ($planos as $plano)
                                <option value="{{$plano->id}}"{{old('plano_id', $cliente->plano->id ?? '') == $plano->id ? 'selected' : ''}}>{{$plano->nome}}</option>
                            @endforeach
                    </select>
                    @error('plano_id')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            {{-- Vencimento --}}
            <div class="input-field col s4">
                <div class="form-group">
                    <label for="vencimento_id">Vencimento</label>
                    <select name="vencimento_id" id="vencimento_id" class="form-control">
                        <option value="" disabled selected>Selecione o vencimento</option>
                            @foreach ($vencimentos as $vencimento)
                                <option value="{{$vencimento->id}}"{{old('vencimento_id', $cliente->vencimento->id ?? '') == $vencimento->id ? 'selected' : ''}}>{{$vencimento->dia}}</option>
                            @endforeach
                    </select>
                    @error('vencimento_id')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            {{-- Vendedor --}}
            <div class="input-field col s6">
                <div class="form-group">
                    <label for="vendedor_id">Vendedor</label>
                    <select name="vendedor_id" id="vendedor_id" class="form-control">
                        <option value="" disabled selected>Selecione o vendedor</option>
                            @foreach ($vendedors as $vendedor)
                                <option value="{{$vendedor->id}}"{{old('vendedor_id', $cliente->vendedor->id ?? '') == $vendedor->id ? 'selected' : ''}}>{{$vendedor->nome}}</option>
                            @endforeach
                    </select>
                    @error('vendedor_id')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            {{-- Cobrador --}}
            <div class="input-field col s6">
                <div class="form-group">
                    <label for="cobrador_id">Cobrador</label>
                    <select name="cobrador_id" id="cobrador_id" class="form-control">
                        <option value="" disabled selected>Selecione o cobrador</option>
                            @foreach ($cobradors as $cobrador)
                                <option value="{{$cobrador->id}}"{{old('cobrador_id', $cliente->cobrador->id ?? '') == $cobrador->id ? 'selected' : ''}}>{{$cobrador->nome}}</option>
                            @endforeach
                    </select>
                    @error('cobrador_id')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <h6>Dependentes</h6>
                <hr>
            </div>
        </div>
        {{-- Dependente 1 --}}
        <div class="row">
            <div class="input-field col s6">
                <div class="for-group">
                    <label for="nome1">Nome</label>
                    <input type="text" name="nome1" id="nome1" value="{{old('nome1', $cliente->dependente->nome1 ?? '')}}">
                    @error('nome1')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            {{-- Dependente 2 --}}
            <div class="input-field col s6">
                <div class="for-group">
                    <label for="nome2">Nome</label>
                    <input type="text" name="nome2" id="nome2" value="{{old('nome2', $cliente->dependente->nome2 ?? '')}}">
                    @error('nome2')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
        </div>
        {{-- Dependente 3 --}}
        <div class="row">
            <div class="input-field col s6">
                <div class="for-group">
                    <label for="nome3">Nome</label>
                    <input type="text" name="nome3" id="nome3" value="{{old('nome3', $cliente->dependente->nome3 ?? '')}}">
                    @error('nome3')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            {{-- Dependente 4 --}}
            <div class="input-field col s6">
                <div class="for-group">
                    <label for="nome4">Nome</label>
                    <input type="text" name="nome4" id="nome4" value="{{old('nome4', $cliente->dependente->nome4 ?? '')}}">
                    @error('nome4')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
            </div>
        </div>
        {{-- Dependente 5 --}}
        <div class="row">
            <div class="input-field col s6">
                <div class="for-group">
                    <label for="nome5">Nome</label>
                    <input type="text" name="nome5" id="nome5" value="{{old('nome5', $cliente->dependente->nome5 ?? '')}}">
                    @error('nome5')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="right-align">
            <a href="{{route('admin.clientes.index')}}" class="btn-flat waves-effect">Cancelar</a>
            <button type="submit" class="btn waves-effect waves-light">Salvar</button>

        </div>
    </form>
</section>
@endsection
