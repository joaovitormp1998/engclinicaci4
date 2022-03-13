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
    public function index($id=False)
    {
     
        $usuarioModel = New UsuarioModel();
     
        echo view('common/cabecalho');
        echo view('usuario/index', [  
            'usuarios' => $usuarioModel->paginate(1000),
        ]);
     
        $js['js']=view('usuario/js/main');
        echo view('common/rodape',$js);
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
        $id=$post['uid'];
        
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
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

           mDebug($data);
        }

        $img = $this->request->getFile('foto');
        $filepath = FCPATH  . 'uploads/';
        $nomeImagem = $img->getRandomName();
        if ($img->move($filepath,$nomeImagem)) {
            // $filepathold = WRITEPATH . 'uploads/' . $img->store();
            

            // mDebug($filepathold);
            $post['foto'] = $nomeImagem;
           
            if ($this->usuarioModel->save($post)) {
                return redirect()->to('/usuario/')->with('mensagem', 'Dados cadastrados com sucesso.');
            } else {
                $dados = [
                    'erros' => $this->usuarioModel->errors()
                ];
    
                mDebug($dados);
            }

            // return view('upload_success', $data);
        } else {
            $data = ['errors' => 'The file has already been moved.'];

            print_r($data);

            // return view('upload_form', $data);
        }
    }
}
