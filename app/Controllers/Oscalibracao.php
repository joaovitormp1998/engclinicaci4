<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EquipamentoModel;
use App\Models\OscalibracaoModel;

class Oscalibracao extends BaseController
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

    $oscalibracaoModel = new OscalibracaoModel();

    echo view('common/cabecalho');
    echo view('ospreventiva', [
      'ospreventivas' => $oscalibracaoModel->paginate(100),
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

    $oscalibracaoModel = new OscalibracaoModel();

    if ($oscalibracaoModel->save($post)) {
      return redirect()->to("/equipamento/ordem/{$post['fk_equipamento']}")->with('mensagem_telefone', 'Ordem de Calibração  Salva com sucesso.');
    } else {
      return redirect()->to('/mensagem')->with('mensagem', [
        'mensagem' => 'Erro ao salvar a Ordem de calibração.',
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

    $oscalibracaoModel = new OscalibracaoModel();

    if ($oscalibracaoModel->where('fk_equipamento', $fk_equipamento)->delete($idOs)) {
      return redirect()->to("/equipamento/ordem/{$fk_equipamento}")->with('mensagem_telefone', 'Ordem de Calibração excluída com Sucesso.');
    } else {
      return redirect()->to('/mensagem')->with('mensagem', [
        'mensagem' => 'Erro ao excluir a os de calibração.',
        'tipo' => 'danger'
      ]);
    }
  }
}
