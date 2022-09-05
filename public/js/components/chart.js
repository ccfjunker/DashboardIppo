var emptyChart = {
    text: 'Carregando...',
    align: 'center',
    verticalAlign: 'middle',
    offsetX: 0,
    offsetY: 0
};



export class ChartIppo{
    constructor() {
        this.barSaudeCronica = null;
        this.donutSaudeCronica = null;
        this.barSaudeMental = null;
        this.donutSaudeMental = null;
        this.barAlimentacao = null;
        this.donutAlimentacao = null;
        this.donutColaboradoresCadastradosTotal = null;
        this.donutColaboradoresCadastradosEngajamento = null;
    }
    renderAtividadeFisica(data) {
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

        this.donutAtividadeFisica = new ApexCharts(
            document.querySelector("#donutAtividadeFisica"),
            donutOptionAtividadeFisica
        );
        this.donutAtividadeFisica.render();
    }
    updateAtividadeFisica (data) {
        console.log(Object.values(data.opcoes));
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

        this.donutAlimentacao = new ApexCharts(
            document.querySelector("#donutAlimentacao"),
            donutOptionAlimentacao
        );
        this.donutAlimentacao.render();
    }
    updateSaudeAlimentar (data) {
        this.barAlimentacao.updateSeries([{
            data: Object.values(data.opcoes)
        }]);
        this.donutAlimentacao.updateSeries([data.totais.indicaram, data.totais.nao_indicaram]);
    }
    renderSaudeCronica(data) {
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

         this.donutSaudeCronica = new ApexCharts(
            document.querySelector("#donutSaudeCronica"),
            donutOptionSaudeCronica
        );
         this.donutSaudeCronica.render();
}
    updateSaudeCronica (data) {
        this.barSaudeCronica.updateSeries([{
            data: Object.values(data.opcoes)
        }]);
         this.donutSaudeCronica.updateSeries([data.totais.indicaram, data.totais.nao_indicaram]);
    }
    renderSaudeMental(data) {
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

        this.donutSaudeMental = new ApexCharts(
            document.querySelector("#donutSaudeMental"),
            donutOptionSaudeMental
        );
        this.donutSaudeMental.render();
    }
    updateSaudeMental (data) {
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
            title:{
                text: 'Cadastrados X Base Total',
                align: 'center',
                margin: 10,
                offsetX: 0,
                offsetY: 0,
                floating: false,
                style: {
                    fontSize:  '14px',
                    fontWeight:  'bold',
                    fontFamily:  undefined,
                    color:  '#263238'
                }
            },
            legend: {
                show:true,
                position: 'bottom',
                verticalAlign: 'bottom',
                align:'center'
            },
            colors: ['#009688', '#bfc9d4'],
            series: [cadastrados, baseTotal],
            labels: ["Cadastrados","Base Total"],
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

        this.donutColaboradoresCadastradosTotal = new ApexCharts(
            document.querySelector("#donutColaboradoresCadastradosTotal"),
            donutOptionColaboradoresCadastradosTotal
        );
        this.donutColaboradoresCadastradosTotal.render();
    }
    updateColaboradoresCadastradosTotal (data) {
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
            title:{
                text: 'Engajamento X Cadastrados',
                align: 'center',
                margin: 10,
                offsetX: 0,
                offsetY: 0,
                floating: false,
                style: {
                    fontSize:  '14px',
                    fontWeight:  'bold',
                    fontFamily:  undefined,
                    color:  '#263238'
                }
            },
            legend: {
                show:true,
                position: 'bottom',
                verticalAlign: 'bottom',
                align:'center'
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
                        show:true,
                        position: 'bottom',
                        verticalAlign: 'bottom',
                        align:'center'
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
    updateColaboradoresCadastradosEngajamento (data) {
        var engajamento = data.cadastrados_engajamento.s;
        var cadastrados = data.cadastrados_engajamento.n;
        this.donutColaboradoresCadastradosEngajamento.updateSeries([engajamento, cadastrados]);
    }
}
