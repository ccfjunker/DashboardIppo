var emptyChart = {
    text: 'Carregando...',
    align: 'center',
    verticalAlign: 'middle',
    offsetX: 0,
    offsetY: 0
};

var barAtividadeFisica = null;
var donutAtividadeFisica = null;
var barSaudeCronica = null;
var donutSaudeCronica = null;
var barSaudeMental = null;
var donutSaudeMental = null;
var barAlimentacao = null;
var donutAlimentacao = null;
var donutColaboradoresCadastradosTotal = null;
var donutColaboradoresCadastradosEngajamento = null;


var chart = {
    renderAtividadeFisica : function(data) {
        var arrayLabels = [];
        var arrayDataLabels = Object.keys(data.opcoes);
        for(var i=0; i<arrayDataLabels.length; i++){
            arrayLabels[i] = arrayDataLabels[i].split(" ");
        }

        var barOptionAtividadeFisica = {
            chart: {
                height: 300,
                type: 'bar',
                toolbar: {
                    show: false,
                }
            },
            noData: emptyChart,
            colors: ['#7d30cb'],
            series: [{ data: Object.values(data.opcoes)}],
            xaxis: {
                categories : arrayLabels,
                labels: {
                    style: {
                        fontSize: '10px',
                        fontWeight: 900,
                    },
                }
            }
        }

        barAtividadeFisica = new ApexCharts(document.querySelector("#barAtividadeFisica"), barOptionAtividadeFisica);
        barAtividadeFisica.render();

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
                show:true,
                position: 'bottom',
                verticalAlign: 'bottom',
                align:'center'
            },
            colors: ['#7d30cb', '#bfc9d4'],
            series: [data.totais.indicaram, data.totais.nao_indicaram],
            labels: ["Indicaram prática de atividade física.","Não prática de atividade física."],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show:true,
                        position: 'bottom',
                        verticalAlign: 'bottom',
                        align:'center'
                    }
                }
            }]
        }

        donutAtividadeFisica = new ApexCharts(
            document.querySelector("#donutAtividadeFisica"),
            donutOptionAtividadeFisica
        );
        donutAtividadeFisica.render();
    },
    updateAtividadeFisica : function (data) {
        console.log(Object.values(data.opcoes));
        barAtividadeFisica.updateSeries([{
            data: Object.values(data.opcoes)
        }]);
        donutAtividadeFisica.updateSeries(
            [data.totais.indicaram, data.totais.nao_indicaram]
        );
    },
    renderSaudeAlimentar : function(data) {
        var arrayLabels = [];
        var arrayDataLabels = Object.keys(data.opcoes);
        for(var i=0; i<arrayDataLabels.length; i++){
            arrayLabels[i] = arrayDataLabels[i].split(" ");
        }

        var barOptionAlimentacao = {
            chart: {
                height: 300,
                type: 'bar',
                toolbar: {
                    show: false,
                }
            },
            noData: emptyChart,
            colors: ['#f8538d'],
            series: [{ data: Object.values(data.opcoes)}],
            xaxis: {
                categories : arrayLabels,
                labels: {
                    style: {
                        fontSize: '10px',
                        fontWeight: 900,
                    },
                }
            }
        }

        barAlimentacao = new ApexCharts(document.querySelector("#barAlimentacao"), barOptionAlimentacao);
        barAlimentacao.render();

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
                show:true,
                position: 'bottom',
                verticalAlign: 'bottom',
                align:'center'
            },
            colors: ['#f8538d', '#bfc9d4'],
            series: [data.totais.indicaram, data.totais.nao_indicaram],
            labels: ["Indicaram como veem sua alimentação.","Não como veem sua alimentação."],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show:true,
                        position: 'bottom',
                        verticalAlign: 'bottom',
                        align:'center'
                    }
                }
            }]
        }

        donutAlimentacao = new ApexCharts(
            document.querySelector("#donutAlimentacao"),
            donutOptionAlimentacao
        );
        donutAlimentacao.render();
    },
    updateSaudeAlimentar : function (data) {
        barAlimentacao.updateSeries([{
            data: Object.values(data.opcoes)
        }]);
        donutAlimentacao.updateSeries([data.totais.indicaram, data.totais.nao_indicaram]);
    },
    renderSaudeCronica : function(data) {
        var arrayLabels = [];
        var arrayDataLabels = Object.keys(data.opcoes);
        for(var i=0; i<arrayDataLabels.length; i++){
            arrayLabels[i] = arrayDataLabels[i].split(" ");
        }

        var barOptionSaudeCronica = {
            chart: {
                height: 300,
                type: 'bar',
                toolbar: {
                    show: false,
                }
            },
            noData: emptyChart,
            colors: ['#008eff'],
            series: [{ data: Object.values(data.opcoes)}],
            xaxis: {
                categories : arrayLabels,
                labels: {
                    style: {
                        fontSize: '10px',
                        fontWeight: 900,
                    },
                }
            }
        }

        barSaudeCronica = new ApexCharts(document.querySelector("#barSaudeCronica"), barOptionSaudeCronica);
        barSaudeCronica.render();

        var donutOptionSaudeCronica = {
            chart: {
                height: 300,
                type: 'donut',
                toolbar: {
                    show: false,
                }
            },
            legend: {
                show:true,
                position: 'bottom',
                verticalAlign: 'bottom',
                align:'center'
            },
            noData: emptyChart,
            colors: ['#008eff', '#bfc9d4'],
            series: [data.totais.indicaram, data.totais.nao_indicaram],
            labels: ["Indicaram alguma doença crônica.","Não indicaram doença crônica."],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show:true,
                        position: 'bottom',
                        verticalAlign: 'bottom',
                        align:'center'
                    }
                }
            }]
        }

        donutSaudeCronica = new ApexCharts(
            document.querySelector("#donutSaudeCronica"),
            donutOptionSaudeCronica
        );
        donutSaudeCronica.render();
},
    updateSaudeCronica : function (data) {
        barSaudeCronica.updateSeries([{
            data: Object.values(data.opcoes)
        }]);
        donutSaudeCronica.updateSeries([data.totais.indicaram, data.totais.nao_indicaram]);
    },
    renderSaudeMental : function(data) {
        var arrayLabels = [];
        var arrayDataLabels = Object.keys(data.opcoes);
        for(var i=0; i<arrayDataLabels.length; i++){
            arrayLabels[i] = arrayDataLabels[i].split(" ");
        }

        var barOptionSaudeMental = {
            chart: {
                height: 300,
                type: 'bar',
                toolbar: {
                    show: false,
                }
            },
            noData: emptyChart,
            colors: ['#e95f2b'],
            series: [{ data: Object.values(data.opcoes)}],
            xaxis: {
                categories : arrayLabels,
                labels: {
                    style: {
                        fontSize: '10px',
                        fontWeight: 900,
                    },
                }
            }
        }

        barSaudeMental = new ApexCharts(document.querySelector("#barSaudeMental"), barOptionSaudeMental);
        barSaudeMental.render();

        var donutOptionSaudeMental = {
            chart: {
                height: 300,
                type: 'donut',
                toolbar: {
                    show: false,
                }
            },
            legend: {
                show:true,
                position: 'bottom',
                verticalAlign: 'bottom',
                align:'center'
            },
            noData: emptyChart,
            colors: ['#e95f2b', '#bfc9d4'],
            series: [data.totais.indicaram, data.totais.nao_indicaram],
            labels: ["Indicaram algum problema de ordem mental.","Não indicaram algum problema de ordem mental."],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show:true,
                        position: 'bottom',
                        verticalAlign: 'bottom',
                        align:'center'
                    }
                }
            }]
        }

        donutSaudeMental = new ApexCharts(
            document.querySelector("#donutSaudeMental"),
            donutOptionSaudeMental
        );
        donutSaudeMental.render();
    },
    updateSaudeMental : function (data) {
        barSaudeMental.updateSeries([{
            data: Object.values(data.opcoes)
        }]);
        donutSaudeMental.updateSeries([data.totais.indicaram, data.totais.nao_indicaram]);
    },
    renderColaboradoresCadastradosTotal : function(data) {
        var cadastrados = data.cadastrados_total.s;
        var naoCadastrados = data.cadastrados_total.n;


        var donutOptionColaboradoresCadastradosTotal = {
            chart: {
                height: 300,
                type: 'donut',
                toolbar: {
                    show: false,
                }
            },
            legend: {
                show:true,
                position: 'bottom',
                verticalAlign: 'bottom',
                align:'center'
            },
            colors: ['#009688', '#bfc9d4'],
            series: [cadastrados, naoCadastrados],
            labels: ["Cadastrados","Não cadastrados"],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show:true,
                        position: 'bottom',
                        verticalAlign: 'bottom',
                        align:'center'
                    }
                }
            }]
        }

        donutColaboradoresCadastradosTotal = new ApexCharts(
            document.querySelector("#donutColaboradoresCadastradosTotal"),
            donutOptionColaboradoresCadastradosTotal
        );
        donutColaboradoresCadastradosTotal.render();
    },
    updateColaboradoresCadastradosTotal : function (data) {
        var cadastrados = data.cadastrados_total.s;
        var naoCadastrados = data.cadastrados_total.n;
        donutColaboradoresCadastradosTotal.updateSeries([cadastrados, naoCadastrados]);
    },
    renderColaboradoresCadastradosEngajamento : function(data) {
        var cadastrados = data.cadastrados_engajamento.s;
        var naoCadastrados = data.cadastrados_engajamento.n;


        var donutOptionColaboradoresCadastradosEngajamento = {
            chart: {
                height: 300,
                type: 'donut',
                toolbar: {
                    show: false,
                }
            },
            legend: {
                show:true,
                position: 'bottom',
                verticalAlign: 'bottom',
                align:'center'
            },
            colors: ['#009688', '#bfc9d4'],
            series: [cadastrados, naoCadastrados],
            labels: ["Cadastrados","Não cadastrados"],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        show:true,
                        position: 'bottom',
                        verticalAlign: 'bottom',
                        align:'center'
                    }
                }
            }]
        }

        donutColaboradoresCadastradosEngajamento = new ApexCharts(
            document.querySelector("#donutColaboradoresCadastradosEngajamento"),
            donutOptionColaboradoresCadastradosEngajamento
        );
        donutColaboradoresCadastradosEngajamento.render();
    },
    updateColaboradoresCadastradosEngajamento : function (data) {
        var cadastrados = data.cadastrados_total.s;
        var naoCadastrados = data.cadastrados_total.n;
        donutColaboradoresCadastradosEngajamento.updateSeries([cadastrados, naoCadastrados]);
    },
};
