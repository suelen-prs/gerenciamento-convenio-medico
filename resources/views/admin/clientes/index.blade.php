@extends('layouts.app')

@section('content')

   <section class="section">

    <table class="highlight">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Contato</th>
                <th>Cidade</th>
                <th>Plano</th>
                <th>Vencimento</th>
                <th class="right-align">Opções</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente)
                <tr>
                    <td>{{$cliente->codigo}}</td>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->cpf}}</td>
                    <td>{{$cliente->data_nascimento}}</td>
                    <td>{{$cliente->contato}}</td>
                    <td>{{$cliente->cidade->nome}}</td>
                    <td>{{$cliente->plano->nome}}</td>
                    <td>{{$cliente->vencimento->dia}}</td>
                    <td class="right-align">
                        {{-- Ver --}}
                        <a href="{{route('admin.clientes.show', $cliente->id)}}" title="ver">
                            <span>
                                <i class="material-icons indigo-text text-darken-2">remove_red_eye</i>
                            </span>
                        </a>

                        {{-- Editar --}}
                        <a href="{{route('admin.clientes.edit', $cliente->id)}}" title="editar">
                            <span>
                                <i class="material-icons blue-text text-accent-2">edit</i>
                            </span>
                        </a>

                        {{-- Remover --}}
                        <form action="{{route('admin.clientes.destroy', $cliente->id)}}" method="POST" style="display: inline">
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
        </tbody>
            @empty
                <tr>
                    <td colspan="4">Não exite clientes cadastrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <hr>
        <div>
            <a href="{{route('admin.clientes.lista-clientes')}}" class="btn-flat waves-effect">Lista de Clientes</a>
        </div>

       <div class="fixed-action-btn">
           <a href="{{route('admin.clientes.create')}}" class="btn-floating btn-larger waves-effect wave-light">
               <i class="larger material-icons">add</i>
           </a>
       </div>
   </section>



@endsection

