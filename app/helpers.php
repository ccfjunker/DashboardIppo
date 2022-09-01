<?php

use App\Util\Parametro;

function getUsernameFromEmailAuthenticated(){
    $email = Auth::user()->email;
    return explode('@', $email)[0];
}
function isUserAdmin(): bool{
    return Auth::user()->funcao == Parametro::FUNCAO_ADMIN;
}

function helperIndexGenero($value){
    return array_search(ucfirst($value), retornaArrayGenero());
}

function helperDescricaoGenero($value): string
{
    return retornaArrayGenero()[$value];
}

function helperIndexTabalho($value){
    return array_search(ucfirst($value), retornaArrayTrabalho());
}

function helperDescricaoTabalho($value): string
{
    return retornaArrayTrabalho()[$value];
}

function helperDescricaoFuncao($value): string
{
    return retornaArrayFuncao()[$value];
}

function retornaArrayTrabalho(): array
{
    return array(
        'HO'=>'Home Office',
        'HI'=>'Hibrido',
        'PS'=>'Presencial',
	null =>'Sem informacao'
    );
}

function retornaArrayGenero(): array
{
    return array(
        'H'=>'Homem',
        'M'=>'Mulher',
	null =>'Sem informacao'
    );
}

function retornaArrayFuncao(): array
{
    return array(
        'A'=>'Admin',
        'E'=>'Empresa'
    );
}

function dateDB($valor){
    return \Carbon\Carbon::createFromFormat('d/m/Y',$valor);
}

function dateTimeDB($valor){
    return date("Y-m-d H:i:s", strtotime($valor));
}

function cast($instance, $className)
{
    return unserialize(sprintf(
        'O:%d:"%s"%s',
        strlen($className),
        $className,
        strstr(strstr(serialize($instance), '"'), ':')
    ));
}

function maskTelefone($str){
    return mask(Parametro::MASK_CELULAR, $str);
}

function maskCPF($str){
    return mask(Parametro::MASK_CPF, $str);
}

function mask($mask,$str){

    $str = str_replace(" ","",$str);

    for($i=0;$i<strlen($str);$i++){
        $mask[strpos($mask,"#")] = $str[$i];
    }

    return $mask;

}

