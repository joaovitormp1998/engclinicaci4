<? defined('BASEPATH') or exit('No direct script access allowed'); ?>
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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
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
                    <form>
                        <label for="">ID</label></br>
                        <select name="id">
                            <option value="">Selecione </option>
                            <?php
                            include("conexao.php");
                            $sql = "SELECT DISTINCT id  FROM equipamento";
                            $resultadoT = mysqli_query($mysqli, $sql);
                            while ($row = mysqli_fetch_assoc($resultadoT)) { ?>
                                <option value="<?= $row['id']; ?>"><?= $row['id']; ?></option><?php
                                                                                            }
                                                                                                ?>
                        </select></br>
                        <label for="">NOME</label><br>
                        <select name="nome">
                            <option value="">Selecione </option>
                            <?php
                            include("conexao.php");
                            $sql = "SELECT DISTINCT nome  FROM equipamento order by nome";
                            $resultadoT = mysqli_query($mysqli, $sql);
                            while ($row = mysqli_fetch_assoc($resultadoT)) { ?>
                                <option value="<?= $row['nome']; ?>"><?= $row['nome']; ?></option><?php
                                                                                                }
                                                                                                    ?>
                        </select></br>
                        <label for="">SETOR</label><br>
                        <select name="narca">
                            <option value="">Selecione </option>
                            <?php
                            include("conexao.php");
                            $sql = "SELECT DISTINCT setor  FROM equipamento where setor is not null group by setor";
                            $resultadoT = mysqli_query($mysqli, $sql);
                            while ($row = mysqli_fetch_assoc($resultadoT)) { ?>
                                <option value="<?= $row['setor']; ?>"><?= $row['setor']; ?></option><?php
                                                                                                }
                                                                                                    ?>
                        </select></br>
                        <label for="">CRITICIDADE</label><br>
                        <select name="criticidade">
                            <option value="">Selecione </option>
                            <?php
                            include("conexao.php");
                            $sql = "SELECT DISTINCT criticidade  FROM equipamento where criticidade is not null group by criticidade";
                            $resultadoT = mysqli_query($mysqli, $sql);
                            while ($row = mysqli_fetch_assoc($resultadoT)) { ?>
                                <option value="<?= $row['criticidade']; ?>"><?= $row['criticidade']; ?></option><?php
                                                                                                            }
                                                                                                                ?>
                        </select>
                        <button class="btn-lg btn-secondary button-br" id="btnFiltrar">Filtrar</button>
                        </center>
                    </form>
                </fieldset>
            </section>


            <p id="erros" class="alert-warning" align="center">
            </p>
            <table id="tb-estagiario" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Setor</th>
                        <th>Criticidade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($equipamentos as $equipamento) : ?>
                        <tr>
                            <td><?= $equipamento->id ?></td>
                            <td><a href="<?= base_url($_base . 'ordem/' . $equipamento->id) ?>"><?= $equipamento->nome ?></td>
                            <td><?= $equipamento->setor ?></td>
                            <td><?= $equipamento->criticidade ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>