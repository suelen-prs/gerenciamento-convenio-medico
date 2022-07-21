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
    <h1>Relatório de Cobranças em Aberto</h1>
    <hr>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Plano</th>
                    <th>Valor</th>
                    <th>Cidade</th>
                    <th>Mês - Ano</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($cobrancas as $cobranca)
            @if($cobranca->confirma_pagamento->pago == 'Em aberto')
                <tr>
                    <td>{{$cobranca->cliente->codigo}}</td>
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
