<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EquipamentoModel;
use App\Models\OspreventivaModel;
use App\Models\OsinstalacaoModel;
use App\Models\OscorretivaModel;
use App\Models\OstreinamentoModel;
use App\Models\OsinspecaoModel;
use App\Models\OscalibracaoModel;
use App\Models\SetorModel;

class Equipamento extends BaseController
{


    /**
     * Chama a view de listagem de clientes
     *
     * @return void
     */
    public function index($id= False)
    {
        $setorModel = new SetorModel();
        $equipamentoModel = new EquipamentoModel();

        echo view('common/cabecalho');
        echo view('equipamento/equipamento', [
            'equipamentos' => $equipamentoModel->paginate(1000),
            'setor'=>$setorModel->findAll()
        ]);
        echo view('common/rodape');
    }
    /**
     * Chama a view de cadastro de equipamentos
     *
     * @return void
     */

    public function create()
    {
        echo view('common/cabecalho');
        echo view('equipamento/equipamento', [
            'titulo' => 'Cadastro do Equipamento'
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
            return redirect()->to("/equipamento")->with('mensagem', [
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
        $equipamentos = $equipamentoModel->findAll();
        echo view('common/cabecalho');
        echo view('form_equipamento', [
            'titulo' => 'Edição de Equipamento',
            'ospreventivasEquipamento' => $ospreventivasEquipamento,
            'equipamentos' => $equipamentos,
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
            return redirect()->to('/equipamento')->with('mensagem', [
                'mensagem' => 'Equipamento excluído com sucesso!',
                'tipo' => 'info'
            ]);
        } else {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Falha na tentativa de Exclusão de Equipamento.',
                'tipo' => 'danger'
            ]);
        }
    }

    public function ordem($id)
    {
        $equipamentoModel = new EquipamentoModel();
        $ospreventivaModel = new OspreventivaModel();
        $osinstalacaoModel = new OsinstalacaoModel();
        $oscorretivaModel = new OscorretivaModel();


        $ostreinamentoModel = new OstreinamentoModel();
        $osinspecaoModel = new OsinspecaoModel();
        $oscalibracaoModel = new OscalibracaoModel();

        $dadosEquipamento = $equipamentoModel->find($id);

        $ospreventivasEquipamento = $ospreventivaModel->getByIdEquipamento($dadosEquipamento['id']);
        $osinstalacoesEquipamento = $osinstalacaoModel->getByIdEquipamento($dadosEquipamento['id']);
        $oscorretivasEquipamento = $oscorretivaModel->getByIdEquipamento($dadosEquipamento['id']);
        $osinspecoesEquipamento = $osinspecaoModel->getByIdEquipamento($dadosEquipamento['id']);
        $ostreinamentosEquipamento = $ostreinamentoModel->getByIdEquipamento($dadosEquipamento['id']);
        $oscalibracoesEquipamento = $oscalibracaoModel->getByIdEquipamento($dadosEquipamento['id']);

        echo view('common/cabecalho');
        echo view('equipamento/ordem', [
            'titulo' => 'Dados de Equipamento',
            'ospreventivasEquipamento' => $ospreventivasEquipamento,
            'osinstalacoesEquipamento' => $osinstalacoesEquipamento,
            'oscorretivasEquipamento' => $oscorretivasEquipamento,
            'osinspecoesEquipamento' => $osinspecoesEquipamento,
            'ostreinamentosEquipamento' => $ostreinamentosEquipamento,
            'oscalibracoesEquipamento' => $oscalibracoesEquipamento,

            'dadosEquipamento' => $dadosEquipamento

        ]);
        echo view('common/rodape');

        if (is_null($dadosEquipamento)) {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro - equipamento não encontrado',
                'tipo' => 'danger'
            ]);
        }
    }

    public function ordemUnica($id = null) 
    {
        if ($id) {
            
        } else {
            echo json_encode(['error' => 'Invalid id']);
        }
    }
}
