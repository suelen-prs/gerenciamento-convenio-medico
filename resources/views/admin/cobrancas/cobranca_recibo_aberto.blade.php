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
</head>
    <body>
        @foreach ($cobrancas as $cobranca)
            @if($cobranca->confirma_pagamento->pago == 'Em aberto')
                <table border="1">
                    <thead>
                        <tr>
                            <th>Recibo</th>
                            <th>Recibo Descont' Saúde {{$cobranca->cliente->cidade->nome}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p> <strong>Cliente: {{$cobranca->cliente->nome}}</strong><br>
                                    {{$cobranca->cliente->endereco->rua}}, {{$cobranca->cliente->endereco->numero}} - {{$cobranca->cliente->endereco->bairro}} - {{$cobranca->cliente->cidade->nome}} <br>
                                    Contato {{$cobranca->cliente->contato}}<br>
                                    Vencimento: {{$cobranca->cliente->vencimento->dia}}/ {{$cobranca->periodo->nome}} / {{$cobranca->ano}}<br>
                                    Até vencimento R${{number_format($cobranca->cliente->plano->valor, 2, ',', '.')}}<br>
                                    Após 05 dias: R${{number_format($cobranca->cliente->plano->valor +2 , 2, ',', '.')}}<br>
                                    Cobrador: {{$cobranca->cliente->cobrador->nome}}
                                </p>
                            </td>
                            <td>
                                <p> <strong>Cliente: {{$cobranca->cliente->nome}}</strong><br>
                                    Plano: {{$cobranca->cliente->plano->nome}}<br>
                                    Vencimento: {{$cobranca->cliente->vencimento->dia}}/ {{$cobranca->periodo->nome}} / {{$cobranca->ano}}<br>
                                    Até vencimento R${{number_format($cobranca->cliente->plano->valor, 2, ',', '.')}}<br>
                                    Após 05 dias: R${{number_format($cobranca->cliente->plano->valor +2 , 2, ',', '.')}}<br>
                                    Cobrador: {{$cobranca->cliente->cobrador->nome}} <br>
                                    <strong>Válido como identificação em toda rede Descont' Saúde</strong>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <br>
            @endif
        @endforeach
    </body>
</html>
