@extends('layouts.app')

@section('content')

    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">
            <script src="{{asset('../../../src/plugins/src/apex/apexcharts.min.js')}}"></script>
            <script src="{{asset('../../../src/plugins/src/apex/custom-apexcharts.js?434s5')}}" type="text/javascript"></script>
            <div class="row layout-top-spacing">
                @include('inc.filter_dashboard', ['route'=>'dataFilteredForTheCharts'])

                <div id="graficoSaudeCronica" class="col-xl-6 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Doenças Crônicas</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div id="donutSaudeCronica" class=""></div>
                        </div>
                    </div>
                </div>
                <div id="graficoSaudeMental" class="col-xl-6 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Saúde Mental</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div id="donutSaudeMental" class=""></div>
                        </div>
                    </div>
                </div>
                <div id="graficoSaudeAlimentar" class="col-xl-6 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Saúde Alimentar</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div id="donutSaudeAlimentar" class=""></div>
                        </div>
                    </div>
                </div>
                <div id="graficoAtividadeFisica" class="col-xl-6 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Atividade física</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div id="donutAtividadeFisica" class=""></div>
                        </div>
                    </div>
                </div>
                <script>
                    function setDataDonutSaudeCronica(data) {


                        var donutOptionSaudeCronica = {
                            chart: {
                                height: 500,
                                type: 'donut',
                                toolbar: {
                                    show: false,
                                }
                            },
                            // colors: ['#1b55e2', '#888ea8', '#acb0c3', '#d3d3d3'],
                            series: Object.values(data.saude_cronica),
                            labels: Object.keys(data.saude_cronica),
                            responsive: [{
                                breakpoint: 480,
                                options: {
                                    chart: {
                                        width: 200
                                    },
                                    legend: {
                                        position: 'bottom'
                                    }
                                }
                            }]
                        }

                        var donutSaudeCronica = new ApexCharts(
                            document.querySelector("#donutSaudeCronica"),
                            donutOptionSaudeCronica
                        );

                        donutSaudeCronica.render();
                    }

                    function setDataDonutSaudeMental(data){
                        var donutOptionSaudeMental = {
                            chart: {
                                height: 500,
                                type: 'donut',
                                toolbar: {
                                    show: false,
                                }
                            },
                            // colors: ['#1b55e2', '#888ea8', '#acb0c3', '#d3d3d3'],
                            series: Object.values(data.saude_mental),
                            labels: Object.keys(data.saude_mental),
                            responsive: [{
                                breakpoint: 480,
                                options: {
                                    chart: {
                                        width: 200
                                    },
                                    legend: {
                                        position: 'bottom'
                                    }
                                }
                            }]
                        }

                        var donutSaudeMental = new ApexCharts(
                            document.querySelector("#donutSaudeMental"),
                            donutOptionSaudeMental
                        );

                        donutSaudeMental.render();

                    }

                    function setDataDonutSaudeAlimentar(data){
                        var donutOptionSaudeMental = {
                            chart: {
                                height: 500,
                                type: 'donut',
                                toolbar: {
                                    show: false,
                                }
                            },
                            // colors: ['#1b55e2', '#888ea8', '#acb0c3', '#d3d3d3'],
                            series: Object.values(data.saude_alimentar),
                            labels: Object.keys(data.saude_alimentar),
                            responsive: [{
                                breakpoint: 480,
                                options: {
                                    chart: {
                                        width: 200
                                    },
                                    legend: {
                                        position: 'bottom'
                                    }
                                }
                            }]
                        }

                        var donutSaudeMental = new ApexCharts(
                            document.querySelector("#donutSaudeAlimentar"),
                            donutOptionSaudeMental
                        );

                        donutSaudeMental.render();

                    }

                    function setDataDonutAtividadeFisica(data){
                        var donutOptionSaudeMental = {
                            chart: {
                                height: 500,
                                type: 'donut',
                                toolbar: {
                                    show: false,
                                }
                            },
                            // colors: ['#1b55e2', '#888ea8', '#acb0c3', '#d3d3d3'],
                            series: Object.values(data.atividade_fisica),
                            labels: Object.keys(data.atividade_fisica),
                            responsive: [{
                                breakpoint: 480,
                                options: {
                                    chart: {
                                        width: 200
                                    },
                                    legend: {
                                        position: 'bottom'
                                    }
                                }
                            }]
                        }

                        var donutSaudeMental = new ApexCharts(
                            document.querySelector("#donutAtividadeFisica"),
                            donutOptionSaudeMental
                        );

                        donutSaudeMental.render();

                    }

                    function loadCharts(){
                        $.ajax({
                            url: '{{ route('dataFilteredForTheCharts') }}',
                            type: 'GET',
                            data: {
                                _token: "{{ csrf_token() }}",
                                @if(isUserAdmin())
                                selectEmpresa:$("#selectEmpresa").val(),
                                @endif
                                inputDataInicial:$("#inputDataInicial").val(),
                                inputDataFinal:$("#inputDataFinal").val(),
                                inputIdade:$("#inputIdade").val(),
                                selectGenero:$("#selectGenero").val(),
                                selectTrabalho:$("#selectTrabalho").val(),
                            },
                            dataType: 'JSON',

                            success: function(data){
                                setDataDonutSaudeCronica(data);
                                setDataDonutSaudeMental(data);
                                setDataDonutSaudeAlimentar(data);
                                setDataDonutAtividadeFisica(data);

                            }
                        });
                    }
                    loadCharts();
                    $('#formFiltroAnamnese').submit(function() {
                        loadCharts();
                        return false;
                    });



                </script>


                <script>

                </script>

            </div>

        </div>

    </div>

@endsection
