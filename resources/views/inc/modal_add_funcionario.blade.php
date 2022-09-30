<!-- Modal -->
<div class="modal fade" id="modalAddFuncionario" tabindex="-1" role="dialog" aria-labelledby="modalAddFuncionarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Salvar funcionáro</h5>
                <button style="float: right" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg> ... </svg>
                </button>
            </div>
            <div class="modal-body">
               <form id="formModalAddFuncionario" class="row g-3 ">
                   @csrf
                    <input type="hidden" name="id">
                    <input type="hidden" name="id_empresa" value="{{ getEmpresaFromLoggedUser()->id }}">
                   <div class="col-md-6">
                       <label for="inputNome">Nome</label>
                       <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Primeiro nome...">
                       <div class="invalid-feedback" id="inputNomeError"></div>
                   </div>
                   <div class="col-md-6">
                       <label for="inputSobrenome">Nome</label>
                       <input type="text" class="form-control" id="inputSobrenome" name="sobrenome" placeholder="Sobrenome...">
                       <div class="invalid-feedback" id="inputSobrenomeError"></div>
                   </div>
                   <div class="col-md-6">
                       <label for="inputNomeSocial">Nome Social</label>
                       <input type="text" class="form-control" id="inputNomeSocial" name="nome_social" placeholder="Nome Social...">
                       <div class="invalid-feedback" id="inputNomeSocialError"></div>
                   </div>
                   <div class="col-md-6">
                       <label for="inputCPF">CPF</label>
                       <input type="text" class="form-control" id="inputCPF" name="cpf" placeholder="CPF...">
                       <div class="invalid-feedback" id="inputCPFError"></div>
                   </div>
                   <div class="col-md-6">
                       <label for="inputTelefone">Telefone</label>
                       <input type="text" class="form-control" id="inputTelefone" name="telefone" placeholder="Telefone...">
                       <div class="invalid-feedback" id="inputTelefoneError"></div>
                   </div>
                   <div class="col-md-6">
                       <label for="inputEmail">E-mail</label>
                       <input type="email" class="form-control" id="inputEmail" name="email" placeholder="E-mail...">
                       <div class="invalid-feedback" id="inputEmailError"></div>
                   </div>
                   <div class="col-md-6">
                       <label for="inputDataNascimento">Data de nascimento</label>
                       <input type="date" class="form-control" id="inputDataNascimento" name="data_nascimento" placeholder="E-mail...">
                       <div class="invalid-feedback" id="inputDataNascimentoError"></div>
                   </div>
                   <div class="col-md-6">
                       <label for="selectEngajou" class="form-label">Engajou</label>
                       <select name="engajou" class="form-select" id="selectEngajou">
                           <option value="N">Não</option>
                           <option value="S">Sim</option>
                       </select>
                   </div>
                   <div class="col-md-6">
                       <label for="selectTrabalho" class="form-label">Trabalho</label>
                       <select name="trabalho" class="form-select" id="selectTrabalho">
                           <option>Selecione a forma de trabalho</option>
                           @foreach($trabalhos as $key => $value)
                               <option value="{{ $key }}">{{ $value }}</option>
                           @endforeach
                       </select>
                       <div class="invalid-feedback" id="selectTrabalhoError"></div>
                   </div>
                   <div class="col-md-6">
                       <label for="selectGênero" class="form-label">Gênero</label>
                       <select name="genero" class="form-select" id="selectGênero">
                           <option>Selecione o gênero</option>
                           @foreach($generos as $key => $value)
                               <option value="{{ $key }}">{{ $value }}</option>
                           @endforeach
                       </select>
                       <div class="invalid-feedback" id="selectGeneroError"></div>
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
