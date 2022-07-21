<html>
    <style>
        table{
            background-color: #fefefe;

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
    <h1>Relatório de Clientes Cadastrados</h1>
    <hr>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>RG</th>
                    <th>CPF</th>
                    <th>Data de Nasc</th>
                    <th>Contato</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                    <th>Plano</th>
                    <th>Vencimento</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($clientes as $cliente)
            <tr>
                <td>{{$cliente->codigo}}</td>
                <td>{{$cliente->nome}}</td>
                <td>{{$cliente->rg}}</td>
                <td>{{$cliente->cpf}}</td>
                <td>{{$cliente->data_nascimento}}</td>
                <td>{{$cliente->contato}}</td>
                <td>{{$cliente->endereco->rua}}, {{$cliente->endereco->numero}} {{$cliente->endereco->bairro}}</td>
                <td>{{$cliente->cidade->nome}}</td>
                <td>{{$cliente->plano->nome}} - R$ {{number_format($cliente->plano->valor, '2',',','.')}}</td>
                <td>{{$cliente->vencimento->dia}}</td>
            </tr>
        @endforeach
            </tbody>
        </table>



    <hr>
</html>
