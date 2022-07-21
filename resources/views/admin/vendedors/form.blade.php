@extends('layouts.app')

@section('content')

    <section class="section">

        <form action="{{$action}}" method="POST">
            @csrf
            @isset($vendedor)
                @method('PUT')
            @endisset

            <div class="row">
                <div class="input-field col s6">
                    <h4>Cadastro de Vendedores</h4>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <h6>Dados Pessoais</h6>
                    <hr>
                </div>
            </div>
            <div class="input-field col s12">
                <div class="for-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{old('nome', $vendedor->nome ?? '')}}">
                    @error('nome')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <div class="for-group">
                        <label for="rg">RG</label>
                        <input type="text" name="rg" id="rg" value="{{old('rg', $vendedor->rg ?? '')}}">
                        @error('rg')
                            <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                        @enderror
                    </div>
                </div>
                {{-- CPF --}}
                <div class="input-field col s3">
                    <div class="for-group">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" id="cpf" value="{{old('cpf', $vendedor->cpf ?? '')}}">
                        @error('cpf')
                            <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                        @enderror
                    </div>
                </div>
                {{-- Data de Nascimento --}}
                <div class="input-field col s3">
                    <div class="for-group">
                        <label for="data_nascimento">Data de Nascimento</label>
                        <input type="text" name="data_nascimento" id="data_nascimento" value="{{old('data_nascimento', $vendedor->data_nascimento ?? '')}}">
                        @error('data_nascimento')
                            <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                        @enderror
                    </div>
                </div>
                {{-- Contato --}}
                <div class="input-field col s3">
                    <div class="for-group">
                        <label for="contato">Contato</label>
                        <input type="text" name="contato" id="contato" value="{{old('contato', $vendedor->contato ?? '')}}">
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
                        <input type="text" name="rua" id="rua" value="{{old('rua', $vendedor->endereco_vendedor->rua ?? '')}}">
                        @error('rua')
                            <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                        @enderror
                    </div>
                </div>
                {{-- Número --}}
                <div class="input-field col s3">
                    <div class="for-group">
                        <label for="numero">Número</label>
                        <input type="text" name="numero" id="numero" value="{{old('numero', $vendedor->endereco_vendedor->numero ?? '')}}">
                        @error('numero')
                            <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                        @enderror
                    </div>
                </div>
                {{-- Complemento --}}
                <div class="input-field col s3">
                    <div class="for-group">
                        <label for="complemento">Complemento</label>
                        <input type="text" name="complemento" id="complemento" value="{{old('complemento', $vendedor->endereco_vendedor->complemento ?? '')}}">
                        @error('complemento')
                            <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                        @enderror
                    </div>
                </div>
                {{-- Bairro --}}
                <div class="input-field col s3">
                    <div class="for-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="bairro" value="{{old('bairro', $vendedor->endereco_vendedor->bairro ?? '')}}">
                        @error('bairro')
                            <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="right-align">
                <a href="{{route('admin.cobradores.index')}}" class="btn-flat waves-effect">Cancelar</a>
                <button type="submit" class="btn waves-effect waves-light">Salvar</button>

            </div>

        </form>
    </section>
@endsection
