<?php

function isUserAdmin(): bool{
    return Auth::user()->funcao == \App\Util\Parametro::FUNCAO_ADMIN;
}

function helperIndexGenero($value){
    return array_search(ucfirst($value), retornaArrayGenero());
}

function helperDescricaoGenero($value){
    return retornaArrayGenero()[$value];
}

function helperIndexTabalho($value){
    return array_search(ucfirst($value), retornaArrayTrabalho());
}

function helperDescricaoTabalho($value){
    return retornaArrayTrabalho()[$value];
}

function helperDescricaoFuncao($value){
    return retornaArrayFuncao()[$value];
}

function retornaArrayTrabalho(){
    return array(
        'HO'=>'Home Office',
        'HI'=>'Hibrido',
        'PS'=>'Presencial'
    );
}

function retornaArrayGenero(){
    return array(
        'H'=>'Homem',
        'M'=>'Mulher'
    );
}

function retornaArrayFuncao(){
    return array(
        'A'=>'Admin',
        'E'=>'Empresa'
    );
}

function dateDB($valor){
    return date("Y-m-d", strtotime($valor));
}

function dateTimeDB($valor){
    return date("Y-m-d H:i:s", strtotime($valor));
}

function cast($instance, $className)
{
    return unserialize(sprintf(
        'O:%d:"%s"%s',
        \strlen($className),
        $className,
        strstr(strstr(serialize($instance), '"'), ':')
    ));
}

function maskTelefone($str){
    return mask(\App\Util\Parametro::MASK_CELULAR, $str);
}

function maskCPF($str){
    return mask(\App\Util\Parametro::MASK_CPF, $str);
}

function mask($mask,$str){

    $str = str_replace(" ","",$str);

    for($i=0;$i<strlen($str);$i++){
        $mask[strpos($mask,"#")] = $str[$i];
    }

    return $mask;

}

