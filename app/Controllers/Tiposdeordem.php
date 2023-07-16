<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EquipamentoModel;
use App\Models\OrdemModel;

class Tiposdeordem extends BaseController
{
    /**
     * Chama a view de listagem de ordens preventivas
     *
     * @return \CodeIgniter\HTTP\Response
     */
    public function index()
    {
        $ospreventivaModel = new OrdemModel();
        $ospreventivas = $ospreventivaModel->paginate(100);

        return view('common/template', [
            'content' => view('tiposdeordem/ospreventiva', [
                'ospreventivas' => $ospreventivas
            ])
        ]);
    }

    /**
     * Chama a view de listagem de ordens preventivas
     *
     * @return \CodeIgniter\HTTP\Response
     */
    public function ospreventiva()
    {
        $ospreventivaModel = new OrdemModel();
        $ospreventivas = $ospreventivaModel->paginate(100);

        return view('common/template', [
            'content' => view('tiposdeordem/ospreventiva', [
                'ospreventivas' => $ospreventivas
            ])
        ]);
    }

    /**
     * Chama a view de listagem de ordens preventivas atrasadas
     *
     * @return \CodeIgniter\HTTP\Response
     */
    public function ospreventivaa()
    {
        $ospreventivaModel = new OrdemModel();
        $ospreventivasAtrasadas = $ospreventivaModel->getAtrasadas();

        return view('common/template', [
            'content' => view('tiposdeordem/ospreventivaa', [
                'ospreventivasAtrasadas' => $ospreventivasAtrasadas
            ])
        ]);
    }

    /**
     * Chama a view de cadastro de ordem para um equipamento
     *
     * @param int $fk_equipamento
     * @return \CodeIgniter\HTTP\Response
     */
    public function create($fk_equipamento)
    {
        return view('common/template', [
            'content' => view('ordem', [
                'fk_equipamento' => $fk_equipamento
            ])
        ]);
    }

    /**
     * Salva uma ordem no banco de dados
     *
     * @return \CodeIgniter\HTTP\Response
     */
    public function store()
    {
        $post = $this->request->getPost();

        $ospreventivaModel = new OrdemModel();

        if ($ospreventivaModel->save($post)) {
            return redirect()->to("/equipamento/ordem/{$post['fk_equipamento']}")->with('mensagem_telefone', 'Ordem inserida com sucesso.');
        } else {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro ao salvar a ordem.',
                'tipo' => 'danger'
            ]);
        }
    }

    /**
     * Exclui uma ordem de um equipamento
     *
     * @param int $idOs
     * @param int $fk_equipamento
     * @return \CodeIgniter\HTTP\Response
     */
    public function delete($idOs, $fk_equipamento)
    {
        $ospreventivaModel = new OrdemModel();

        if ($ospreventivaModel->where('fk_equipamento', $fk_equipamento)->delete($idOs)) {
            return redirect()->to("/equipamento/ordem/{$fk_equipamento}")->with('mensagem_telefone', 'Ordem excluída com sucesso.');
        } else {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro ao excluir a ordem.',
                'tipo' => 'danger'
            ]);
        }
    }
}
