@extends('layouts.app')

@section('content')

    <section class="section">

        <form action="{{$action}}" method="POST">
            @csrf
            @isset($vencimento)
                @method('PUT')
            @endisset
            <div class="input-field col s12">
                <div class="for-group">
                    <label for="dia">Data</label>
                    <input type="text" name="dia" id="dia" value="{{old('dia', $vencimento->dia ?? '')}}">
                    @error('nome')
                        <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <div class="right-align">
                <a href="{{route('admin.vencimentos.index')}}" class="btn-flat waves-effect">Cancelar</a>
                <button type="submit" class="btn waves-effect waves-light">Salvar</button>

            </div>

        </form>
    </section>
@endsection
