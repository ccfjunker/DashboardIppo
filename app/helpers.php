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

