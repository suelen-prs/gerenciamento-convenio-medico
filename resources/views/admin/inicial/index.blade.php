@extends('layouts.app')

@section('content')
    <style>
        .container-fluid img {
            width: 100%;
            height: 150%;

        }
    </style>

    <div class="bottom-50 flex justify-between" style="text-align: left">
        <h4>Dashboard</h4>
    </div>

    <hr>

    <div class="container-fluid ">
        <img src="{{ asset('img/banner-plano-saude.jpg') }}" alt="">
    </div>




    <div class="grid gcolumn-1x3fr gap-20 table--responsive__grid bottom-50">
        <div class="row">
            <div class="col s4">
                <div class="table--responsive table--responsive__dashboard bottom-50"
                    style="display:flex;align-items:center;flex-direction:column;">
                    <h4 style="font-size:100px;">{{ $count_cobradores }}</h4>
                    <h5>Cobradores Ativos</h5>
                </div>
            </div>
            <div class="col s4">
                <div class="table--responsive table--responsive__dashboard bottom-50"
                    style="display:flex;align-items:center;flex-direction:column;">
                    <h4 style="font-size:100px;">{{ $count_cidades }}</h4>
                    <h5>Cidades Cadastradas</h5>
                </div>
            </div>
            <div class="col s4">
                <div class="table--responsive table--responsive__dashboard bottom-50"
                    style="display:flex;align-items:center;flex-direction:column;">
                    <h4 style="font-size:100px;">{{ $count_vendedores }}</h4>
                    <h5>Vendedores Ativos</h5>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="input-field col s4">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb3"></h4>
                    <hr>
                    <div class="inbox-wid">
                        <div class="inbox-item">
                            <canvas id="myChart" width="400" height="400"></canvas>
                            <script>
                                const ctx = document.getElementById('myChart').getContext('2d');
                                const myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Cobrador', 'Vendedor'],
                                        datasets: [{
                                            label: 'cobrador x vendedor',
                                            data: [{{ $count_cobradores }}, {{ $count_vendedores }}],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="input-field col s4">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb3"></h4>
                    <hr>
                    <div class="inbox-wid">
                        <div class="inbox-item">
                            <canvas id="myChart2" width="400" height="400"></canvas>
                            <script>
                                const ctx2 = document.getElementById('myChart2').getContext('2d');
                                const myChart2 = new Chart(ctx2, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Clientes', 'Cobranças'],
                                        datasets: [{
                                            label: 'clientes x cobranças',
                                            data: [{{ $count_clientes }}, {{ $count_cobrancas }}],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="input-field col s4">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb3"></h4>
                    <hr>
                    <div class="inbox-wid">
                        <div class="inbox-item">
                            <canvas id="myChart3" width="400" height="400"></canvas>
                            <script>
                                const ctx3 = document.getElementById('myChart3').getContext('2d');
                                const myChart3 = new Chart(ctx3, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Cidades', 'Planos'],
                                        datasets: [{
                                            label: 'cidades x planos',
                                            data: [{{ $count_cidades }}, {{$count_planos}}],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
