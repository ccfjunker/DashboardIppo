<!-- Modal -->
<div class="modal fade" id="modalAddUsuario" tabindex="-1" role="dialog" aria-labelledby="modalAddUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Novo usuário</h5>
                <button style="float: right" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg> ... </svg>
                </button>
            </div>
            <div class="modal-body">
               <form id="formModalAddUsuario" class="row g-3 ">
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
                   <div class="col-md-8">
                       <div class="form-check form-check-primary form-check-inline">
                           <input class="form-check-input" type="radio" name="radio-checked" id="form-check-radio-default">
                           <label class="form-check-label" for="form-check-radio-default">
                               Admin
                           </label>
                       </div>
                       <div class="form-check form-check-primary form-check-inline">
                           <input class="form-check-input" type="radio" name="radio-checked" id="form-check-radio-default" checked>
                           <label class="form-check-label" for="form-check-radio-default">
                               Empresa
                           </label>
                       </div>

                   </div>
                    <div class="col-md-4">
                        <label for="selectEmpresa" class="form-label">Empresa</label>
                        <select name="selectEmpresa" class="form-select" id="selectEmpresa">
                            <option value="" selected disabled>Selecione uma empresa</option>
                            @foreach($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{$empresa->nome}}</option>
                            @endforeach
                        </select>
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
            <div class="modal-footer">
                <button class="btn" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                <button class="btn btn-primary" id="btnSalvarNovoUsuario">Salvar</button>
            </div>
        </div>
    </div>
    <script type="module">

        import {User} from "../../../js/user/user.js";
        var user = new User();
        $('#formModalAddUsuario').submit(function() {
            user.add($('#formFiltroAnamnese').serialize());
            return false;
        });

        $("#btnSalvarNovoUsuario").click(function(){
            $('#formModalAddUsuario').submit();
        });
    </script>
</div>
