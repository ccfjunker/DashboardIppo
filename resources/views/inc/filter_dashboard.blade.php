<!--  BEGIN NAVBAR  -->

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div id="accordionIcons" class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Filtro</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area" style="padding-top: 0;">

            <div id="iconsAccordion" class="accordion-icons accordion">
                <div class="card">
                    <div class="card-header" id="headingOne3">
                        <section class="mb-0 mt-0">
                            <div role="menu" class="collapsed" data-bs-toggle="collapse"
                                data-bs-target="#iconAccordionOne" aria-expanded="false"
                                aria-controls="iconAccordionOne">
                                <div class="accordion-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter">
                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                    </svg> Filtro
                                    <div class="icons">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div id="iconAccordionOne" class="collapse" aria-labelledby="headingOne3"
                        data-bs-parent="#iconsAccordion">
                        <div class="card-body">
                            <form id="formFiltroAnamnese" action="{{ route($route) }}">
                                @csrf
                                <div class="form-group ">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputDataInicial">Data inicial: </label>
                                            <input name="inputDataInicial" id="inputDataInicial" value=""
                                                class="form-control flatpickr flatpickr-input active" type="date"
                                                placeholder="Data inicial..." />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputDataFinal">Data final: </label>
                                            <input name="inputDataFinal" id="inputDataFinal" value=""
                                                class="form-control flatpickr flatpickr-input active" type="date"
                                                placeholder="Data final..." />
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-4">
                                            <label for="selectIdade">Faixa de Idade: </label>
                                            <select class="form-select" id="selectIdade" name="selectIdade">
                                                <option selected="" disabled="" value="">Selecione...
                                                </option>
                                                <option value="-18">< 18</option>
                                                <option value="18-24">18 - 24</option>
                                                <option value="25-32">25 - 32</option>
                                                <option value="33-39">33 - 39</option>
                                                <option value="40-47">40 - 47</option>
                                                <option value="48-54">48 - 54</option>
                                                <option value="55-63">55 - 63</option>
                                                <option value="64-">64+ </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="selectSexo" class="form-label">Sexo:</label>
                                            <select class="form-select" id="selectSexo" name="selectSexo">
                                                <option selected disabled value="">Selecione...</option>
                                                @foreach ($options_genero as $index => $genero)
                                                    <option value="{{ $index }}">{{ $genero }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-md-4">
                                            <label for="selectTrabalho">Formato de trabalho: </label>
                                            <select class="form-select" id="selectTrabalho" name="selectTrabalho">
                                                <option selected="" disabled="" value="">Selecione...
                                                </option>
                                                @foreach ($options_trabalho as $index => $trabalho)
                                                    <option value="{{ $index }}">{{ $trabalho }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                    @if (isUserAdmin())
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="selectEmpresa">Empresa: </label>
                                                <select class="form-select" id="selectEmpresa" name="selectEmpresa">
                                                    <option selected="" disabled="" value="">Selecione...
                                                    </option>
                                                    @foreach ($options_empresa as $empresa)
                                                        <option value="{{ $empresa['id'] }}">{{ $empresa['nome'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br />
                                    @endif
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary" id="filtro">Filtrar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>


<style>


</style>

<!--  END NAVBAR  -->
