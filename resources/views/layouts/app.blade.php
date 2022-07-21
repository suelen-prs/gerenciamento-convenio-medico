<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Descont' Saúde</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- Chart.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        .form-group{
            padding: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 60px;">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}">Descont' Saúde</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            {{-- @auth --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link @if(request()->is('admin/clientes*')) active @endif" aria-current="page" href="{{route('admin.clientes.index')}}">Clientes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->is('admin/cobrancas*')) active @endif" aria-current="page" href="{{route('admin.cobrancas.index')}}">Cobranças</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->is('admin/cidades*')) active @endif" aria-current="page" href="{{route('admin.cidades.index')}}">Cidades</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->is('admin/cobradores*')) active @endif" aria-current="page" href="{{route('admin.cobradores.index')}}">Cobradores</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->is('admin/vendedores*')) active @endif" aria-current="page" href="{{route('admin.vendedores.index')}}">Vendedores</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->is('admin/planos*')) active @endif" aria-current="page" href="{{route('admin.planos.index')}}">Planos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(request()->is('admin/vencimentos*')) active @endif" aria-current="page" href="{{route('admin.vencimentos.index')}}">Vencimentos</a>
              </li>

            </ul>
            <div class="my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit();">Sair</a>
                        <form action="{{route('logout')}}" class="logout" method="POST" style="display: none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>

            {{-- @endauth --}}

          </div>
        </div>
      </nav>
    <div class="container">
        @include('flash::message')
        @yield('content')

    </div>
</body>
</html>
