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




                   <label for="funcao">Função</label>
                   <div class="col-md-12">
                       <div class="form-check form-check-primary form-check-inline">
                           <input value="A" class="form-check-input" type="radio" name="funcao" id="form-check-radio-default">
                           <label class="form-check-label" for="form-check-radio-default">
                               Admin
                           </label>
                       </div>
                       <div class="form-check form-check-primary form-check-inline">
                           <input value="E" class="form-check-input" type="radio" name="funcao" id="form-check-radio-default" checked>
                           <label class="form-check-label" for="form-check-radio-default">
                               Empresa
                           </label>
                       </div>
                   </div>
                    <div class="col-md-4" id="divSelectEmpresa">
                        <label for="selectEmpresa" class="form-label">Empresa</label>
                        <select name="id_empresa" class="form-select" id="selectEmpresa">
                            <option selected disabled>Selecione uma empresa</option>
                            @foreach($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{$empresa->nome}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback" id="selectEmpresaError"></div>
                    </div>
                   <hr/>
                   <div class="col-md-4">
                       <label for="inputNome">E-mail</label>
                       <input type="text" class="form-control" id="inputEmail" name="email" placeholder="E-mail">
                       <div class="invalid-feedback" id="inputEmailError"></div>
                   </div>
                   <div class="col-md-4">
                       <label for="inputNome">Senha</label>
                       <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Senha">
                       <div class="invalid-feedback" id="inputPasswordError">
                           O campo senha é obrigatório.
                       </div>
                   </div>
                   <div class="col-md-4">
                       <label for="inputNome">Confirmação de senha</label>
                       <input type="password" class="form-control" id="inputConfirmPassword" name="password_confirmation" placeholder="Confirmação de senha">
                       <div class="invalid-feedback" id="inputConfirmPasswordError">
                           O campo nome é obrigatório.
                       </div>
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
            user.add($('#formModalAddUsuario').serialize());
            return false;
        });

        $("#btnSalvarNovoUsuario").click(function(){
            $('#formModalAddUsuario').submit();
        });

        $('input[type=radio][name=funcao]').change(function() {
            if (this.value === 'A') {
                $("#divSelectEmpresa").hide();
            }
            else if (this.value === 'E') {
                $("#divSelectEmpresa").show();
            }
        });
    </script>
</div>
