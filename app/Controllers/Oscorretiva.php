<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EquipamentoModel;
use App\Models\OscorretivaModel;

class OsCorretiva extends BaseController
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

    $oscorretivaModel = new OscorretivaModel();

    echo view('common/cabecalho');
    echo view('ospreventiva', [
      'ospreventivas' => $oscorretivaModel->paginate(100),
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

    $oscorretivaModel = new OscorretivaModel();

    if ($oscorretivaModel->save($post)) {
      return redirect()->to("/equipamento/ordem/{$post['fk_equipamento']}")->with('mensagem_telefone', 'Ordem Corretiva inserida com sucesso.');
    } else {
      return redirect()->to('/mensagem')->with('mensagem', [
        'mensagem' => 'Erro ao salvar ordem Corretiva.',
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

    $oscorretivaModel = new OscorretivaModel();

    if ($oscorretivaModel->where('fk_equipamento', $fk_equipamento)->delete($idOs)) {
      return redirect()->to("/equipamento/ordem/{$fk_equipamento}")->with('mensagem_telefone', 'Ordem de OS corretiva excluida com sucesso.');
    } else {
      return redirect()->to('/mensagem')->with('mensagem', [
        'mensagem' => 'Erro ao excluir a os Corretiva.',
        'tipo' => 'danger'
      ]);
    }
  }
}
