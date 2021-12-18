<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('common/cabecalho');
        echo view('home/index');
        echo view('common/rodape');
    }
}
