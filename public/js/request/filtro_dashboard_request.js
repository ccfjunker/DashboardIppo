export class FiltroDashboardRequest {
    constructor(_token, selectEmpresa, inputDataInicial, inputDataFinal, inputIdade, selectGenero, selectTrabalho) {
        this._token = _token;
        this.selectEmpresa = selectEmpresa;
        this.inputDataInicial = inputDataInicial;
        this.inputDataFinal = inputDataFinal;
        this.inputIdade = inputIdade;
        this.selectGenero = selectGenero;
        this.selectTrabalho = selectTrabalho;
    }
}
