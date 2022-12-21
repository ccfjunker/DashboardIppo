var emptyChart = {
    text: 'Carregando...',
    align: 'center',
    verticalAlign: 'middle',
    offsetX: 0,
    offsetY: 0
};


//utils
function returnFellingSeries(data) {
    const qualidade_da_alimentacao = data[0]
    const nivel_de_estresse = data[1]
    const qualidade_de_sono = data[2]
    const nivel_de_ansiedade = data[3]
    const nivel_de_humor = data[4]
    const VALOR_MEDIA_MOVEL_DIAS = 3;

    // Media de Dias de alimentacao
    qualidade_da_alimentacao.map((value) => value.nivel = parseInt(value.nivel))
    nivel_de_estresse.map((value) => value.nivel = parseInt(value.nivel))
    qualidade_de_sono.map((value) => value.nivel = parseInt(value.nivel))
    nivel_de_ansiedade.map((value) => value.nivel = parseInt(value.nivel))
    nivel_de_humor.map((value) => value.nivel = parseInt(value.nivel))

    // Media diaria
    for (let i = 0; i < qualidade_da_alimentacao.length; i++) {
        if (i === qualidade_da_alimentacao.length - 1 || qualidade_da_alimentacao[i].data_criacao.substring(0, 10) != qualidade_da_alimentacao[i + 1].data_criacao.substring(0, 10)) {
            //volta verificando os iguais
            if (i > 0 && qualidade_da_alimentacao[i].data_criacao.substring(0, 10) === qualidade_da_alimentacao[i - 1].data_criacao.substring(0, 10)) {
                // tem iguais
                let index = i;
                let contagem_de_index_voltados = 0;
                let soma_de_nivel = 0;
                while (index >= 0 && qualidade_da_alimentacao[i].data_criacao.substring(0, 10) === qualidade_da_alimentacao[index].data_criacao.substring(0, 10)) {
                    soma_de_nivel += qualidade_da_alimentacao[index].nivel
                    index--
                    contagem_de_index_voltados++
                }
                qualidade_da_alimentacao[index + 1].nivel = soma_de_nivel / contagem_de_index_voltados
                qualidade_da_alimentacao.splice(index + 2, contagem_de_index_voltados - 1);
                i = index + 2
            }
        }
    }
    for (let i = 0; i < nivel_de_estresse.length; i++) {
        if (i === nivel_de_estresse.length - 1 || nivel_de_estresse[i].data_criacao.substring(0, 10) != nivel_de_estresse[i + 1].data_criacao.substring(0, 10)) {
            //volta verificando os iguais
            if (i > 0 && nivel_de_estresse[i].data_criacao.substring(0, 10) === nivel_de_estresse[i - 1].data_criacao.substring(0, 10)) {
                // tem iguais
                let index = i;
                let contagem_de_index_voltados = 0;
                let soma_de_nivel = 0;
                while (index >= 0 && nivel_de_estresse[i].data_criacao.substring(0, 10) === nivel_de_estresse[index].data_criacao.substring(0, 10)) {
                    soma_de_nivel += nivel_de_estresse[index].nivel
                    index--
                    contagem_de_index_voltados++
                }
                nivel_de_estresse[index + 1].nivel = soma_de_nivel / contagem_de_index_voltados
                nivel_de_estresse.splice(index + 2, contagem_de_index_voltados - 1);
                i = index + 2
            }
        }
    }
    for (let i = 0; i < qualidade_de_sono.length; i++) {
        if (i === qualidade_de_sono.length - 1 || qualidade_de_sono[i].data_criacao.substring(0, 10) != qualidade_de_sono[i + 1].data_criacao.substring(0, 10)) {
            //volta verificando os iguais
            if (i > 0 && qualidade_de_sono[i].data_criacao.substring(0, 10) === qualidade_de_sono[i - 1].data_criacao.substring(0, 10)) {
                // tem iguais
                let index = i;
                let contagem_de_index_voltados = 0;
                let soma_de_nivel = 0;
                while (index >= 0 && qualidade_de_sono[i].data_criacao.substring(0, 10) === qualidade_de_sono[index].data_criacao.substring(0, 10)) {
                    soma_de_nivel += qualidade_de_sono[index].nivel
                    index--
                    contagem_de_index_voltados++
                }
                qualidade_de_sono[index + 1].nivel = soma_de_nivel / contagem_de_index_voltados
                qualidade_de_sono.splice(index + 2, contagem_de_index_voltados - 1);
                i = index + 2
            }
        }
    }
    for (let i = 0; i < nivel_de_ansiedade.length; i++) {
        if (i === nivel_de_ansiedade.length - 1 || nivel_de_ansiedade[i].data_criacao.substring(0, 10) != nivel_de_ansiedade[i + 1].data_criacao.substring(0, 10)) {
            //volta verificando os iguais
            if (i > 0 && nivel_de_ansiedade[i].data_criacao.substring(0, 10) === nivel_de_ansiedade[i - 1].data_criacao.substring(0, 10)) {
                // tem iguais
                let index = i;
                let contagem_de_index_voltados = 0;
                let soma_de_nivel = 0;
                while (index >= 0 && nivel_de_ansiedade[i].data_criacao.substring(0, 10) === nivel_de_ansiedade[index].data_criacao.substring(0, 10)) {
                    soma_de_nivel += nivel_de_ansiedade[index].nivel
                    index--
                    contagem_de_index_voltados++
                }
                nivel_de_ansiedade[index + 1].nivel = soma_de_nivel / contagem_de_index_voltados
                nivel_de_ansiedade.splice(index + 2, contagem_de_index_voltados - 1);
                i = index + 2
            }
        }
    }
    for (let i = 0; i < nivel_de_humor.length; i++) {
        if (i === nivel_de_humor.length - 1 || nivel_de_humor[i].data_criacao.substring(0, 10) != nivel_de_humor[i + 1].data_criacao.substring(0, 10)) {
            //volta verificando os iguais
            if (i > 0 && nivel_de_humor[i].data_criacao.substring(0, 10) === nivel_de_humor[i - 1].data_criacao.substring(0, 10)) {
                // tem iguais
                let index = i;
                let contagem_de_index_voltados = 0;
                let soma_de_nivel = 0;
                while (index >= 0 && nivel_de_humor[i].data_criacao.substring(0, 10) === nivel_de_humor[index].data_criacao.substring(0, 10)) {
                    soma_de_nivel += nivel_de_humor[index].nivel
                    index--
                    contagem_de_index_voltados++
                }
                nivel_de_humor[index + 1].nivel = soma_de_nivel / contagem_de_index_voltados
                nivel_de_humor.splice(index + 2, contagem_de_index_voltados - 1);
                i = index + 2
            }
        }
    }


    // Media Movel
    for (let i = 0; i < qualidade_da_alimentacao.length; i++) {
        const valor_media_movel = (i > VALOR_MEDIA_MOVEL_DIAS ? (VALOR_MEDIA_MOVEL_DIAS + 1) : (i + 1))
        let sum = 0;
        for (let j = 0; j < valor_media_movel; j++) {
            sum += qualidade_da_alimentacao[i - j].nivel
        }
        sum = sum / valor_media_movel
        qualidade_da_alimentacao[i].avarage = sum
    }
    for (let i = 0; i < qualidade_de_sono.length; i++) {
        const valor_media_movel = (i > VALOR_MEDIA_MOVEL_DIAS ? (VALOR_MEDIA_MOVEL_DIAS + 1) : (i + 1))
        let sum = 0;
        for (let j = 0; j < valor_media_movel; j++) {
            sum += qualidade_de_sono[i - j].nivel
        }
        sum = sum / valor_media_movel
        qualidade_de_sono[i].avarage = sum
    }
    for (let i = 0; i < nivel_de_estresse.length; i++) {
        const valor_media_movel = (i > VALOR_MEDIA_MOVEL_DIAS ? (VALOR_MEDIA_MOVEL_DIAS + 1) : (i + 1))
        let sum = 0;
        for (let j = 0; j < valor_media_movel; j++) {
            sum += nivel_de_estresse[i - j].nivel
        }
        sum = sum / valor_media_movel
        nivel_de_estresse[i].avarage = sum
    }
    for (let i = 0; i < nivel_de_ansiedade.length; i++) {
        const valor_media_movel = (i > VALOR_MEDIA_MOVEL_DIAS ? (VALOR_MEDIA_MOVEL_DIAS + 1) : (i + 1))
        let sum = 0;
        for (let j = 0; j < valor_media_movel; j++) {
            sum += nivel_de_ansiedade[i - j].nivel
        }
        sum = sum / valor_media_movel
        nivel_de_ansiedade[i].avarage = sum
    }
    for (let i = 0; i < nivel_de_humor.length; i++) {
        const valor_media_movel = (i > VALOR_MEDIA_MOVEL_DIAS ? (VALOR_MEDIA_MOVEL_DIAS + 1) : (i + 1))
        let sum = 0;
        for (let j = 0; j < valor_media_movel; j++) {
            sum += nivel_de_humor[i - j].nivel
        }
        sum = sum / valor_media_movel
        nivel_de_humor[i].avarage = sum
    }

    const qualidade_da_alimentacao_Array = qualidade_da_alimentacao.map((value) =>
        [(new Date(value.data_criacao)).getTime(), value.avarage])
    const nivel_de_estresse_Array = nivel_de_estresse.map((value) =>
        [(new Date(value.data_criacao)).getTime(), value.avarage])
    const qualidade_de_sono_Array = qualidade_de_sono.map((value) =>
        [(new Date(value.data_criacao)).getTime(), value.avarage])
    const nivel_de_ansiedade_Array = nivel_de_ansiedade.map((value) =>
        [(new Date(value.data_criacao)).getTime(), value.avarage])
    const nivel_de_humor_Array = nivel_de_humor.map((value) =>
        [(new Date(value.data_criacao)).getTime(), value.avarage])


    const series = []
    series.push(qualidade_de_sono_Array)
    series.push(nivel_de_estresse_Array)
    series.push(qualidade_da_alimentacao_Array)
    series.push(nivel_de_ansiedade_Array)
    series.push(nivel_de_humor_Array)
    return series;
}

export class ChartIppo {

    constructor() {
        this.barSaudeCronica = null;
        this.donutSaudeCronica = null;
        this.barSaudeMental = null;
        this.donutSaudeMental = null;
        this.barAlimentacao = null;
        this.donutAlimentacao = null;
        this.donutColaboradoresCadastradosTotal = null;
        this.donutColaboradoresCadastradosEngajamento = null;
        //
        this.barFelling = null;
    }
    renderAtividadeFisica(data) {
        var arrayLabels = [];
        var arrayDataLabels = Object.keys(data.opcoes);
        for (var i = 0; i < arrayDataLabels.length; i++) {
            arrayLabels[i] = arrayDataLabels[i].split(" ");
        }

        var barOptionAtividadeFisica = {
            chart: {
                height: 400,
                type: 'bar',
                toolbar: {
                    show: false,
                }
            },
            dataLabels: {
                enabled: false,
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                }
            },
            yaxis: {
                labels: {
                    formatter: function (value) {
                        let aux = 0
                        let array_palavras = [""]
                        if (Array.isArray(value))
                            for (let i = 0; i < value.length; i++) {
                                const element = value[i];
                                if (element.length + array_palavras[aux].length < 10) {
                                    array_palavras[aux] =  array_palavras[aux] + " " +element
                                } else {
                                    aux++
                                    array_palavras[aux] = element
                                }
                            }
                        return array_palavras
                    },
                    align: 'right',
                    style: {
                        fontSize: '10px',
                    },
                },
            },
            noData: emptyChart,
            colors: ['#7d30cb'],
            series: [{ data: Object.values(data.opcoes) }],
            xaxis: {
                categories: arrayLabels,
                labels: {
                    style: {
                        fontSize: '10px',
                        fontWeight: 900,
                    },
                }
            }
        }

        this.barAtividadeFisica = new ApexCharts(document.querySelector("#barAtividadeFisica"), barOptionAtividadeFisica);
        this.barAtividadeFisica.render();

        var donutOptionAtividadeFisica = {
            chart: {
                height: 300,
                type: 'donut',
                toolbar: {
                    show: false,
                }
            },
            noData: emptyChart,
            legend: {
                show: true,
                position: 'bottom',
                verticalAlign: 'bottom',
                align: 'center'
            },
            colors: ['#7d30cb', '#bfc9d4'],
            series: [data.totais.indicaram, data.totais.nao_indicaram],
            labels: ["Indicaram alguma prática recorrente.", "Sem nenhuma atividade física e/ou sedentário."],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show: true,
                        position: 'bottom',
                        verticalAlign: 'bottom',
                        align: 'center'
                    }
                }
            }]
        }

        this.donutAtividadeFisica = new ApexCharts(
            document.querySelector("#donutAtividadeFisica"),
            donutOptionAtividadeFisica
        );
        this.donutAtividadeFisica.render();
    }
    updateAtividadeFisica(data) {
        this.barAtividadeFisica.updateSeries([{
            data: Object.values(data.opcoes)
        }]);
        this.donutAtividadeFisica.updateSeries(
            [data.totais.indicaram, data.totais.nao_indicaram]
        );
    }
    renderSaudeAlimentar(data) {
        var arrayLabels = [];
        var arrayDataLabels = Object.keys(data.opcoes);
        for (var i = 0; i < arrayDataLabels.length; i++) {
            arrayLabels[i] = arrayDataLabels[i].split(" ");
        }

        var barOptionAlimentacao = {
            chart: {
                height: 400,
                type: 'bar',
                toolbar: {
                    show: false,
                }
            },
            dataLabels: {
                enabled: false,
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                }
            },
            yaxis: {
                labels: {
                    formatter: function (value) {
                        let aux = 0
                        let array_palavras = [""]
                        if (Array.isArray(value))
                            for (let i = 0; i < value.length; i++) {
                                const element = value[i];
                                if (element.length + array_palavras[aux].length < 14) {
                                    array_palavras[aux] =  array_palavras[aux] + " " +element
                                } else {
                                    aux++
                                    array_palavras[aux] = element
                                }
                            }
                        return array_palavras
                    },
                    align: 'right',
                    style: {
                        fontSize: '10px',
                    },
                },
            },
            noData: emptyChart,
            colors: ['#f8538d'],
            series: [{ data: Object.values(data.opcoes) }],
            xaxis: {
                categories: arrayLabels,
                labels: {
                    style: {
                        fontSize: '10px',
                        fontWeight: 900,
                    },
                }
            }
        }

        this.barAlimentacao = new ApexCharts(document.querySelector("#barAlimentacao"), barOptionAlimentacao);
        this.barAlimentacao.render();

        var donutOptionAlimentacao = {
            chart: {
                height: 300,
                type: 'donut',
                toolbar: {
                    show: false,
                }
            },
            noData: emptyChart,
            legend: {
                show: true,
                position: 'bottom',
                verticalAlign: 'bottom',
                align: 'center'
            },
            colors: ['#f8538d', '#bfc9d4'],
            series: [data.totais.indicaram, data.totais.nao_indicaram],
            labels: ["Indicaram alimentação desregrada ou dieta recorrente.", "Indicaram alimentação balanceada e/ou diferenciada."],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show: true,
                        position: 'bottom',
                        verticalAlign: 'bottom',
                        align: 'center'
                    }
                }
            }]
        }

        this.donutAlimentacao = new ApexCharts(
            document.querySelector("#donutAlimentacao"),
            donutOptionAlimentacao
        );
        this.donutAlimentacao.render();
    }
    updateSaudeAlimentar(data) {
        this.barAlimentacao.updateSeries([{
            data: Object.values(data.opcoes)
        }]);
        this.donutAlimentacao.updateSeries([data.totais.indicaram, data.totais.nao_indicaram]);
    }
    renderSaudeCronica(data) {
        var arrayLabels = [];
        var arrayDataLabels = Object.keys(data.opcoes);
        for (var i = 0; i < arrayDataLabels.length; i++) {
            arrayLabels[i] = arrayDataLabels[i].split(" ");
        }

        var barOptionSaudeCronica = {
            chart: {
                height: 400,
                type: 'bar',
                toolbar: {
                    show: false,
                }
            },
            dataLabels: {
                enabled: false,
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                }
            },
            yaxis: {
                labels: {
                    offsetX: 13,
                    formatter: function (value) {
                        let aux = 0
                        let array_palavras = [""]
                        if (Array.isArray(value))
                            for (let i = 0; i < value.length; i++) {
                                const element = value[i];
                                if (element.length + array_palavras[aux].length < 13) {
                                    array_palavras[aux] =  array_palavras[aux] + " " +element
                                } else {
                                    aux++
                                    array_palavras[aux] = element
                                }
                            }
                        return array_palavras
                    },
                    align: 'right',
                    style: {
                        fontSize: '9px',
                    },
                },
            },
            noData: emptyChart,
            colors: ['#008eff'],
            series: [{ data: Object.values(data.opcoes) }],
            xaxis: {
                categories: arrayLabels,
                labels: {
                    style: {
                        fontSize: '10px',
                        fontWeight: 900,
                    },
                }
            }
        }

        this.barSaudeCronica = new ApexCharts(document.querySelector("#barSaudeCronica"), barOptionSaudeCronica);
        this.barSaudeCronica.render();

        var donutOptionSaudeCronica = {
            chart: {
                height: 300,
                type: 'donut',
                toolbar: {
                    show: false,
                }
            },
            legend: {
                show: true,
                position: 'bottom',
                verticalAlign: 'bottom',
                align: 'center'
            },
            noData: emptyChart,
            colors: ['#008eff', '#bfc9d4'],
            series: [data.totais.indicaram, data.totais.nao_indicaram],
            labels: ["Indicaram alguma doença crônica.", "Não indicaram doença crônica."],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show: true,
                        position: 'bottom',
                        verticalAlign: 'bottom',
                        align: 'center'
                    }
                }
            }]
        }

        this.donutSaudeCronica = new ApexCharts(
            document.querySelector("#donutSaudeCronica"),
            donutOptionSaudeCronica
        );
        this.donutSaudeCronica.render();
    }
    updateSaudeCronica(data) {
        this.barSaudeCronica.updateSeries([{
            data: Object.values(data.opcoes)
        }]);
        this.donutSaudeCronica.updateSeries([data.totais.indicaram, data.totais.nao_indicaram]);
    }
    renderSaudeMental(data) {
        var arrayLabels = [];
        var arrayDataLabels = Object.keys(data.opcoes);
        for (var i = 0; i < arrayDataLabels.length; i++) {
            arrayLabels[i] = arrayDataLabels[i].split(" ");
        }

        var barOptionSaudeMental = {
            chart: {
                height: 400,
                type: 'bar',
                toolbar: {
                    show: false,
                }
            },
            dataLabels: {
                enabled: false,
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                }
            },
            yaxis: {
                labels: {
                    offsetX: 13,
                    formatter: function (value) {
                        let aux = 0
                        let array_palavras = [""]
                        if (Array.isArray(value))
                            for (let i = 0; i < value.length; i++) {
                                const element = value[i];
                                if (element.length + array_palavras[aux].length < 15) {
                                    array_palavras[aux] =  array_palavras[aux] + " " +element
                                } else {
                                    aux++
                                    array_palavras[aux] = element
                                }
                            }
                        return array_palavras
                    },
                    align: 'right',
                    style: {
                        fontSize: '10px',
                    },
                },
            },
            noData: emptyChart,
            colors: ['#e95f2b'],
            series: [{ data: Object.values(data.opcoes) }],
            xaxis: {
                categories: arrayLabels,
                labels: {
                    style: {
                        fontSize: '10px',
                        fontWeight: 900,
                    },
                }
            }
        }

        this.barSaudeMental = new ApexCharts(document.querySelector("#barSaudeMental"), barOptionSaudeMental);
        this.barSaudeMental.render();

        var donutOptionSaudeMental = {
            chart: {
                height: 300,
                type: 'donut',
                toolbar: {
                    show: false,
                }
            },
            legend: {
                show: true,
                position: 'bottom',
                verticalAlign: 'bottom',
                align: 'center'
            },
            noData: emptyChart,
            colors: ['#e95f2b', '#bfc9d4'],
            series: [data.totais.indicaram, data.totais.nao_indicaram],
            labels: ["Indicaram algum problema de ordem mental.", "Não indicaram problemas de ordem mental."],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show: true,
                        position: 'bottom',
                        verticalAlign: 'bottom',
                        align: 'center'
                    }
                }
            }]
        }

        this.donutSaudeMental = new ApexCharts(
            document.querySelector("#donutSaudeMental"),
            donutOptionSaudeMental
        );
        this.donutSaudeMental.render();
    }
    updateSaudeMental(data) {
        this.barSaudeMental.updateSeries([{
            data: Object.values(data.opcoes)
        }]);
        this.donutSaudeMental.updateSeries([data.totais.indicaram, data.totais.nao_indicaram]);
    }
    renderColaboradoresCadastradosTotal(data) {
        var cadastrados = data.cadastrados_total.s;
        var baseTotal = data.cadastrados_total.n;


        var donutOptionColaboradoresCadastradosTotal = {
            chart: {
                height: 300,
                type: 'donut',
                toolbar: {
                    show: false,
                }
            },
            title: {
                text: 'Cadastrados X Base Total',
                align: 'center',
                margin: 10,
                offsetX: 0,
                offsetY: 0,
                floating: false,
                style: {
                    fontSize: '14px',
                    fontWeight: 'bold',
                    fontFamily: undefined,
                    color: '#263238'
                }
            },
            legend: {
                show: true,
                position: 'bottom',
                verticalAlign: 'bottom',
                align: 'center'
            },
            colors: ['#009688', '#bfc9d4'],
            series: [cadastrados, baseTotal],
            labels: ["Cadastrados", "Base Total"],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show: true,
                        position: 'bottom',
                        verticalAlign: 'bottom',
                        align: 'center'
                    }
                }
            }]
        }

        this.donutColaboradoresCadastradosTotal = new ApexCharts(
            document.querySelector("#donutColaboradoresCadastradosTotal"),
            donutOptionColaboradoresCadastradosTotal
        );
        this.donutColaboradoresCadastradosTotal.render();
    }
    updateColaboradoresCadastradosTotal(data) {
        var cadastrados = data.cadastrados_total.s;
        var baseTotaal = data.cadastrados_total.n;
        this.donutColaboradoresCadastradosTotal.updateSeries([cadastrados, baseTotaal]);
    }
    renderColaboradoresCadastradosEngajamento(data) {
        var engajados = data.cadastrados_engajamento.s;
        var cadastrados = data.cadastrados_engajamento.n;


        var donutOptionColaboradoresCadastradosEngajamento = {
            chart: {
                height: 300,
                type: 'donut',
                toolbar: {
                    show: false,
                }
            },
            title: {
                text: 'Engajamento X Cadastrados',
                align: 'center',
                margin: 10,
                offsetX: 0,
                offsetY: 0,
                floating: false,
                style: {
                    fontSize: '14px',
                    fontWeight: 'bold',
                    fontFamily: undefined,
                    color: '#263238'
                }
            },
            legend: {
                show: true,
                position: 'bottom',
                verticalAlign: 'bottom',
                align: 'center'
            },
            colors: ['#009688', '#bfc9d4'],
            series: [engajados, cadastrados],
            labels: ["Engajamento", "Cadastrados"],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show: true,
                        position: 'bottom',
                        verticalAlign: 'bottom',
                        align: 'center'
                    }
                }
            }]
        }

        this.donutColaboradoresCadastradosEngajamento = new ApexCharts(
            document.querySelector("#donutColaboradoresCadastradosEngajamento"),
            donutOptionColaboradoresCadastradosEngajamento
        );
        this.donutColaboradoresCadastradosEngajamento.render();
    }
    updateColaboradoresCadastradosEngajamento(data) {
        var engajamento = data.cadastrados_engajamento.s;
        var cadastrados = data.cadastrados_engajamento.n;
        this.donutColaboradoresCadastradosEngajamento.updateSeries([engajamento, cadastrados]);
    }
    renderFelling(data) {
        const series = returnFellingSeries(data)
        var barFelling = {
            series: [
                {
                    name: "Qualidade de Sono",
                    data: series[0]
                }, {
                    name: "Nível de estresse",
                    data: series[1]
                }, {
                    name: "Qualidade de alimentação",
                    data: series[2]
                }, {
                    name: "Nível de ansiedade",
                    data: series[3]
                }, {
                    name: "Nível de humor",
                    data: series[4]
                }],
            stroke: {
                width: 4,
                curve: 'smooth',
                dashArray: 0,
            },
            chart: {
                id: 'line-datetime',
                type: 'line',
                height: 350,
                zoom: {
                    autoScaleYaxis: true
                }
            },
            grid: {
                show: true,
                borderColor: '#f1f1f1',
            },
            xaxis: {
                type: 'datetime',
            },
            yaxis: [{
                min: 1,
                max: 5,
                labels: {
                    formatter: function (val) {
                        return val.toFixed(2)
                    }
                }
            }],
            markers: {
                size: 7
            },
            tooltip: {
                enabled: false,
            },
            colors: ['#8c84fa', '#4dd1a0', '#bc8308', '#bc2308', '#af07f8'],
        };

        this.barFelling = new ApexCharts(document.querySelector("#barFelling"), barFelling);
        this.barFelling.render();
    }
    updateFelling(data) {
        const series = returnFellingSeries(data)
        this.barFelling.updateSeries([
            {
                name: "Qualidade de Sono",
                data: series[0]
            }, {
                name: "Nível de estresse",
                data: series[1]
            }, {
                name: "Qualidade de alimentação",
                data: series[2]
            }, {
                name: "Nível de ansiedade",
                data: series[3]
            }, {
                name: "Nível de humor",
                data: series[4]
            }]);
    }
    renderThermomther(data) {
        const array_media = []

        if (data[0].length > 0) {
            const qualidade_da_alimentacao = data[0].map(el => parseInt(el.nivel))
            const media_alimentacao = qualidade_da_alimentacao.reduce((soma, i) => {
                return soma + i;
            }) / qualidade_da_alimentacao.length;
            array_media.push(media_alimentacao)
        }

        if (data[1].length > 0) {
            const nivel_de_estresse = data[1].map(el =>
                parseInt(el.nivel) === 1 ? 5
                    : (parseInt(el.nivel) === 2 ? 4
                        : (parseInt(el.nivel) === 4 ? 2
                            : (parseInt(el.nivel) === 5 ? 1 : 3))))
            const media_estresse = nivel_de_estresse.reduce((soma, i) => {
                return soma + i;
            }) / nivel_de_estresse.length;
            array_media.push(media_estresse)
        }

        if (data[2].length > 0) {
            const qualidade_de_sono = data[2].map(el => parseInt(el.nivel))
            const media_sono = qualidade_de_sono.reduce((soma, i) => {
                return soma + i;
            }) / qualidade_de_sono.length;
            array_media.push(media_sono)
        }

        if (data[3].length > 0) {
            const nivel_de_ansiedade = data[3].map(el =>
                parseInt(el.nivel) === 1 ? 5
                    : (parseInt(el.nivel) === 2 ? 4
                        : (parseInt(el.nivel) === 4 ? 2
                            : (parseInt(el.nivel) === 5 ? 1 : 3))))
            const media_ansiedade = nivel_de_ansiedade.reduce((soma, i) => {
                return soma + i;
            }) / nivel_de_ansiedade.length;
            array_media.push(media_ansiedade)
        }

        if (data[4].length > 0) {
            const nivel_de_humor = data[4].map(el => parseInt(el.nivel))
            const media_humor = nivel_de_humor.reduce((soma, i) => {
                return soma + i;
            }) / nivel_de_humor.length;
            array_media.push(media_humor)
        }
        const media_global = array_media.length > 0 ? array_media.reduce((soma, i) => {
            return soma + i;
        }) / array_media.length : 0;
        const thermomter_image = document.querySelector(".ther_img");
        const thermomter_image1 = document.querySelector(".ther_img1");
        const media_img = document.querySelector(".media_img");
        const media_img1 = document.querySelector(".media_img1");
        const text_therm = document.querySelector(".text-therm");
        const text_therm1 = document.querySelector(".text-therm1");
        let status = "sem-dados"
        if (media_global <= (5 / 3) && media_global > 0) {
            status = "ruim"
            const text = "A avaliação da saúde dos colaboradores monitorados está crítico. É necessária uma ação preventiva para evitar impactos na saúde das pessoas e da empresa. Vamos entrar em contato com você com alguma solução rápida ok!? Conte com os profissionais da Ippo."
            text_therm.textContent = text
            text_therm1.textContent = text
        } else if (media_global <= (10 / 3) && media_global > (5 / 3)) {
            status = "regular"
            const text = " A condição de saúde dos colaboradores monitorados está em um nível de atenção. Estamos observando a evolução das médias e caso entre em um nível crítico, lhe alertamos e juntos vamos criar a solução ok!?"
            text_therm.textContent = text
            text_therm1.textContent = text
        } else if (media_global >= (10 / 3)) {
            status = "otimo"
            const text = "Parabéns! A média da condição geral de saúde dos seus colaboradores está em um nível excelente. Continue assim!"
            text_therm.textContent = text
            text_therm1.textContent = text
        } else {
            const text = "Sem Dados!"
            text_therm.textContent = text
            text_therm1.textContent = text
        }
        thermomter_image.src = `../src/assets/img/${status}.png`;
        thermomter_image1.src = `../src/assets/img/${status}.png`;
        media_img.src = `../src/assets/img/icon-${status}.png`;
        media_img1.src = `../src/assets/img/icon-${status}.png`;
    }
}
