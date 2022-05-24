<?php
$_base   = 'equipamento/';

include('config.php');
include("conexao.php");



?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sistema de Busca</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Busca</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <style>
        .btn-editar:link {
            color: green;
            text-decoration: none
        }

        .btn-excluir:link {
            color: red;
            text-decoration: none
        }

        .modal-header {
            background-color: #008080;

        }

        .modal-title {
            text-align: center;
            color: whitesmoke
        }

        .close {
            color: whitesmoke;
            text-decoration: none
        }

        .modal-content {
            border-color: #008080;
        }
    </style>

    <section class="content">
        <div class="container-fluid">
            <section>
                <fieldset>
                </fieldset>
            </section>

            <p id="erros" class="alert-warning" align="center">
            </p>
            <div class="table-responsive">
                <table id="tb-estagiario" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Setor</th>
                            <th>N° Série</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($equipamentos as $equipamento) : ?>
                            <tr>
                                <td><?= $equipamento['id'] ?></td>
                                <td><a href="<?= base_url($_base . 'ordem/' . $equipamento['id']) ?>"><?= $equipamento['nome'] ?></td>
                                <td><?= $equipamento['nome_setor'] ?></td>
                                <td><?= $equipamento['numero_serie'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="<?= base_url('assets/js/main.js') ?>"></script>