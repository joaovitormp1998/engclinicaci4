<?php

namespace App\Controllers;

use App\Models\EquipamentoModel;
use App\Models\BokuModel;
use App\Models\OrdemTipoModel;
use App\Models\SetorModel;
use App\Models\RelatorioModel;
use Dompdf\Dompdf;

class Relatorio extends BaseController
{
    public function index()
    {
        mDebug($_SERVER);
        $array = [];
        $setor = new SetorModel();
        $equipamento = new EquipamentoModel();
        $relatorio = new RelatorioModel();
        $osTipo = new OrdemTipoModel();
        $equipamentosOs = [];
        $buscaEquipamento = [];
        $buscaOs = [];
        $buscaOsEquipamento = [];


        if ($_POST['setor']) {
            $buscaEquipamento['fk_setor'] = $_POST['setor'];
            $buscaOsEquipamento['fk_setor'] = $_POST['setor'];
        }
        if ($_POST['id']) {
            $buscaEquipamento['id'] = $_POST['id'];
            $buscaOsEquipamento['fk_equipamento'] = $_POST['id'];
        }

        if ($_POST['tipoos']) {
            $buscaOsEquipamento['fk_ordem_servico_tipo'] = $_POST['tipoos'];
            $buscaOs['id'] = $_POST['tipoos'];
        }
        if ($_POST['ano']) {
            // $buscaOs['ano'] = $_POST['ano'];
            $buscaOsEquipamento['ano'] = $_POST['ano'];
        }
        if ($array != null) {
            $teste = $relatorio->where($array)->findAll();
        }

        if ($_POST['tipo_busca']) {
            if ($_POST['tipo_busca'] == "equipamento") {
                $todos = $equipamento->where($buscaEquipamento)->findAll();
                foreach ($todos as $idx => $eq) {
                    $buscaOsEquipamento['fk_equipamento'] = $eq['id'];
                    $equipamentosOs[$idx] = $eq;
                    $equipamentosOs[$idx]["os"] = $relatorio->where($buscaOsEquipamento)->findAll();
                }
            } else {
                $todos = $osTipo->where($buscaOs)->findAll();
                foreach ($todos as $idx => $os) {
                    $buscaOsEquipamento['fk_ordem_servico_tipo'] = $os['id'];
                    $equipamentosOs[$idx] = $os;
                    $equipamentosOs[$idx]["os"] = $relatorio->where($buscaOsEquipamento)->findAll();
                }
            }
        }
        $dados = [
            'setor' => $setor->findAll(),
            'equipamento' => $equipamento->findAll(),
            'relatorio' => $equipamentosOs,
        ];
        $_SESSION['relatorio'] = $equipamentosOs;

        echo view('common/cabecalho');
        echo view('relatorio/index', $dados);

        echo view('common/rodape');
    }
    public function printpdf()

    {
        $dados = [
            'relatorio' => $_SESSION['relatorio']
        ];

        $html = view('relatorio/output', $dados);
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
