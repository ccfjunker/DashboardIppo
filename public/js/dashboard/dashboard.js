import { IppoAjaxJSON } from "../ajax/ippo_ajax_json.js";
import { ChartIppo } from "../components/chart.js";
import { UtilIppo } from "../util/util.js";

export class Dashboard {
    constructor() {
        this.chartIppo = new ChartIppo();
    }

    loadDashboardAdmin(request) {
        let ippoAjax = new IppoAjaxJSON("/admin/dataFilteredForTheCharts", "GET", "admin.dashboard").createRequest(request);
        var escopo = this;
        ippoAjax.done(function (data) {
            escopo.setDataDashboard(data);
        });
    }

    refreshDashboardAdmin(request) {
        UtilIppo.showModalLoading();
        let ippoAjax = new IppoAjaxJSON("/admin/dataFilteredForTheCharts", "GET", "admin.dashboard").createRequest(request);
        var escopo = this;
        ippoAjax.done(function (data) {
            UtilIppo.hideModalLoading();
            escopo.updateDataDashboard(data);
        });
    }

    loadDashboard(request) {
        let ippoAjax = new IppoAjaxJSON("/dataFilteredForTheCharts", "GET", "dashboard").createRequest(request);
        var escopo = this;
        ippoAjax.done(function (data) {
            escopo.setDataDashboard(data);
        });
    }

    refreshDashboard(request) {
        UtilIppo.showModalLoading();
        let ippoAjax = new IppoAjaxJSON("/dataFilteredForTheCharts", "GET", "dashboard").createRequest(request);
        var escopo = this;
        ippoAjax.done(function (data) {
            UtilIppo.hideModalLoading();
            escopo.updateDataDashboard(data);
        });
    }

    updateDataDashboard(data) {
        this.updateDataCharts(data);
        this.setDataTabelaFuncionario(data.colaboradores.lista_cadastro);
    }

    setDataDashboard(data) {
        this.setDataCharts(data);
        this.setDataTabelaFuncionario(data.colaboradores.lista_cadastro);
    }

    setDataCharts(data) {
        this.chartIppo.renderColaboradoresCadastradosTotal(data.colaboradores);
        this.chartIppo.renderColaboradoresCadastradosEngajamento(data.colaboradores);
        this.chartIppo.renderSaudeCronica(data.saude_cronica);
        this.chartIppo.renderSaudeMental(data.saude_mental);
        this.chartIppo.renderSaudeAlimentar(data.saude_alimentar);
        this.chartIppo.renderAtividadeFisica(data.atividade_fisica);
        this.chartIppo.renderThermomther(data.fellings);
        this.chartIppo.renderFelling(data.fellings);
    }

    updateDataCharts(data) {

        this.chartIppo.updateColaboradoresCadastradosTotal(data.colaboradores);
        this.chartIppo.updateColaboradoresCadastradosEngajamento(data.colaboradores);
        this.chartIppo.updateSaudeCronica(data.saude_cronica);
        this.chartIppo.updateSaudeMental(data.saude_mental);
        this.chartIppo.updateSaudeAlimentar(data.saude_alimentar);
        this.chartIppo.updateAtividadeFisica(data.atividade_fisica);
        this.chartIppo.renderThermomther(data.fellings);
        this.chartIppo.updateFelling(data.fellings);
    }

    setDataTabelaFuncionario(responseData) {
        var $table = $('#table_funcionario_dashboard tbody');
        let html = '';

        Object.keys(responseData).forEach(function (key) {
            const colaborador = responseData[key];
            html += '<tr>';
            html += '<td>' + UtilIppo.dataFormatada(colaborador.data_nascimento) + '</td>';
            html += '<td className="ps-0">' + colaborador.nome + ' ' + colaborador.sobrenome + '</td>';
            html += '<td className="text-center">' + UtilIppo.maskCPF(colaborador.cpf) + '</td>';
            html += '</tr>';
        });

        $table.html(html);
    }
}
