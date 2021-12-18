<?php

use App\Controllers\BaseController;

class Importar extends BaseController
{

	public function index()
	{

        echo view('common/cabecalho');
        echo view('importar');
        echo view('common/footer');
    }
}