<!-- Modal -->
<div class="modal fade" id="modalImportFuncionario" tabindex="-1" role="dialog" aria-labelledby="modalImportFuncionarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Importar funcionáros</h5>
                <button style="float: right" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg> ... </svg>
                </button>
            </div>
            <div class="modal-body">
               <form id="formModalImportFuncionario" class="row g-3 ">
                   @csrf
                   <div class="form-group">
                       <p>
                           <label for="fileFuncionarios">Selecione a planilha que cotém os dados dos Fucionários. </label>
                           <a href="{{ route('file.downloadModeloFuncionario') }}" class="btn btn-primary">Baixar exemplo</a>
                       </p>
                       <input type="file" name="file" class="form-control-file" id="fileFuncionarios">
                   </div>
               </form>
            </div>
            <div class="modal-footer">
                <button class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                <button class="btn btn-primary" id="btnSalvarNovoFuncionario">Salvar</button>
            </div>
        </div>
    </div>
    <script type="module">

        import {Funcionario} from "../../../js/empresa/funcionario.js";

        var funcionario = new Funcionario();
        $('#formModalAddFuncionario').submit(function() {
            let cpf = $('#formModalAddFuncionario input[name=cpf]').val().replaceAll('.', '').replaceAll('-', '');
            $('#formModalAddFuncionario input[name=cpf]').val(cpf);
            let telefone = $('#formModalAddFuncionario input[name=telefone]').val().replaceAll('(', '').replaceAll(')', '').replaceAll(' ', '').replaceAll('-', '');
            $('#formModalAddFuncionario input[name=telefone]').val(telefone);
            funcionario.add($('#formModalAddFuncionario').serialize());
            return false;
        });

        $("#btnSalvarNovoFuncionario").click(function(){
            $('#formModalAddFuncionario').submit();
        });

    </script>
</div>
