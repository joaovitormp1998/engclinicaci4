<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets/img/ico.png') ?>">
    </link>

    <title>Recuperação de Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

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

        #login {
            padding: 5px 10px;
            margin: 8px 0;
            width: 80%;


        }

        #senha {
            padding: 5px 10px;
            width: 80%;
            box-sizing: border-box;


        }

        html,
        body {
            height: 100%;
        }

        body {

            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: 10px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>
</head>

<body class="text-center">
    <main class="form-signin">
        <form action="" method="post">
            <img src="<?= base_url('156.png') ?>" alt=" imagem" width="300px" style="margin-bottom:20px;">
            <?php $msg = session()->get('msg') ?>
            <h6 class="h3 mb-3 fw-normal" style="color: #A2D1C8;">Insira seu e-mail para Recuperação:</h6>
            <?php if (!empty($msg)) : ?>
                <?php if (($msg) == "Email Enviado com Sucesso!") : ?>
                    <div class="alert alert-success">
                        <?php echo $msg ?>
                    </div>
                <?php endif; ?>
                <?php if (($msg) != "Email Enviado com Sucesso!") : ?>
                    <div class="alert alert-warning">
                        <?php echo $msg ?>
                    </div>
                <?php endif; ?>

            <?php endif; ?>
            <label for="inputEmail" class="visually-hidden">Endereço de E-mail</i></label>
            <input type="email" name="inputEmail" id="inputEmail" class="form-control has-feedback-left" placeholder="Endereço de E-mail" required autofocus>
            <button class="w-100 btn btn-outline-success" type="submit">Enviar</button>
            <p style="margin-top:20px;"><a href="<?= base_url() ?>/login/">Fazer Login?</a></p>
            <p class="mt-5 mb-3 text-muted">&copy; 2021 - Engenharia Clinica</p>
        </form>
    </main>
</body>

</html>