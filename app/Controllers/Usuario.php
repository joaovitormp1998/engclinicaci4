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
    /**
     * Chama a view de listagem de clientes
     *
     * @return void
     */
    public function index($id = False)
    {

        $usuarioModel = new UsuarioModel();


        echo view('common/cabecalho');
        echo view('usuario/index', [
            'usuarios' => $usuarioModel->paginate(1000),
            'usuarioId' => $usuarioModel->find($id)
        ]);

        $js['js'] = view('usuario/js/main');
        echo view('common/rodape', $js);
    }

    public function edit($id)
    {

        $usuarioModel = new UsuarioModel();

        $dadosUsuario = $usuarioModel->find($id);

        if (is_null($dadosUsuario)) {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro - equipamento não encontrado',
                'tipo' => 'danger'
            ]);
        }
        echo json_encode($dadosUsuario);
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
        $dadosUsuario = $usuarioModel->find($id);
        if (is_null($dadosUsuario)) {
            return redirect()->to('/mensagem')->with('mensagem', [
                'mensagem' => 'Erro - equipamento não encontrado',
                'tipo' => 'danger'
            ]);
        }

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

    public function create()
    {
        // echo '<pre>';
        // print_r($_POST);
        // print_r($_FILES);
        $post = $this->request->getPost();
        $validationRule = [
            'foto' => [
                'label' => 'Image File',
                'rules' => 'uploaded[foto]'
                    . '|is_image[foto]'
                    . '|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[foto,10000]',
                // . '|max_dims[foto,1024,768]',
            ],
        ];

        $id = $post['uid'];
        $equipamentoModel = new UsuarioModel();



        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
        }

        $img = $this->request->getFile('foto');
        $filepath = FCPATH  . 'uploads/';
        $nomeImagem = $img->getRandomName();


        if ($img->move($filepath, $nomeImagem)) {
            // $filepathold = WRITEPATH . 'uploads/' . $img->store();


            // mDebug($filepathold);
            $post['foto'] = $nomeImagem;

            if (!empty($id)) {
                $equipamentoModel->update($id, $post);
            } else {
                $this->usuarioModel->save($post);
            }

            return redirect()->to('/usuario');
            // return view('upload_success', $data);
        } else {
            $data = ['errors' => 'The file has already been moved.'];

            print_r($data);

            // return view('upload_form', $data);
        }
    }
}
