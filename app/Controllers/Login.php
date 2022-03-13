<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;

class Login extends BaseController
{
	public function index()
	{
		// print_r(password_hash('teste123', PASSWORD_DEFAULT));
		// die;
		return view('login/login');
	}

	public function signIn()
	{
		$email = $this->request->getPost('inputEmail');
		$password = $this->request->getPost('inputPassword');

		$usuarioModel = new UsuarioModel();

		$dadosUsuario = $usuarioModel->getByEmail($email);
		if (count($dadosUsuario) > 0) {
			$hashUsuario = $dadosUsuario['senha'];
			if (password_verify($password, $hashUsuario)) {
				session()->set('isLoggedIn', true);
				
				session()->set('id', $dadosUsuario['id']);
				session()->set('nome', $dadosUsuario['nome']);
				session()->set('foto', $dadosUsuario['foto']);
				return redirect()->to(base_url());
			} else {
				session()->setFlashData('msg', 'Usuário ou Senha incorretos');
				return redirect()->to('/login');
			}
		} else {
			session()->setFlashData('msg', 'Usuário ou Senha incorretos');
			return redirect()->to('/login');
		}
	}

	public function signOut()
	{
		session()->destroy();
		return redirect()->to(base_url());
	}

	function forgot_password()
	{
		if ($this->request->isAJAX('email')) {
			var_dump($this->request->isAJAX());
		} else {
			return view('login/forgot_password');
		}
	}
}
