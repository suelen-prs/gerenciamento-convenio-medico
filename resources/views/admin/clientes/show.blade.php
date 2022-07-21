@extends('layouts.app')

@section('content')

<style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: 0.3s;
      width: 100%;
    }

    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .container {
      padding: 2px 16px;
    }
    </style>

    <section class="section">

    <h4>Dados do Cliente</h4>

    <div class="card">
        <table class="highlight">
            <thead>
                <tr>
                    <th>Código: {{$cliente->codigo}}</th>
                    <th>Nome: {{$cliente->nome}}</th>
                    <th>CPF: {{$cliente->cpf}}</th>
                    <th>RG: {{$cliente->rg}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <th>Nascimento: {{$cliente->data_nascimento}}</th>
                    <th>Contato: {{$cliente->contato}}</th>

                </tr>
            </tbody>
        </table>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Rua: {{$cliente->endereco->rua}}</th>
                    @if($cliente->endereco->numero)
                    <th>Número: {{$cliente->endereco->numero}}</th>
                    @endif
                    <th>Bairro: {{$cliente->endereco->bairro}}</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    @if($cliente->endereco->complemento)
                    <th>Complemento: {{$cliente->endereco->complemento}}</th>
                    @endif
                    <th>Plano: {{$cliente->plano->nome}}</th>
                    <th>Valor: R$ {{number_format($cliente->plano->valor, '2', ',', '.')}}</th>
                    <th>Vencimento: todo dia {{$cliente->vencimento->dia}} de cada mês</th>
                </tr>
            </tbody>
        </table>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Vendedor: {{$cliente->vendedor->nome}}</th>
                    <th>Cobrador: {{$cliente->cobrador->nome}}</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    @if($cliente->dependente->nome1)
                    <th>Dependente: {{$cliente->dependente->nome1}}</th>
                    @endif
                    @if($cliente->dependente->nome2)
                    <th>Dependente: {{$cliente->dependente->nome2}}</th>
                    @endif
                    @if($cliente->dependente->nome3)
                    <th>Dependente: {{$cliente->dependente->nome3}}</th>
                    @endif
                    @if($cliente->dependente->nome4)
                    <th>Dependente: {{$cliente->dependente->nome4}}</th>
                    @endif
                    @if($cliente->dependente->nome4)
                    <th>Dependente: {{$cliente->dependente->nome4}}</th>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>





   {{--
        <span class="col s6">
            <h5>Vendedor</h5>
            <p>{{$cliente->vendedor->nome}}</p>
        </span>
    </div>






        <span class="col s3">
            <h5>Cobrador</h5>
            <p>{{$cliente->cobrador->nome}}</p>
        </span>
    </div> --}}

    <div class="right-align">
        <a href="{{url()->previous()}}" class="btn-flat waves-effect">Voltar</a>
    </div>


</section>
@endsection
