import {UtilIppo} from "../util/util.js";
import * as url from "url";

export class IppoAjaxJSON{
    constructor(url, method) {
        this.url = window.location.origin+url;
        this.method = method;
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

            if(self.url === '/admin/userStore'){

            }

            UtilIppo.showModalError(data);
        });
    }



}
