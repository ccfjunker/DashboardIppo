@extends('layouts.app')

@section('content')
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">
            <div class="row layout-top-spacing">
                @include('inc.filter_dashboard', ['route'=>'dataFilteredForTheCharts'])
                <style>

                    .widget-header hr{
                        margin: 0px;
                    }
                    #tableColaboradores .table-responsive{
                        max-height: 300px;
                        overflow: auto;
                    }
                    .widget-content-area .chart-ippo{
                        text-align: center;
                    }
                </style>
                <div id="graficoFelling" class="col-xl-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Evolução Diária</h4>
                                </div>
                            </div>
                            <hr/>
                        </div>

                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div id="barFelling" class="col-xl-12" style="display: inline-block"></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="graficoFuncionario" class="col-xl-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Colaboradores</h4>
                                </div>
                            </div>
                            <hr/>
                        </div>

                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div id="donutColaboradoresCadastradosTotal" class="col-xl-3 chart-ippo" style="display: inline-block">
                                    <label class="titulo_chart">Cadastrados x Base total</label>
                                </div>
                                <div id="donutColaboradoresCadastradosEngajamento" class="col-xl-3 chart-ippo" style="display: inline-block">
                                    <label class="titulo_chart">Cadastrados x Engajamento</label>
                                </div>
                                <div id="tableColaboradores" class="col-xl-6 chart-ippo" style="display: inline-block">
                                    <label class="titulo_chart">Colaboradores cadastrados</label>
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table_funcionario_dashboard">
                                            <thead>
                                            <tr>
                                                <th scope="col">Data de cadastro</th>
                                                <th class="ps-0" scope="col">Nome</th>
                                                <th class="text-center" scope="col">CPF</th>
                                            </tr>
                                            <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                                    <span class="table-inner-text">25 Apr</span>
                                                </td>
                                                <td class="ps-0">Shaun Park</td>
                                                <td class="text-center">320</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="graficoSaudeCronica" class="col-xl-6 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Doenças Crônicas</h4>
                                </div>
                            </div>
                            <hr/>
                        </div>

                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div id="donutSaudeCronica" class="col-xl-4" style="display: inline-block"></div>
                                <div id="barSaudeCronica" class="col-xl-8" style="display: inline-block"></div>
                            </div>

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
                            <hr/>
                        </div>

                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div id="donutSaudeMental" class="col-xl-4" style="display: inline-block"></div>
                                <div id="barSaudeMental" class="col-xl-8" style="display: inline-block"></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="graficoAlimentacao" class="col-xl-6 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Alimentação</h4>
                                </div>
                            </div>
                            <hr/>
                        </div>

                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div id="donutAlimentacao" class="col-xl-4" style="display: inline-block"></div>
                                <div id="barAlimentacao" class="col-xl-8" style="display: inline-block"></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="graficoAtividadeFisica" class="col-xl-6 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Atividade Física</h4>
                                </div>
                            </div>
                            <hr/>
                        </div>

                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div id="donutAtividadeFisica" class="col-xl-4" style="display: inline-block"></div>
                                <div id="barAtividadeFisica" class="col-xl-8" style="display: inline-block"></div>
                            </div>

                        </div>
                    </div>
                </div>

                <script type="module">


                    import {Dashboard} from "../../js/dashboard/dashboard.js";


                    var dashboard = new Dashboard();
                    dashboard.loadDashboardAdmin($('#formFiltroAnamnese').serialize());
                    $('#formFiltroAnamnese').submit(function() {
                        $("#iconAccordionOne").collapse('hide');
                        dashboard.refreshDashboardAdmin($('#formFiltroAnamnese').serialize());
                        return false;
                    });



                </script>


                <script>

                </script>

            </div>

        </div>

    </div>

@endsection
