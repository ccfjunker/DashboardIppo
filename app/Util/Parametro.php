<?php

namespace App\Util;

class Parametro
{
    const FUNCAO_ADMIN = 'A';
    const FUNCAO_EMPRESA = 'E';
    const OPCOES_SAUDE_CRONICA = [
        "Obesidade", "Colesterol Alto", "Diabetes", "Doença Cardiovascular", "Doença Respiratória DPOC", "Hipertensão", "Outro", "Não possuo doenças crônicas"
    ];

    const OPCOES_SAUDE_MENTAL = [
        "Crise de Ansiedade","Depressão","Sindrome do Pânico","Não tive ou não tenho essa necessidade","TDAH","Outro", "Estresse Pós Traumático",
    ];

    const MASK_CPF = '###.###.###-##';
    const MASK_CELULAR = '(##) #####-####';
    const MASK_TELEFONE = '(##) ####-####';



    const OPCOES_SAUDE_ALIMENTAR = [
        "Desregrada e Aleatória", "Balanceada", "Sou Vegetariano(a) ou Vegano(a)", "Vivo de Dieta", "Vivo de Dieta"
    ];

    const OPCOES_ATIVIDADE_FISICA = [
        "Não faço exercícios",
        "1 vez por semana",
        "3 vezes por semana",
       "5 à 7 vezes por semana"
    ];
}
