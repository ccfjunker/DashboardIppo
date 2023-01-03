import {UtilIppo} from './util/util.js';
import {IppoAjaxJSON} from "./ajax/ippo_ajax_json.js";
import {Dashboard} from "./dashboard/dashboard.js";
import {ChartIppo} from "./components/chart.js";
import {Funcionario} from "./empresa/funcionario.js";

$("#btnAddUsuario").click(function (){
   $("#modalAddUsuario").modal("show");
});

$("#btnImportFuncionario").click(function (){
    $("#modalImportFuncionario").modal("show");
});

$("#btnAddFuncionario").click(function (){
    UtilIppo.showModalAddFuncionario(null);
});

$(".btn-edit-list").click(function (){
    const id = $(this).val();
    Funcionario.getInfoFuncionario(id, UtilIppo.showModalAddFuncionario)
});

$(".btn-delete-list").click(function (){
    const id = $(this).val();
    const resposta = confirm('Deseja Deletar o Funcionario?')
    if(resposta) Funcionario.delete(id)
});
