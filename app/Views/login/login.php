<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets\img\ico.png')?>">
        <link rel="icon" href="assets\img\ico.png">

    <title>Logue-se no sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

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
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body class="text-center">
    <main class="form-signin">
        <form action="<?php echo base_url('login/signIn') ?>" method="post">
        <img src="data:image/png;base64,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" alt=" imagem" width="300px">
           <h1 class="h3 mb-3 fw-normal"></h1>
            <label for="inputEmail" class="visually-hidden">Email address</label>
            <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="visually-hidden">Password</label>
            <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>

            <button class="w-100 btn btn-outline-success" type="submit">Sign in</button>
            <a href="<?= base_url()?>/recovery/">Esqueci minha senha ?</a>
            <p class="mt-5 mb-3 text-muted">&copy; 2021 - Engenharia Clinica</p>
        </form>
        <?php $msg = session()->getFlashData('msg') ?>
        <?php if (!empty($msg)) : ?>
            <div class="alert alert-danger">
                <?php echo $msg ?>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>