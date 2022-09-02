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

    static showUserMessagesErrorValidation(errors){
        var e = errors['errors'];
        if(e.nome !== undefined){
            $("#inputNomeError").html(e.nome);
            $("#inputNomeError").show();
        }

        if(e.sobrenome !== undefined){
            $("#inputSobrenomeError").html(e.sobrenome);
            $("#inputSobrenomeError").show();
        }

        if(e.nome_social !== undefined){
            $("#inputNomeSocialError").html(e.nome_social);
            $("#inputNomeSocialError").show();
        }

        if(e.cpf !== undefined){
            $("#inputCPFError").html(e.cpf);
            $("#inputCPFError").show();
        }

        if(e.telefone !== undefined){
            $("#inputTelefoneError").html(e.telefone);
            $("#inputTelefoneError").show();
        }

        if(e.email !== undefined){
            $("#inputEmailError").html(e.email);
            $("#inputEmailError").show();
        }

        if(e.password !== undefined){
            $("#inputPasswordError").html(e.password);
            $("#inputPasswordError").show();
        }

        if(e.password_confirmation !== undefined){
            $("#inputConfirmPasswordError").html(e.password_confirmation);
            $("#inputConfirmPasswordError").show();
        }

        if(e.id_empresa !== undefined){
            $("#selectEmpresaError").html(e.id_empresa);
            $("#selectEmpresaError").show();
        }

        if(e.data_nascimento !== undefined){
            $("#inputDataNascimentoError").html(e.data_nascimento);
            $("#inputDataNascimentoError").show();
        }

    }


    static showModalError(errors){
        var mensagem = '';

        mensagem = 'Ops! Houve um erro ao processar os dados. Tente novamente.';

        this.setMessageModalError(mensagem)
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



