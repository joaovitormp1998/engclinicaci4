<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EquipamentoModel;
use App\Models\OrdemModel;

class Tiposdeordem extends BaseController
{
    /**
     * Chama o form de cadastro de telefone
     *
     * @return void
     */
    /**
     * Chama a view de listagem de clientes
     *
     * @return void
     */
    public function index()
    {

        $ospreventivaModel = new OrdemModel();

        echo view('common/cabecalho');
        echo view('tiposdeordem/ospreventiva', [
            'ospreventivas' => $ospreventivaModel->paginate(100),
        ]);
        echo view('common/rodape');
    }

    public function ospreventiva()
    {

        $ospreventivaModel = new OrdemModel();

        echo view('common/cabecalho');
        echo view('tiposdeordem/ospreventiva', [
            'ospreventivas' => $ospreventivaModel->paginate(100),
        ]);
        echo view('common/rodape');
    }
    public function ospreventivaa()
    {

        $ospreventivaModel = new OrdemModel();

        echo view('common/cabecalho');
        echo view('tiposdeordem/ospreventivaa', [
            'ospreventivas' => $ospreventivaModel->paginate(100),
        ]);
        echo view('common/rodape');
    }
    /**
     * Chama a view de cadastro de equipamentos
     *
     * @return void
     */
    public function create($fk_equipamento)
    {
        echo view('common/cabecalho');
        echo view('ordem', [
            'fk_equipamento' => $fk_equipamento
        ]);
        echo view('common/rodape');
    }

    /**
     * Salva o telefone no banco de dados
     *
     * @return void
     */
    public function store()
    {
        $post = $this->request->getPost();

        $ospreventivaModel = new OrdemModel();

        if ($ospreventivaModel->save($post)) {
            return redirect()->to("/equipamento/ordem/{$post['fk_equipamento']}")->with('mensagem_telefone', 'Ordem inserida com sucesso.');
        } else {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro ao salvar o telefone.',
                'tipo' => 'danger'
            ]);
        }
    }

    /**
     * Exclui um telefone do cliente.
     *
     * @param [type] $id
     * @param [type] $fk_equipamento
     * @return void
     */
    public function delete($idOs, $fk_equipamento)
    {

        $ospreventivaModel = new OrdemModel();

        if ($ospreventivaModel->where('fk_equipamento', $fk_equipamento)->delete($idOs)) {
            return redirect()->to("/equipamento/ordem/{$fk_equipamento}")->with('mensagem_telefone', 'Ordem exluida com sucesso.');
        } else {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro ao excluir a ordem.',
                'tipo' => 'danger'
            ]);
        }
    }
}
