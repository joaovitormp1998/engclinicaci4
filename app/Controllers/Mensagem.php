<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Mensagem extends BaseController
{
    /**
     * Chama a view principal
     *
     * @return void
     */
    public function index()
    {
        echo view('common/cabecalho');
        echo view('mensagem', [
            'mensagem' => session()->getFlashdata('mensagem')
        ]);
        echo view('common/footer');
    }
}
