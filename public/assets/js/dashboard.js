var UTIL = {
    dataFormatada: function (data) {
        var dia  = data.split("-")[2];
        var mes  = data.split("-")[1];
        var ano  = data.split("-")[0];

        return ("0"+dia).slice(-2) + '/' + ("0"+mes).slice(-2) + '/' + ano;
    },

    mask: function(value, pattern) {
        let i = 0;
        const v = value.toString();
        return pattern.replace(/#/g, _ => v[i++]);
    },

    maskCPF: function (value){
        return this.mask(value, '###.###.###-##');
    },

    maskTelefone: function (value){
        return this.mask(value, '(##) ####-####');
    },

    maskCelular: function (value){
        return this.mask(value, '(##) #####-####');
    }
};


var dashboard = {
    preencherTabelaFuncionario : function (responseData) {


        var $table = $('#table_funcionario_dashboard tbody');



        // do an ajax call here to get the response. your response should be like responseData
        var data = [];
        html = '';
        // Here you have to flat the array
        Object.keys(responseData).forEach(function(key){
            var colaborador = responseData[key];
            html += '<tr>';
            html += '<td>'+UTIL.dataFormatada(colaborador.pessoa.data_nascimento)+'</td>';
            html += '<td className="ps-0">'+colaborador.pessoa.nome+' '+colaborador.pessoa.sobrenome+'</td>';
            html += '<td className="text-center">'+UTIL.maskCPF(colaborador.pessoa.cpf)+'</td>';
            html += '</tr>';
        });

        $table.html(html);



    }
};


