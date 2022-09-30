import {UtilIppo} from "../util/util.js";

export class IppoAjaxJSON{
    constructor(url, method, context) {
        this.url = window.location.origin+url;
        this.method = method;
        this.context = context;
    }

    createRequest(data){
        var self = this;
       return $.ajax({
            data: data,
            dataType: 'json',
            url: this.url,
           headers:{
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           method: this.method
        }).fail(function (jqXHR, textStatus, errorThrown) {
            UtilIppo.hideModalLoading();
            var data = jqXHR.responseJSON;
            console.log(data);
            if(self.context === "admin.user.create"){
                UtilIppo.showUserMessagesErrorValidation(data);
            }else if(self.context === "funcionario.store"){
                UtilIppo.showFuncionarioMessagesErrorValidation(data);
            }else{
                UtilIppo.showModalError(data);
            }

        });
    }



}
