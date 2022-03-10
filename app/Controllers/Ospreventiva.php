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
        $validationRule = [
            'imagem' => [
                'label' => 'Image File',
                'rules' => 'uploaded[imagem]'
                    . '|is_image[imagem]'
                    . '|mime_in[imagem,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[imagem,10000]',
                    // . '|max_dims[imagem,1024,768]',
            ],
        ];
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

           mDebug($data);
        }
        $img = $this->request->getFile('imagem');
        $filepath = FCPATH  . '/fotoos';
        $nomeImagem = $img->getRandomName();
        if ($img->move($filepath,$nomeImagem)) {
            // $filepathold = WRITEPATH . 'uploads/' . $img->store();
            // mDebug($filepathold);
            $post['imagem'] = $nomeImagem;
           
            $ospreventivaModel = new OspreventivaModel();
            if ($ospreventivaModel->save($post)) {
                return redirect()->to("/equipamento/ordem/{$post['fk_equipamento']}")->with('mensagem_telefone', 'Ordem inserida com sucesso.');
            } else {
                $dados = [
                    'erros' => $this->ospreventivaModel->errors()
                ];
                mDebug($dados);
            }
        
        } else {    
            $data = ['errors' => 'The file has already been moved.'];

            print_r($data);
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
            return redirect()->to("/equipamento/ordem/{$fk_equipamento}")->with('mensagem_telefone', 'OS preventiva excluída com sucesso.');
        } else {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro ao excluir a Preventiva.',
                'tipo' => 'danger'
            ]);
        }
    }
}
