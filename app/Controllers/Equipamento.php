<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EquipamentoModel;
use App\Models\OrdemModel;
use App\Models\SetorModel;

class Equipamento extends BaseController
{


    /**
     * Chama a view de listagem de clientes
     *
     * @return void
     */
    public function index($id = False)
    {
        $setorModel = new SetorModel();
        $equipamentoModel = new EquipamentoModel();
        $view = \Config\Services::renderer();
        echo view('common/cabecalho');
        echo view('equipamento/equipamento', [
            'equipamentos' => $equipamentoModel->paginate(1000),
        ]);
        $js['js'] = $view->render('equipamento/js/main.js');
        echo view('common/rodape', $js);
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
        $id = $post['uid'];
        $equipamentoModel = new EquipamentoModel();

        if (!empty($id)) {
            $equipamentoModel->update($id, $post);
        } else {
            $equipamentoModel->save($post);
        }
        return redirect()->to('/equipamento');
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
        $ospreventivaModel = new OrdemModel();


        $dadosEquipamento = $equipamentoModel->find($id);

        if (is_null($dadosEquipamento)) {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro - equipamento não encontrado',
                'tipo' => 'danger'
            ]);
        }

        $ospreventivasEquipamento = $ospreventivaModel->getByIdEquipamento($dadosEquipamento['id']);
        $equipamentos = $equipamentoModel->findAll();
        echo json_encode($dadosEquipamento);
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
        $ospreventivaModel = new OrdemModel();
        $view = \Config\Services::renderer();

        $dadosEquipamento = $equipamentoModel->find($id);
        echo view('common/cabecalho');
        echo view('equipamento/ordem', [
            'titulo' => 'Dados de Equipamento',
            'osPreventivas' => $ospreventivaModel->where(['fk_equipamento'=>$id,'fk_ordem_servico_tipo' => 1])->findAll(),
            'osCorretivas' => $ospreventivaModel->where(['fk_equipamento'=>$id,'fk_ordem_servico_tipo' => 3])->findAll(),
            'osInstalacoes' => $ospreventivaModel->where(['fk_equipamento'=>$id,'fk_ordem_servico_tipo' => 2])->findAll(),
            'osCalibracao' => $ospreventivaModel->where(['fk_equipamento'=>$id,'fk_ordem_servico_tipo' => 5])->findAll(),
            'osInspecao' => $ospreventivaModel->where(['fk_equipamento'=>$id,'fk_ordem_servico_tipo' => 6])->findAll(),
            'osTreinamento' => $ospreventivaModel->where(['fk_equipamento'=>$id,'fk_ordem_servico_tipo' => 4])->findAll(),

            'dadosEquipamento' => $dadosEquipamento

    ]);
        $js['js'] = $view->render('equipamento/js/main.js');
        echo view('common/rodape', $js);

        if (is_null($dadosEquipamento)) {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro - equipamento não encontrado',
                'tipo' => 'danger'
            ]);
        }
    }

    public function consultarOrdem()
    {
        $idTipoOrdem = $this->request->getPost('idTipo');
        $idOrdem = $this->request->getPost('uid');
        

        $ospreventivaModel = new OrdemModel();
        $dados = $ospreventivaModel->where(['id' => $idOrdem,'fk_ordem_servico_tipo' => $idTipoOrdem])->findAll();

        echo json_encode($dados[0]);
    }
}
