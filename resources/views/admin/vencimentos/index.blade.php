@extends('layouts.app')

@section('content')

    <section class="section">
        <table class="highlight">
            <thead>
                <tr>
                    <th>Vencimentos</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($vencimentos as $vencimento)
                    <tr>
                        <td>{{$vencimento->dia}}</td>
                        <td class="right-align">

                            <a href="{{route('admin.vencimentos.edit', $vencimento->id)}}">
                                <span>
                                    <i class="material-icons blue-text text-accent-2">edit</i>
                                </span>
                            </a>


                            <form action="{{route('admin.vencimentos.destroy', $vencimento->id)}}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')

                                <button style="border:0;background:transparent;" type="submit">
                                    <span style="cursor: pointer">
                                        <i class="material-icons red-text text-accent-3">delete_forever</i>
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">Não há vencimentos cadastrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="fixed-action-btn">
            <a href="{{route('admin.vencimentos.create')}}" class="btn-floating btn-large waves-effect waves-light">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </section>

@endsection

