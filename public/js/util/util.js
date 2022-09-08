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

    static setMessageModalInfo(message){
        $("#messageModalInfo").html(message);
    }

    static showUserMessagesErrorValidation(errors){
        var e = errors['errors'];


        if(e.email !== undefined){
            $("#inputEmailError").html(e.email);
            $("#inputEmailError").show();
        }else{
            $("#inputEmailError").html('');
            $("#inputEmailError").hide();
        }

        if(e.password !== undefined){
            $("#inputPasswordError").html(e.password);
            $("#inputPasswordError").show();
        }else{
            $("#inputPasswordError").html('');
            $("#inputPasswordError").hide();
        }

        if(e.password_confirmation !== undefined){
            $("#inputConfirmPasswordError").html(e.password_confirmation);
            $("#inputConfirmPasswordError").show();
        }else{
            $("#inputConfirmPasswordError").html('');
            $("#inputConfirmPasswordError").hide();
        }

        if(e.id_empresa !== undefined){
            $("#selectEmpresaError").html(e.id_empresa);
            $("#selectEmpresaError").show();
        }else{
            $("#selectEmpresaError").html('');
            $("#selectEmpresaError").hide();
        }


    }

    static showModalInfo(){
        var mensagem = 'Registro salvo com sucesso!';

        this.setMessageModalInfo(mensagem)
        this.showModal('#modalInfo');
    }

    static showModalError(errors){
        var mensagem = '';

        mensagem = 'Ops! Houve um erro ao processar os dados. Tente novamente.';

        this.setMessageModalError(mensagem)
        this.showModal('#modalError');
    }


    static hideModalAddUsuario(){
        this.hideModal('#modalAddUsuario');
    }

    static hideModalError(){
        this.hideModal('#modalAddUsuario');
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



