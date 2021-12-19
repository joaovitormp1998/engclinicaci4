<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EquipamentoModel;
use App\Models\OspreventivaModel;

class Ospreventiva extends BaseController
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

        $ospreventivaModel = new OspreventivaModel();

        echo view('common/cabecalho');
        echo view('ospreventiva', [
            'ospreventivas' => $ospreventivaModel->paginate(100),
        ]);
        echo view('common/footer');
    }

    public function ospreventivaa()
    {

        $ospreventivaModel = new OspreventivaModel();

        echo view('common/cabecalho');
        echo view('ospreventivaa', [
            'ospreventivas' => $ospreventivaModel->paginate(100),
        ]);
        echo view('common/footer');
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
        echo view('common/footer');
    }

    /**
     * Salva o telefone no banco de dados
     *
     * @return void
     */
    public function store()
    {
        $post = $this->request->getPost();

        $ospreventivaModel = new OspreventivaModel();

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

        $ospreventivaModel = new OspreventivaModel();

        if ($ospreventivaModel->where('fk_equipamento', $fk_equipamento)->delete($idOs)) {
            return redirect()->to("/equipamento/edit/{$fk_equipamento}")->with('mensagem_telefone', 'Telefone excluído com sucesso.');
        } else {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro ao excluir o telefone.',
                'tipo' => 'danger'
            ]);
        }
    }
}
