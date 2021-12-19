<?php

namespace App\Controllers;

use App\Models\EquipamentoModel;
use App\Models\BokuModel;
use Dompdf\Dompdf;

class Relatorio extends BaseController
{
    public function __construct()
    {
        $this->BokuModel = new BokuModel();
    }
    public function index()
    {
        $data = [
            'boku' => $this->BokuModel->AllData(),
        ];

        echo view('common/cabecalho');
        echo view('relatorio/index');

        echo view('common/rodape');
    }

    public function printpdf()
    {
        $data = [
            'boku' => $this->BokuModel->AllData(),
        ];

        $html = view('relatorio/relatorio', $data);
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
