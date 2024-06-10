<?php

namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\CategoriaModel;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\Files\UploadedFile;

class Usuario extends BaseController
{
    private $usuarioModel;
    private $_base = '/usuario';

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    public function index($id = False)
    {

        $usuarioModel = new UsuarioModel();

        if (session()->nivel != "F") {

            echo view('common/cabecalho');
            echo view('usuario/index', [
                'usuarios' => $usuarioModel->paginate(1000),
                'usuarioId' => $usuarioModel->find($id)
            ]);

            $js['js'] = view('usuario/js/main');
            echo view('common/rodape', $js);
        } else {
            echo view('common/cabecalho');
            echo view('home/index');
            echo view('common/rodape');
        }
    }

    public function edit($id)
    {
        $usuario = $this->usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuário não encontrado');
        }

        return view('usuario/edit', ['usuario' => $usuario]);
    }

    public function update($id)
    {
        $usuario = $this->usuarioModel->find($id);
        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuário não encontrado');
        }

        if (!$this->validate($this->usuarioModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();

        // Manipulação da imagem (se houver)
        $imagem = $this->request->getFile('foto');
        if ($imagem && $imagem->isValid() && !$imagem->hasMoved()) {
            $nomeImagem = $imagem->getRandomName();
            $imagem->move(FCPATH . 'uploads/', $nomeImagem);
            $data['foto'] = $nomeImagem;
            // Se quiser deletar a imagem antiga, use: unlink(FCPATH . 'uploads/' . $usuario['foto']);
        }

        if ($this->usuarioModel->update($id, $data)) {
            return redirect()->to('/usuario')->with('success', 'Usuário atualizado com sucesso');
        } else {
            return redirect()->back()->with('error', 'Erro ao atualizar o usuário');
        }
    }

    public function delete($id)
    {
        if ($this->usuarioModel->delete($id)) {
            return redirect()->to('/usuario')->with('success', 'Usuário excluído com sucesso');
        } else {
            return redirect()->back()->with('error', 'Erro ao excluir o usuário');
        }
    }
    public function create()
{
    if ($this->request->getMethod() === 'post') {
        $validationRules = $this->usuarioModel->getValidationRules();

        if (!$this->validate($validationRules)) {
            $errors = $this->validator->getErrors();

            // Tradução das mensagens de erro (opcional)
            if (function_exists('lang')) { // Verifica se a função lang() existe
                foreach ($errors as $campo => $mensagem) {
                    $errors[$campo] = lang('validation.' . $mensagem); 
                }
            }

            return $this->response->setJSON([
                'tipo' => 'error',
                'mensagem' => 'Erro de validação',
                'errors' => $errors
            ]);
        }

        $data = $this->request->getPost();

        // Manipulação da imagem (se houver)
        $imagem = $this->request->getFile('foto');
        if ($imagem && $imagem->isValid() && !$imagem->hasMoved()) {
            $nomeImagem = $imagem->getRandomName();
            $imagem->move(FCPATH . 'uploads/', $nomeImagem);
            $data['foto'] = $nomeImagem;
        }

        // Salva o usuário no banco de dados
        if ($this->usuarioModel->save($data)) {
            return $this->response->setJSON(['tipo' => 'success', 'mensagem' => 'Usuário criado com sucesso']);
        } else {
            return $this->response->setJSON(['tipo' => 'error', 'mensagem' => 'Erro ao criar o usuário']);
        }
    } else {
        // Retorna erro se o método não for POST
        return $this->response->setJSON(['tipo' => 'error', 'mensagem' => 'Método de requisição inválido']);
    }
}
    
}
