export class UtilIppo{
    constructor(){

    }

    static showModal(id){
        $(id).modal('show');
    }

    static hideModal(id){
        $(id).modal('hide');
    }

    static setMessageModalError(message){
        $("#messageModalError").html(message);
    }

    static showModalError(errors){

        this.setMessageModalError('Ops! Houve um erro ao processar os dados. Tente novamente.')
        this.showModal('#modalError');
    }

    static hideModalError(){
        this.hideModal('#modalError');
    }

    static showModalLoading(){
        this.showModal('#modalLoading');
    }

    static hideModalLoading(){
        this.hideModal('#modalLoading');
    }

    static dataFormatada(data) {
        var dia  = data.split("-")[2];
        var mes  = data.split("-")[1];
        var ano  = data.split("-")[0];

        return ("0"+dia).slice(-2) + '/' + ("0"+mes).slice(-2) + '/' + ano;
    }

    static mask(value, pattern) {
        let i = 0;
        const v = value.toString();
        return pattern.replace(/#/g, _ => v[i++]);
    }

    static maskCPF (value){
        return this.mask(value, '###.###.###-##');
    }

    static maskTelefone (value){
        return this.mask(value, '(##) ####-####');
    }

    static maskCelular (value){
        return this.mask(value, '(##) #####-####');
    }
}



