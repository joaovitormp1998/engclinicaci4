<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
 
class AjaxFileUpload extends Controller
{
    public function index()
    {    
         return view('index');
    }
 
    public function upload()
    {  
        helper(['form', 'url']);
         
        $database = \Config\Database::connect();
        $builder = $database->table('usuarios');

        $validateImage = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file, image/png, image/jpg,image/jpeg, image/gif]',
                'max_size[file, 4096]',
            ],
        ]);
    
        $response = [
            'success' => false,
            'data' => '',
            'msg' => "Image could not upload"
        ];

        if ($validateImage) {
            $imageFile = $this->request->getFile('file');
            $imageFile->move(WRITEPATH . 'assets/img');

            $data = [
                'img_name' => $imageFile->getClientName(),
                'file'  => $imageFile->getClientMimeType()
            ];

            $save = $builder->insert($data);

            $response = [
                'success' => true,
                'data' => $save,
                'msg' => "Image successfully uploaded"
            ];
        }

        return $this->response->setJSON($response);
    }
}