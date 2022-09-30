@extends('layouts.app')

@section('content')
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                    <div class="widget-content widget-content-area br-8">
                        <button class="btn btn-dark mb-2 me-4" title="Importar Funcionários" style="float: right" id="btnImportFuncionario">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>                        </button>
                        <button class="btn btn-primary mb-2 me-4" title="Novo Funcionário" style="float: right" id="btnAddFuncionario">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </button>
                        <h4>Funcionários cadastrados</h4>

                        <table id="funcionarioTable" class="table table-striped dt-table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Nome Social</th>
                                <th>Telefone</th>
                                <th>CPF</th>
                                <th>E-mail</th>
                                <th>Data nascimento</th>
                                <th>Engajou</th>
                                <th>Trabalho</th>
                                <th>Gênero</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script>
        const table = $('#funcionarioTable').DataTable({
            dom: 'Bfrtip',
            "searching": false,
            oLanguage: {
                oPaginate: {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                sInfo: "Mostrando página _PAGE_ de _PAGES_",
                sLengthMenu: "Resultados :  _MENU_",
            },
            stripeClasses: [],
            lengthMenu: [10, 20],
            pageLength: 10,
            processing: true,
            serverSide: true,
            ajax: "{{route('funcionario.list')}}",
            order: [[1, 'asc']],
            responsive: {
                details: {
                    type: 'column',
                    renderer: function ( api, rowIdx, columns ) {
                        var data = $.map( columns, function ( col, i ) {
                            return col.hidden ? '<td><b>'+col.title+':</b> '+col.data+'</td> ' :'';
                        } ).join('');

                        return data ? $('<table/>').append( data ) : false;
                    }
                }
            },
            columns: [
                {
                    className: 'dt-control',
                    orderable: false,
                    sortable: false,
                    data: null,
                    defaultContent: '',
                    render: function (data, type, full){
                        return '<button class="btn btn-info btn-icon mb-2 me-4 btn-rounded">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>'+
                            '</button>';
                    }
                },
                {data: 'id'},
                {data: 'nome'},
                {data: 'nome_social'},
                {data: 'telefone'},
                {data: 'cpf'},
                {data: 'email'},
                {data: 'data_nascimento'},
                {data: 'engajou'},
                {data: 'trabalho'},
                {data: 'genero'},
                {
                    responsivePriority: 1,
                    data: null,
                    sortable: false,
                    orderable: false,
                    render: function (data, type, full) {
                        return '<button class="btn btn-secondary mb-2 me-4 btn-edit-list" title="Editar Funcionário" value="' + data.id + '">' +
                            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>' +
                            '</button>';
                    }
                },
            ]

        });



    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
    @include('inc.modal_add_funcionario')
    @include('inc.modal_import_funcionario')
@endsection
