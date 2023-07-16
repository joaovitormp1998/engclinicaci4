<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        include("conexao.php");

        $sqlEquipamentos = "SELECT * FROM equipamento";
        $resultadoEquipamentos = mysqli_query($mysqli, $sqlEquipamentos);
        $qtdEquipamentos = mysqli_num_rows($resultadoEquipamentos);

        $hoje = date('Y-m-d H:i:s');
        $datapreventiva = strtotime($hoje);
        $datafinal = strtotime('+7 day', $datapreventiva);
        $datecerta = date('Y-m-d', $datafinal);

        $sqlPreventivas = "SELECT * FROM `ordem_servico` WHERE fk_ordem_servico_tipo = 1 AND data_proxima = '$datecerta'";
        $resultadoPreventivas = mysqli_query($mysqli, $sqlPreventivas);
        $qtdPreventivas = mysqli_num_rows($resultadoPreventivas);

        $sqlAtrasadas = "SELECT * FROM `ordem_servico` AS os JOIN `equipamento` AS eq ON os.fk_equipamento = eq.id WHERE fk_ordem_servico_tipo = 1 AND data_proxima < CURRENT_DATE";
        $resultadoAtrasadas = mysqli_query($mysqli, $sqlAtrasadas);
        $qtdAtrasadas = mysqli_num_rows($resultadoAtrasadas);

        $data = [
            'qtdEquipamentos' => $qtdEquipamentos,
            'qtdPreventivas' => $qtdPreventivas,
            'qtdAtrasadas' => $qtdAtrasadas
        ];

        $content = view('home/index', $data);

        return view('common/template', ['content' => $content]);
    }
}
