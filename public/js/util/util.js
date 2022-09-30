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

    static showFuncionarioMessagesErrorValidation(errors){
        var e = errors['errors'];

        if(e.nome !== undefined){
            $("#inputNomeError").html(e.nome);
            $("#inputNomeError").show();
        }else{
            $("#inputNomeError").html('');
            $("#inputNomeError").hide();
        }

        if(e.sobrenome !== undefined){
            $("#inputSobrenomeError").html(e.sobrenome);
            $("#inputSobrenomeError").show();
        }else{
            $("#inputSobrenomeError").html('');
            $("#inputSobrenomeError").hide();
        }

        if(e.nome_social !== undefined){
            $("#inputNomeSocialError").html(e.nome_social);
            $("#inputNomeSocialError").show();
        }else{
            $("#inputNomeSocialError").html('');
            $("#inputNomeSocialError").hide();
        }

        if(e.telefone !== undefined){
            $("#inputTelefoneError").html(e.telefone);
            $("#inputTelefoneError").show();
        }else{
            $("#inputTelefoneError").html('');
            $("#inputTelefoneError").hide();
        }

        if(e.cpf !== undefined){
            $("#inputCPFError").html(e.cpf);
            $("#inputCPFError").show();
        }else{
            $("#inputCPFError").html('');
            $("#inputCPFError").hide();
        }

        if(e.email !== undefined){
            $("#inputEmailError").html(e.email);
            $("#inputEmailError").show();
        }else{
            $("#inputEmailError").html('');
            $("#inputEmailError").hide();
        }

        if(e.data_nascimento !== undefined){
            $("#inputDataNascimentoError").html(e.data_nascimento);
            $("#inputDataNascimentoError").show();
        }else{
            $("#inputDataNascimentoError").html('');
            $("#inputDataNascimentoError").hide();
        }

        if(e.trabalho !== undefined){
            $("#selectTrabalhoError").html(e.trabalho);
            $("#selectTrabalhoError").show();
        }else{
            $("#selectTrabalhoError").html('');
            $("#selectTrabalhoError").hide();
        }

        if(e.genero !== undefined){
            $("#selectGeneroError").html(e.genero);
            $("#selectGeneroError").show();
        }else{
            $("#selectGeneroError").html('');
            $("#selectGeneroError").hide();
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

    static showModalAddFuncionario(data){
        if(data){
            UtilIppo.preencheCamposModalFuncionario(data);
        }else{
            UtilIppo.limpaCamposModalFuncionario(data)
        }
        UtilIppo.showModal('#modalAddFuncionario');
    }

    static preencheCamposModalFuncionario(data){
        $('#modalAddFuncionario input[name=id]').val(data.id);
        $('#modalAddFuncionario input[name=nome]').val(data.nome);
        $('#modalAddFuncionario input[name=sobrenome]').val(data.sobrenome);
        $('#modalAddFuncionario input[name=nome_social]').val(data.nome_social);
        $('#modalAddFuncionario input[name=cpf]').val(data.cpf);
        $('#modalAddFuncionario input[name=telefone]').val(data.telefone);
        $('#modalAddFuncionario input[name=email]').val(data.email);
        $('#modalAddFuncionario input[name=data_nascimento]').val(data.data_nascimento);
        $('#modalAddFuncionario select[name=genero] option').filter(function(i, e) { return $(e).text() === data.genero}).prop('selected', true);
        $('#modalAddFuncionario select[name=trabalho] option').filter(function(i, e) { return $(e).text() === data.trabalho}).prop('selected', true);
        $('#modalAddFuncionario select[name=engajou] option').filter(function(i, e) { return $(e).text() === data.engajou}).prop('selected', true);
    }

    static limpaCamposModalFuncionario(){
        $('#modalAddFuncionario input[name=id]').val('');
        $('#modalAddFuncionario input[name=nome]').val('');
        $('#modalAddFuncionario input[name=sobrenome]').val('');
        $('#modalAddFuncionario input[name=nome_social]').val('');
        $('#modalAddFuncionario input[name=cpf]').val('');
        $('#modalAddFuncionario input[name=telefone]').val('');
        $('#modalAddFuncionario input[name=email]').val('');
        $('#modalAddFuncionario input[name=data_nascimento]').val('');
        $("#modalAddFuncionario select[name=genero]").val($("#modalAddFuncionario select[name=genero] option:first").val());
        $("#modalAddFuncionario select[name=trabalho]").val($("#modalAddFuncionario select[name=trabalho] option:first").val());
        $("#modalAddFuncionario select[name=engajou]").val($("#modalAddFuncionario select[name=engajou] option:first").val());
    }


    static hideModalAddUsuario(){
        this.hideModal('#modalAddUsuario');
    }

    static hideModalAddFuncionario(){
        this.hideModal('#modalAddFuncionario');
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
	if (!data)
	    return "";
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

    static getLabelsChartFromLongTexts(text){
        let textSplited = text.split(" ");
        if(textSplited.length <= 1){
            return text;
        }
        return this.getArrayLabelsFromTextSplited(textSplited);
    }

    static getArrayLabelsFromTextSplited(textSplited){
        var ultimoAdicionado = textSplited[0];
        var textLabel = [ultimoAdicionado];
        var lastPositionSplited = textSplited.length - 1;
        var lastPositionLabel = textLabel.length - 1;
        for(var i=1; i<=lastPositionSplited; i++){
            let atual = textSplited[i];
            let concatenado = ultimoAdicionado + " " + atual;
            if(concatenado.length <= 9 ){
                textLabel[lastPositionLabel] = concatenado;
                ultimoAdicionado = concatenado;
            }else{
                textLabel.push(atual);
            }

        }
        return textLabel;
    }
}



