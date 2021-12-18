<?php

namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\CategoriaModel;
use App\Models\UsuarioModel;

class Usuario extends BaseController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }
    /**
     * Chama a view de listagem de clientes
     *
     * @return void
     */
    public function index()
    {

        $usuarioModel = new UsuarioModel();

        echo view('common/cabecalho');
        echo view('usuario/index', [
            'usuarios' => $usuarioModel->paginate(10),
        ]);
        echo view('common/footer');
    }
    
    public function edit($id)
    {

        $usuarioModel = new UsuarioModel();

        $dadosUsuario = $usuarioModel->find($id);

        if (is_null($dadosUsuario)) {
            return redirect()->to('/usuario/{$id}')->with('mensagem', [
                'mensagem' => 'Erro - Usuario não encontrado',
                'tipo' => 'danger'
            ]);
        }

        $usuarios = $usuarioModel->findAll();
        echo view('common/cabecalho');
        echo view('usuario/form_usuario', [
            'titulo' => 'Edição de Usuario',
            'usuarios' => $usuarios,
            'dadosUsuario' => $dadosUsuario
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

        $usuarioModel = new UsuarioModel();

        if ($usuarioModel->delete($id)) {
            return redirect()->to('/usuario')->with('mensagem', [
                'mensagem' => 'Usuario excluído com sucesso!',
                'tipo' => 'info'
            ]);
        } else {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Falha na tentativa de Exclusão de Usuario.',
                'tipo' => 'danger'
            ]);
        }
    }    
    public function store()
    {
        $post = $this->request->getPost();
        if ($this->usuarioModel->save($post)) {
            return redirect()->to('/usuario/')->with('mensagem', 'Dados cadastrados com sucesso.');
        } else {
            $dados = [
                'erros' => $this->usuarioModel->errors()
            ];

            echo view('usuario/index', $dados);
        }
    }
}
