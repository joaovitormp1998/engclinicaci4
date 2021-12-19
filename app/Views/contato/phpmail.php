<?php

if (isset($_POST['email'])) {
  $email = $_POST['email'];
}
if (isset($_POST['assunto'])) {
  $assunto = $_POST['assunto'];
}
if (isset($_POST['message'])) {
  $message = $_POST['message'];
}
ini_set('display_errors', 1);
error_reporting(E_ALL);
$from = $email;
$to = "joaovitor@softeng.com.br,diego@softeng.com.br";
$subject = $assunto;
$message = $message;
$headers = "From:" . $from;
mail($to, $subject, $message, $headers);




$mensagem = " E-mail enviado com sucesso";


?>


<div class="alert alert-success" align="center"><b><?php echo $mensagem ?></b></div>