@extends('layouts.app')

@section('content')
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                    <div class="widget-content widget-content-area br-8">

                        <h4>Novo usuário</h4>

                        <form id="formModalAddUsuario" class="row g-3 " action="{{ route('admin.userStore') }}">
                            @csrf
                            <div class="col-md-4">
                                <label for="inputNome">Nome</label>
                                <input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Primeiro nome">
                            </div>
                            <div class="col-md-4">
                                <label for="inputNome">Sobrenome</label>
                                <input type="text" class="form-control" id="inputSobrenome" name="inputSobrenome" placeholder="Sobrenome">
                            </div>
                            <div class="col-md-4">
                                <label for="inputNome">Nome social</label>
                                <input type="text" class="form-control" id="inputNomeSocial" name="inputNomeSocial" placeholder="Nome Social">
                            </div>
                            <div class="col-md-4">
                                <label for="inputNome">CPF</label>
                                <input type="text" class="form-control" id="inputCPF" name="inputCPF" placeholder="CPF">
                            </div>
                            <div class="col-md-4">
                                <label for="inputNome">Telefone</label>
                                <input type="text" class="form-control" id="inputTelefone" name="inputTelefone" placeholder="Telefone">
                            </div>
                            <div class="col-md-4">
                                <label for="inputNome">E-mail</label>
                                <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="E-mail">
                            </div>
                            <div class="col-md-12">
                                <div class="form-check form-check-primary form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio-checked" id="form-check-radio-default">
                                    <label class="form-check-label" for="form-check-radio-default">
                                        Admin
                                    </label>
                                </div>
                                <div class="form-check form-check-primary form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio-checked" id="form-check-radio-default">
                                    <label class="form-check-label" for="form-check-radio-default">
                                        Empresa
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="inputNome">Senha</label>
                                <input type="text" class="form-control" id="inputPassword" name="inputPassword" placeholder="Senha">
                            </div>
                            <div class="col-md-4">
                                <label for="inputNome">Confirmação de senha</label>
                                <input type="text" class="form-control" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirmação de senha">
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script>

    </script>
@endsection
