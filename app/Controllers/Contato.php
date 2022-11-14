<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create an instance; passing `true` enables exceptions
class Contato extends BaseController
{

    public function index()
    {
        echo view('common/cabecalho');
        echo view('contato/contato');
        echo view('common/footer');

        try {
            if (isset($_POST['nombre'])) {
                $nome = $_POST['nombre'];
              }
              if (isset($_POST['email'])) {
                $email = $_POST['email'];
              }
              if (isset($_POST['assunto'])) {
                $assunto = $_POST['assunto'];
              }
              if (isset($_POST['message'])) {
                $message = $_POST['message'];
              }
            $mail = new PHPMailer(true);
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'monsoresjoaovitor@gmail.com';                     //SMTP username
            $mail->Password   = 'rvmswqryavsrtpfr';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($email,$nome);
            $mail->addAddress('joaovitor@softeng.com.br', 'Dev Nascimento');     //Add a recipient
            $mail->addAddress('diego@softeng.com.br','Dev Serra');               //Name is optional

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $assunto;
            $mail->Body    = $message;

            $mail->send();
            $mensagem = " E-mail enviado com sucesso";
         
        } catch (Exception $e) {
            $mensagem = " Falha ao Enviar o Email. Mailer Error: {$mail->ErrorInfo}";
        }
        echo "<div class='alert alert-success' align='center'><b><?php echo '$mensagem' ?></b></div>";
    }
 
}
?>

