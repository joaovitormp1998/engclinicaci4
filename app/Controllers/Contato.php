<?php

namespace App\Controllers;

class Contato extends BaseController
{
    public function index()
    {
        echo view('common/cabecalho');
        echo view('contato');
        echo view('common/rodape');
    }
}
