import {UtilIppo} from "../util/util.js";

export class IppoAjaxJSON{
    constructor(url, method) {
        this.url = window.location.origin+url;
        this.method = method;
    }

    createRequest(data){
       return $.ajax({
            data: data,
            dataType: 'json',
            url: this.url,
           method: this.method
        }).fail(function (jqXHR, textStatus, errorThrown) {
            UtilIppo.hideModalLoading();
            var data = jqXHR.responseJSON;
            UtilIppo.showModalError(data['errors']);
        });
    }



}
