@extends('layouts.app')

@section('content')
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                    <div class="widget-content widget-content-area br-8">
                        <button class="btn btn-primary mb-2 me-4" title="Novo usuário" style="float: right" id="btnAddUsuario">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </button>
                        <h4>Usuários cadastrados</h4>

                        <table id="usersTable" class="table table-striped dt-table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Nome Social</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>CPF</th>
                                <th>Função</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Nome Social</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>CPF</th>
                                <th>Função</th>

                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script>
        $('#usersTable').DataTable({
            dom: 'Bfrtip',
            "searching": false,
            oLanguage: {
                oPaginate: { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                sInfo: "Mostrando página _PAGE_ de _PAGES_",
                sLengthMenu: "Resultados :  _MENU_",
            },
            stripeClasses: [],
            lengthMenu: [7, 10, 20, 50],
            pageLength: 10,
            processing: true,
            serverSide: true,
            ajax: "{{route('admin.usersList')}}",
            columns: [
                { data: 'id' },
                { data: 'nome' },
                { data: 'nome_social' },
                { data: 'email' },
                { data: 'telefone' },
                { data: 'cpf' },
                { data: 'funcao' }
            ]

        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
    @include('inc.modal_add_usuario')
@endsection
