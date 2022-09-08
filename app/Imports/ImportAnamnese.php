<?php

namespace App\Imports;

use App\Models\Dashboard\Anamnese;
use App\Models\Empresa\Empresa;
use App\Models\Pessoa\Funcionario;
use App\Services\FuncionarioService;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportAnamnese implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try {
            $anamnese = new Anamnese([
                'data_atualizacao'=>dateTimeDB($row[1]),
                'data_criacao'=>dateTimeDB($row[2]),
                'proprietario'=>$row[3],
                'cronicos'=>$row[5],
                'mental'=>$row[6],
                'alimentacao'=>$row[7],
                'fisico'=>$row[8],
                'id_empresa'=>$this->retornaEmpresaModelDoExcel($row)->id,
                'id_funcionario'=>$this->retornaFuncionarioModelDoExcel($row)->id,
            ]);
            return $anamnese;
        }catch (\Exception $e){

            DB::rollBack();
        }

    }

    private function retornaEmpresaModelDoExcel(array $row){
        $empresa = Empresa::findByCupom($row[17]);
        if(!$empresa){
            return Empresa::inserirArray([
                'nome'=>$row[17],
                'cupom'=>$row[17]
            ]);
        }
        return $empresa;
    }

    private function retornaFuncionarioModelDoExcel(array $row){
        $empresa = $this->retornaEmpresaModelDoExcel($row);
        $funcionario = FuncionarioService::findByCPF($row[4]);
        if(!$funcionario){
            return Funcionario::inserirArray([
                'id_empresa'=>$empresa->id,
                'cpf'=>$row[4],
                'nome'=>$row[9],
                'email'=>$row[10],
                'telefone'=>$row[11],
                'data_nascimento'=>dateDB($row[14]),
                'sobrenome'=>$row[15],
                'nome_social'=>$row[16],
                'engajou'=>'N',
                'genero'=>helperIndexGenero($row[12]),
                'trabalho'=>helperIndexTabalho($row[13]),
            ]);
        }
        return $funcionario;
    }
}
