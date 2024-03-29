import {UtilIppo} from "../util/util.js";
import {IppoAjaxJSON} from "../ajax/ippo_ajax_json.js";

export class Funcionario{
    static getInfoFuncionario(id, handleData){
        UtilIppo.showModalLoading();
        let ippoAjax = new IppoAjaxJSON("/funcionario/"+id, "GET", "funcionario.show").createRequest(null);
        var escopo = this;
        ippoAjax.done(function (data){
            UtilIppo.hideModalLoading();
            if(handleData){
                handleData(data);
            }
        });
    }

    add(request){
        UtilIppo.showModalLoading();
        let ippoAjax = new IppoAjaxJSON("/salvarFuncionario", "POST", "funcionario.store").createRequest(request);
        var escopo = this;
        ippoAjax.done(function (data){
            UtilIppo.hideModalLoading();
            UtilIppo.hideModalAddFuncionario();
            UtilIppo.showModalInfo();
            $('#funcionarioTable').DataTable().ajax.reload();
        });
    }
}
