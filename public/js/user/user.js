import {UtilIppo} from "../util/util.js";
import {IppoAjaxJSON} from "../ajax/ippo_ajax_json.js";

export class User{
    add(request){
        console.log(request);
        UtilIppo.showModalLoading();
        let ippoAjax = new IppoAjaxJSON("/admin/userStore", "POST", "admin.user.create").createRequest(request);
        var escopo = this;
        ippoAjax.done(function (data){
            UtilIppo.hideModalLoading();
            UtilIppo.hideModalAddUsuario();
            UtilIppo.showModalInfo();
            $('#usersTable').DataTable().ajax.reload();
        });
    }
}
