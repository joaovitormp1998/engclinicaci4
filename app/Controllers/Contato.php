<?php

namespace App\Controllers;

class Contato extends BaseController
{
    public function index()
    {
        echo view('common/cabecalho');
        echo view('contato/contato');
        echo view('common/rodape');
    }
    public function enviar()
    {
        echo view('common/cabecalho');
        echo view('contato/phpmail');
        echo view('contato/contato');
        echo view('common/rodape');
    }
}
