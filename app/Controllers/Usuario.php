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
    public function index()
    {

        $dados = [
            '_base' => $this->_base,
            'usuarios' => $this->usuarioModel->findAll()
        ];

        echo view('common/cabecalho');
        echo view('usuario/index', $dados);
        echo view('common/rodape');
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

        if ($imagefile = $this->request->getFiles()) {
            foreach($imagefile['foto'] as $img) {
                if ($img->isValid() && ! $img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move(base_url('assets/img/'), $newName);
                }
            }
        }
        if ($this->usuarioModel->save($post)) {
            return redirect()->to('/usuario/')->with('mensagem', 'Dados cadastrados com sucesso.');
        } else {
            $dados = [
                'erros' => $this->usuarioModel->errors()
            ];

            echo view('usuario/index', $dados);
        }
    }

    public function create()
    {
        // echo '<pre>';
        // print_r($_POST);
        // print_r($_FILES);

        $validationRule = [
            'foto' => [
                'label' => 'Image File',
                'rules' => 'uploaded[foto]'
                    . '|is_image[foto]'
                    . '|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[foto,100]'
                    . '|max_dims[foto,1024,768]',
            ],
        ];
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

           mDebug($data);
        }

        $img = $this->request->getFile('foto');
        // mDebug($img);
        if (! $img->hasMoved()) {
            $filepath = FCPATH  . 'uploads/' . $img->store();

            // mDebug($filepath);
            $data = ['uploaded_flleinfo' => new \CodeIgniter\Files\File($filepath)];
            mDebug($data);


            // return view('upload_success', $data);
        } else {
            $data = ['errors' => 'The file has already been moved.'];

            print_r($data);

            // return view('upload_form', $data);
        }
    }
}
