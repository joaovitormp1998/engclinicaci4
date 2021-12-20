<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EquipamentoModel;
use App\Models\OsinstalacaoModel;

class OsInstalacao extends BaseController
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

    $osinstalacaoModel = new OsinstalacaoModel();

    echo view('common/cabecalho');
    echo view('ospreventiva', [
      'ospreventivas' => $osinstalacaoModel->paginate(100),
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

    $osinstalacaoModel = new OsinstalacaoModel();

    if ($osinstalacaoModel->save($post)) {
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

    $osinstalacaoModel = new OsinstalacaoModel();

    if ($osinstalacaoModel->where('fk_equipamento', $fk_equipamento)->delete($idOs)) {
      return redirect()->to("/equipamento/ordem/{$fk_equipamento}")->with('mensagem_telefone', 'Ordem de Instalacao excluida com sucesso.');
    } else {
      return redirect()->to('/mensagem')->with('mensagem', [
        'mensagem' => 'Erro ao excluir a os de instalação.',
        'tipo' => 'danger'
      ]);
    }
  }
}
