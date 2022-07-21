<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Descont' Saúde</title>
</head>
<body>

    {{-- Menu Topo --}}
    <nav class="deep purple">
        <div class="container">
            <div class="nav-wrapper" >
                <a href="/" class="brand-logo">Descont' Saúde</a>
                <ul class="right">
                    <li><a href="{{route('admin.clientes.index')}}">Clientes</a></li>
                    <li><a href="{{route('admin.cobrancas.index')}}">Cobranças</a></li>
                    <li><a href="{{route('admin.planos.index')}}">Planos</a></li>
                    <li><a href="{{route('admin.cidades.index')}}">Cidades</a></li>
                    <li><a href="{{route('admin.cobradores.index')}}">Cobradores</a></li>
                    <li><a href="{{route('admin.vendedores.index')}}">Vendedores</a></li>
                    <li><a href="{{route('admin.vencimentos.index')}}">Vencimentos</a></li>
                    <li><a href="{{route('admin.relatorios.index')}}">Relatorios</a></li>

                </ul>
            </div>
        </div>
    </nav>

    {{--Conteudo Principal --}}
    <div class="container">
        @yield('conteudo-principal')
    </div>


    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        @if (session('sucesso'))
            M.toast({html: "{{session('sucesso')}}"});
        @endif

        document.addEventListener('DOMContentLoaded', function(){
            var elems = document.querySelectorAll('select')
            var instances = M.FormSelect.init(elems)
        });

    </script>

</body>
</html>
