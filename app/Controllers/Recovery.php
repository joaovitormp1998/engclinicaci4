<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Recovery extends BaseController
{
    public function index()
    {
        $data = [];
        $msg=session()->get('msg');

        $email = $this->request->getPost('inputEmail');
        $usuarioModel = new UsuarioModel();
        $dadosUsuario = $usuarioModel->getByEmail($email);
        if (!empty($dadosUsuario)) {
            if (count($dadosUsuario) > 0) {
                $to = $email;
                $subject = "Reset Password Link";
                $token = $dadosUsuario['id'];
                $message = 'Olá ' . $dadosUsuario['nome'] . '<br><br>'
                    . 'Sua Solicitação de Reset de Senha foi recebida com Sucesso! <br> Click at Link to Reset !<br>';
                try {
                    $mail = new PHPMailer(true);
//                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    $mail->CharSet = "UTF-8";
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'monsoresjoaovitor@gmail.com';                     //SMTP username
                    $mail->Password   = 'rvmswqryavsrtpfr';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;
                    $mail->setFrom('monsoresjoaovitor@gmail.com', 'Joao Vitor');
                    $mail->addAddress($to);
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body = $message;
                    $mail->send();
                    session()->set('msg', 'Email Enviado com Sucesso!');
                } catch (Exception $e) {
                    session()->set('msg', 'E-mail não encontrado !');
                }
            } else {
                session()->set('msg', 'E-mail não encontrado !');

            }
        } else {
            session()->set('msg', 'E-mail não encontrado !');

        }

        return view('recovery/forgot_password');
    }
}
