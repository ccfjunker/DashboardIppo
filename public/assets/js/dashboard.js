


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
            html += '<td>'+UtilIppo.dataFormatada(colaborador.data_nascimento)+'</td>';
            html += '<td className="ps-0">'+colaborador.nome+' '+colaborador.sobrenome+'</td>';
            html += '<td className="text-center">'+UTIL.maskCPF(colaborador.cpf)+'</td>';
            html += '</tr>';
        });

        $table.html(html);



    }
};


