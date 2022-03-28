<?php

namespace App\Controllers;

use App\Models\EquipamentoModel;
use App\Models\BokuModel;
use App\Models\SetorModel;
use App\Models\RelatorioModel;
use Dompdf\Dompdf;

class Relatorio extends BaseController
{
    public function index()
    {   $array=[];
        $setor = new SetorModel();
        $equipamento = new EquipamentoModel();
        $relatorio = new RelatorioModel();
        $teste=[];      
        if ($_POST['setor']) {
            $array['fk_setor'] = $_POST['setor'];
        }
        if ($_POST['id']) {
            $array['fk_equipamento'] = $_POST['id'];
        }
        
        if ($_POST['tipoos']) {
            $array['fk_ordem_servico_tipo'] = $_POST['tipoos'];
        }
        if ($_POST['ano']) {
            $array['ano'] = $_POST['ano'];
        } 
        if ($array !=null){
            $teste=$relatorio->where($array)->findAll();
         }
        $dados=[
            'setor'=>$setor->findAll(),
            'equipamento'=>$equipamento->findAll(),
            'relatorio'=>$teste
            ,
       ];
        echo view('common/cabecalho');
        echo view('relatorio/index',$dados);

        echo view('common/rodape');
        
    }
    public function printpdf()
    
    {
        $dados = [];
        if ($_POST['setor']) {
            $dados['fk_setor'] = $_POST['setor'];
        }
        if ($_POST['id']) {
            $dados['fk_equipamento'] = $_POST['id'];
        }
        
        if ($_POST['tipoos']) {
            $dados['fk_ordem_servico_tipo'] = $_POST['tipoos'];
        }
        if ($_POST['ano']) {
            $dados['ano'] = $_POST['ano'];
        }
        $relatorio = new RelatorioModel();
    
      mDebug($relatorio->where($dados)->findAll());
        $html = view('relatorio/output');
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
