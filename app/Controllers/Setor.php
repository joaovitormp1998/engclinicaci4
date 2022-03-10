<?php

namespace App\Controllers;
use App\Models\SetorModel;
use App\Models\UsuarioModel;

class Setor extends BaseController
{
    private $setorModel;
    private $_base = '/setor';
    
    public function __construct()
    {
        $this->setorModel = new SetorModel();

    }
    /**
     * Chama a view de listagem de clientes
     *
     * @return void
     */
    public function index()
    {
        $dados = [
         '_base' => $this->_base,
         'setores' => $this->setorModel->findAll(),
        ];



        echo view('common/cabecalho');
        echo view('setor/index',$dados );
        echo view('common/rodape');
    }
    public function create()
    {
        // echo '<pre>';
        // print_r($_POST);
        // print_r($_FILES);
        $post = $this->request->getPost();
        if ($this->setorModel->save($post)) {
            return redirect()->to('/setor/')->with('mensagem', 'Dados cadastrados com sucesso.');
        } else {
            $dados = [
                'erros' => $this->setorModel->errors()
            ];

            mDebug($dados);
        }


    }

}
