<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EquipamentoModel;
use App\Models\OrdemModel;
use App\Models\SetorModel;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class Equipamento extends BaseController
{
    protected $setorModel;
    protected $equipamentoModel;
    protected $ordemModel;
    public function __construct()
    {
        $this->setorModel = new SetorModel();
        $this->equipamentoModel = new EquipamentoModel();
        $this->ordemModel = new OrdemModel();
    
    }

    public function index($id = false)
    {
        $equipamentos = $this->equipamentoModel->getAll();
        $setores = $this->setorModel->findAll();
    
        $data = [
            'equipamentos' => $equipamentos,
            'setores' => $setores
        ];
    
        $content = view('equipamento/equipamento', $data);
    
        return view('common/template', ['content' => $content]);
    }

    public function editar($id)
    {
        $data['equipamento'] = $this->equipamentoModel->getEquipamentoById($id);
        $data['setores'] = $this->equipamentoModel->getSetores();
    
        return view('equipamento/editar', $data);
    }

    public function update()
    {
        $post = $this->request->getPost();
        $id = $post['id'];
    
        if (!empty($id)) {
            $this->equipamentoModel->update($id, $post);
            return redirect()->to('/equipamento')->with('mensagem', [
                'mensagem' => 'Equipamento atualizado com sucesso!',
                'tipo' => 'success'
            ]);
        } else {
            return redirect()->to('/equipamento')->with('mensagem', [
                'mensagem' => 'Falha na atualização do equipamento.',
                'tipo' => 'danger'
            ]);
        }
    }

    public function create()
    {
        $setores = $this->setorModel->findAll();

        $content = view('equipamento/equipamento', [
            'titulo' => 'Cadastro de Equipamento',
            'setores' => $setores
        ]);

        return view('common/template', ['content' => $content]);
    }
    public function store()
    {
        $post = $this->request->getPost();
        var_dump($post); // Adicione esta linha para exibir os dados

        if (!empty($post)) {
            // Armazena os dados no banco de dados ou realiza as operações necessárias
            // para salvar o equipamento
    
            return redirect()->to('/equipamento')->with('mensagem', [
                'mensagem' => 'Equipamento cadastrado com sucesso!',
                'tipo' => 'success'
            ]);
        } else {
            return redirect()->to('/equipamento')->with('mensagem', [
                'mensagem' => 'Falha no cadastro do equipamento.',
                'tipo' => 'danger'
            ]);
        }
    }
    
    public function show()
    {
        // Obtém os dados da variável de sessão
        $formData = session()->getFlashdata('form_data');
    
        // Exibe os dados na página
        var_dump($formData); // ou print_r($formData);
    }
        
    public function delete($id)
    {
        if ($this->equipamentoModel->deleteById($id)) {
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
        $dadosEquipamento = $this->equipamentoModel->find($id);

        $content = view('equipamento/ordem', [
            'titulo' => 'Dados de Equipamento',
            'osPreventivas' => $this->ordemModel->where(['fk_equipamento' => $id, 'fk_ordem_servico_tipo' => 1])->findAll(),
            'osCorretivas' => $this->ordemModel->where(['fk_equipamento' => $id, 'fk_ordem_servico_tipo' => 3])->findAll(),
            'osInstalacoes' => $this->ordemModel->where(['fk_equipamento' => $id, 'fk_ordem_servico_tipo' => 2])->findAll(),
            'osCalibracao' => $this->ordemModel->where(['fk_equipamento' => $id, 'fk_ordem_servico_tipo' => 5])->findAll(),
            'osInspecao' => $this->ordemModel->where(['fk_equipamento' => $id, 'fk_ordem_servico_tipo' => 6])->findAll(),
            'osTreinamento' => $this->ordemModel->where(['fk_equipamento' => $id, 'fk_ordem_servico_tipo' => 4])->findAll(),
            'dadosEquipamento' => $dadosEquipamento
        ]);

        return view('common/template', ['content' => $content]);
    }

    public function consultarOrdem()
    {
        $idTipoOrdem = $this->request->getPost('idTipo');
        $idOrdem = $this->request->getPost('uid');

        $dados = $this->ordemModel->where(['id' => $idOrdem, 'fk_ordem_servico_tipo' => $idTipoOrdem])->findAll();

        echo json_encode($dados[0]);
    }

    public function gerarQRCode($id)
    {
        $equipamento = $this->equipamentoModel->getEquipamentoById($id);
        $url = base_url(URLQRCODE . 'ordem/' . $equipamento['id']);

        $options = new QROptions([
            'version' => 5,
            'outputType' => QRCode::OUTPUT_MARKUP_SVG,
            'eccLevel' => QRCode::ECC_L,
        ]);

        $qrcode = new QRCode($options);

        $nome_img = $equipamento['id'] . '.svg';

        $qrcode->render($url, 'assets/imgqrcode/' . $nome_img);
    }
}
