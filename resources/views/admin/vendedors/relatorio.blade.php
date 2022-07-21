<html>
    <style>
        table{
            background-color: #fefefe;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%
        }
        table td,
        table th{
            border:1px solid #ccc;
        }
        table th{
            font-weight: bold;
            background-color: #eee;
            padding: 10px;
            text-align: center;
        }
    </style>
    <h1>Relatório Comissão Vendedor</h1>
    <hr>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Vendas</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($clientes as $cliente)
            @if($cobranca->confirma_pagamento->pago == 'Em aberto')
                <tr>
                    <td>{{$cliente->vendedor->nome}}</td>
                    <td>{{$cobranca->cliente->nome}}</td>
                    <td>{{$cobranca->cliente->plano->nome}}</td>
                    <td>R$ {{number_format($cobranca->cliente->plano->valor, '2', ',', '.')}}</td>
                    <td>{{$cobranca->cliente->cidade->nome}}</td>
                    <td>{{$cobranca->periodo->nome}}/{{$cobranca->ano}}</td>
                </tr>
            @endif
        @endforeach
            </tbody>
        </table>



    <hr>
</html>
