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
    public function index($id = False)
    {

        $setorModel = new SetorModel();

        echo view('common/cabecalho');
        echo view('setor/index', [
            'setor' => $setorModel->paginate(1000),
        ]);

        $js['js'] = view('setor/js/main');
        echo view('common/rodape', $js);
    }
    public function create()
    {
        // echo '<pre>';
        // print_r($_POST);
        // print_r($_FILES);
        $post = $this->request->getPost();

        $id = $post['uid'];
        $setorModel = new SetorModel();

        if (!empty($id)) {
            $setorModel->update($id, $post);
        } else {
            $this->setorModel->save($post);
        }
        return redirect()->to('/setor');
    }
    public function edit($id)
    {

        $setorModel = new SetorModel();

        $dadosSetor = $setorModel->find($id);

        if (is_null($dadosSetor)) {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro - equipamento não encontrado',
                'tipo' => 'danger'
            ]);
        }
        echo json_encode($dadosSetor);
    }
    public function delete($id)
    {


        $setorModel = new SetorModel();
        $dadosSetor = $setorModel->find($id);
        if (is_null($dadosSetor)) {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro - equipamento não encontrado',
                'tipo' => 'danger'
            ]);
        }

        if ($setorModel->delete($id)) {
            return redirect()->to('/setor')->with('mensagem', [
                'mensagem' => 'Usuario excluído com sucesso!',
                'tipo' => 'info'
            ]);
        } else {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Falha na tentativa de Exclusão de Usuario.',
                'tipo' => 'danger'

            ]);
        }
    }
}
