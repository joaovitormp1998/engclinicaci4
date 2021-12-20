<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EquipamentoModel;
use App\Models\OstreinamentoModel;

class Ostreinamento extends BaseController
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

    $ostreinamentoModel = new OstreinamentoModel();

    echo view('common/cabecalho');
    echo view('ospreventiva', [
      'ospreventivas' => $ostreinamentoModel->paginate(100),
    ]);
    echo view('common/footer');
  }

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

    $ostreinamentoModel = new OstreinamentoModel();

    if ($ostreinamentoModel->save($post)) {
      return redirect()->to("/equipamento/ordem/{$post['fk_equipamento']}")->with('mensagem_telefone', 'Ordem de Treinamento salva com sucesso.');
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

    $ostreinamentoModel = new OstreinamentoModel();

    if ($ostreinamentoModel->where('fk_equipamento', $fk_equipamento)->delete($idOs)) {
      return redirect()->to("/equipamento/ordem/{$fk_equipamento}")->with('mensagem_telefone', 'Ordem de Treinamento excluída com sucesso.');
    } else {
      return redirect()->to('/mensagem')->with('mensagem', [
        'mensagem' => 'Erro ao excluir a os de treinamento.',
        'tipo' => 'danger'
      ]);
    }
  }
}
