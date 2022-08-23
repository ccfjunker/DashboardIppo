@extends('layouts.app')

@section('content')
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <div class="row layout-top-spacing">
                @include('inc.filter_dashboard', ['route'=>'admin.dataFilteredForTheCharts'])

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

            </div>

        </div>

    </div>

@endsection
