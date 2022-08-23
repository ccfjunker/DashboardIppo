<?php

namespace App\Util;

class Parametro
{
    const FUNCAO_ADMIN = 'A';
    const FUNCAO_EMPRESA = 'E';
    const OPCOES_SAUDE_CRONICA = [
        "Obesidade", "Hipertensão", "Outro", "Diabetes", "Não possuo doenças crônicas", "Doença Respiratória DPOC", "Colesterol Alto", "Doença Cardiovascular"
    ];

    const OPCOES_SAUDE_MENTAL = [
        "Crise de Ansiedade","Depressão","Sindrome do Pânico","Não tive ou não tenho essa necessidade","TDAH","Outro", "Estresse Pós Traumático",
    ];

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
