<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EquipamentoModel;
use App\Models\OspreventivaModel;

class Busca extends BaseController
{
    
    
    /**
     * Chama a view de listagem de clientes
     *
     * @return void
     */
    public function index()
    {

        $equipamentoModel = new EquipamentoModel();

        echo view('common/cabecalho');
        echo view('busca/busca', [
            'equipamentos' => $equipamentoModel->paginate(300),
            'pager' => $equipamentoModel->pager
        ]);
        
        echo view('common/footer');
    }
    /**
     * Chama a view de cadastro de equipamentos
     *
     * @return void
     */
    public function create()
    {
        echo view('common/header');
        echo view('form', [
            'titulo' => 'Cadastro de equipamento'
        ]);
        echo view('common/footer');
    }

    /**
     * Salva o equipamento no banco dados.
     *
     * @return void
     */
    public function store()
    {
        $post = $this->request->getPost();

        $equipamentoModel = new EquipamentoModel();

        if ($equipamentoModel->save($post)) {
            if (!empty($post['id'])) {
                return redirect()->to('/mensagem')->with('mensagem', [
                    'mensagem' => 'Dados salvos com sucesso.',
                    'tipo' => 'success'
                ]);
            }
            return redirect()->to("/equipamento/edit/{$equipamentoModel->insertID}")->with('mensagem', [
                'mensagem' => 'Dados salvos com sucesso',
                'tipo' => 'success'
            ]);
        } else {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro ao salvar os dados.',
                'tipo' => 'danger'
            ]);
        }
    }

    /**
     * Chama a view de edição com o equipamento carregado
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
        $equipamentoModel = new EquipamentoModel();
        $ospreventivaModel = new OspreventivaModel();

        $dadosEquipamento = $equipamentoModel->find($id);

        if (is_null($dadosEquipamento)) {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro - equipamento não encontrado',
                'tipo' => 'danger'
            ]);
        }

        $ospreventivasEquipamento = $ospreventivaModel->getByIdEquipamento($dadosEquipamento['id']);

        echo view('common/header');
        echo view('form', [
            'titulo' => 'Edição de Equipamento',
            'ospreventivasEquipamento' => $ospreventivasEquipamento,
            'dadosEquipamento' => $dadosEquipamento
        ]);
        echo view('common/footer');
    }

    /**
     * Exclui o cliente do banco de dados.
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {

        $equipamentoModel = new EquipamentoModel();

        if ($equipamentoModel->delete($id)) {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Equipamento excluído com sucesso!',
                'tipo' => 'info'
            ]);
        } else {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro ao excluir o cliente.',
                'tipo' => 'danger'
            ]);
        }
    }

    public function ordem($id)
	{
        $equipamentoModel = new EquipamentoModel();
        $ospreventivaModel = new OspreventivaModel();

        $dadosEquipamento = $equipamentoModel->find($id);

        
        if (is_null($dadosEquipamento)) {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro - equipamento não encontrado',
                'tipo' => 'danger'
            ]);
        }
        
        $ospreventivasEquipamento = $ospreventivaModel->getByIdEquipamento($dadosEquipamento['id']);

        echo view('common/header');
        echo view('ordem', [
            'titulo' => 'Dados de Equipamento',
            'ospreventivasEquipamento' => $ospreventivasEquipamento,
            'dadosEquipamento' => $dadosEquipamento
        ]);
	}

}
