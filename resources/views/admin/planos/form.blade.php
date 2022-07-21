@extends('layouts.app')

@section('content')

    <section class="section">

        <form action="{{$action}}" method="POST">
            @csrf
            @isset($plano)
                @method('PUT')
            @endisset
            <div class="input-field col s12">
                <div class="for-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{old('nome', $plano->nome ?? '')}}">
                    @error('nome')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <div class="input-field col s12">
                <div class="for-group">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" id="valor" value="{{old('valor', $plano->valor ?? '')}}">
                    @error('valor')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <div class="right-align">
                <a href="{{route('admin.planos.index')}}" class="btn-flat waves-effect">Cancelar</a>
                <button type="submit" class="btn waves-effect waves-light">Salvar</button>

            </div>

        </form>
    </section>
@endsection
