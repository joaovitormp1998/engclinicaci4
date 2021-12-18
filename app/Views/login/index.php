
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="icon" href="assets\img\ico.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
        .bg>img {

            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;

        }
        .card {
            background-color: #f0f0f0;
            padding: 15px;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-radius: 2px;
            top: 30%;
            left: 38%;
            -webkit-box-shadow: 1px 1px 10px 1px #000000;
            box-shadow: 4px 5px 10px 3px #000000


        }

        body {
			background: #A2D1C8;
            margin: 0;
            padding: 0;
           
        }

        #form-login {
			width: 18rem;
			height: 10rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
			
        }
		#login{
			padding: 5px 10px;
			margin: 8px 0;
			width: 80%;
			
			
		}
		#senha{
			padding: 5px 10px;
			width: 80%;
			box-sizing: border-box;
			

		}
    </style>
</head>

<body>
<!--    <div class='bg'>-->
<!--        <img src="--><?//= base_url('assets/dist/img/background.png') ?><!--" alt="">-->
<!--    </div>-->
    <div class='card'>
        <img src="<?= base_url('assets/dist/img/logouv..png') ?>" alt=" imagem" width="120px">
<P></P>
        <h3 style="color: #0c525d"> SISCONTROLE</h3>
		<?php
				if($this->session->flashdata('error')){
					?>
					<div class="alert alert-danger text-center" style="margin-top:20px;">
						<?php echo $this->session->flashdata('error'); ?>
					</div>
					<?php
				}
			?>
        <form id="form-login"   method="POST" action="<?php echo base_url(); ?>index.php/user/login">

            <input class="input-login" type="text" id="login" name="login" placeholder=" Login">
            <input  class="input-pass" type="password" id="senha" name="senha" placeholder=" Senha">
            <a href="http://" target="_blank" rel="noopener noreferrer">Esqueci minha senha</a>
            <button type="submit"class="btn btn-outline-success ">Entrar</button>




        </form>
    </div>

	

</body>

</html>
