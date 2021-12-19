<?php

use chillerlan\QRCode\{
    QRCode,
    QROptions
};

include './vendor/autoload.php';
include './config.php';
include("conexao.php");

foreach ($equipamentos as $equipamento) :

    $nome = $equipamento->nome;
endforeach;


$url = base_url($_base . 'ordem/' . $equipamento->id);

$options = new QROptions([
    'version' => 5,
    'outputType' => QRCode::OUTPUT_MARKUP_SVG,
    'eccLevel' => QRCode::ECC_L,
]);

$qrcode = new QRCode($options);

$nome_img = $nome . '.svg';

$qrcode->render($url, 'assets/imgqrcode/' . $nome_img);
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Equipamento</h1>
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
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalCadastroequipamento"><i class="fas fa-plus"></i>

            </button>

            <table id="tb-estagiario" class="display">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Setor</th>
                        <th>Qr Code</th>
                        <th>Ações</th>
                        <th>.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($equipamentos as $equipamento) : ?>
                        <tr>
                            <td><?= $equipamento->id ?></td>
                            <td><a href="<?= base_url($_base . 'ordem/' . $equipamento->id) ?>"><?= $equipamento->nome ?></td>
                            <td><?= $equipamento->marca ?></td>
                            <td><?= $equipamento->modelo ?></td>
                            <td><?= $equipamento->setor ?></td>
                            <td><?php echo "<img src='" . URL . "imgqrcode/" .  $nome_img . "' width='100'><br><hr>"; ?></td>
                            <td><a href="<?= base_url($_base . 'getDados/') ?>" class="btn-editar" data-id="<?= $equipamento->id ?>"><i class="far fa-edit"></i></a></td>
                            <td><a href="<?= base_url($_base . 'excluir/') ?>" class="btn-excluir" data-id="<?= $equipamento->id ?>"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                    <br>
                </tbody>
            </table>
        </div>
    </section>


</div>

<div class="modal fade" id="modalCadastroEquipamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cadastro de equipamentos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCadastroEquipamento" action="<?= base_url('equipamento/gravar') ?>" method="post">
                    <input id="uid" type="hidden" name="uid" value="">

                    <h4>Dados do Equipamento</h4>
                    </hr>
                    <div class="row">
                        <div class="form-group col-6 col-sm-6">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control form-control-sm" id="nome" placeholder="Nome" name="nome" required>
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="marca">Marca:</label>
                            <input type="text" class="form-control form-control-sm" id="marca" placeholder="Marca" name="marca" required>
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="modelo">Modelo :</label>
                            <input type="text" class="form-control form-control-sm" id="modelo" placeholder="Modelo" name="modelo">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="numeroSerie">Número de Serie:</label>
                            <input type="text" class="form-control form-control-sm" id="numeroSerie" placeholder="Numero de Serie" name="numeroSerie">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="patrimonio">Patrimonio:</label>
                            <input type="text" class="form-control form-control-sm" id="patrimonio" placeholder="Patrimonio" name="patrimonio">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="criticidade">Criticidade:</label>
                            <input type="text" class="form-control form-control-sm" id="criticidade" placeholder="Numero de Serie" name="criticidade">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="tag">Tag:</label>
                            <input type="text" class="form-control form-control-sm" id="tag" placeholder="Tag" name="tag">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="siconv">Número de Serie:</label>
                            <input type="text" class="form-control form-control-sm" id="siconv" placeholder="Siconv" name="siconv">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="localizacao">Localização:</label>
                            <input type="text" class="form-control form-control-sm" id="localizacao" placeholder="Localização" name="localizacao">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="setor">Setor:</label>
                            <input type="text" class="form-control form-control-sm" id="setor" placeholder="Setor" name="setor">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="unidade">Unidade:</label>
                            <input type="text" class="form-control form-control-sm" id="unidade" placeholder="Unidade" name="unidade">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="fornecedor">Fornecedor:</label>
                            <input type="text" class="form-control form-control-sm" id="fornecedor" placeholder="Fornecedor" name="fornecedor">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="dataAquisicao">Data Aquisição:</label>
                            <input type="date" class="form-control form-control-sm" id="dataAquisicao" placeholder="Data Aquisição" name="dataAquisicao">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="dataFabricacao">Data Fabricacao:</label>
                            <input type="date" class="form-control form-control-sm" id="dataFabricacao" placeholder="Data Fabricação" name="dataFabricacao">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="numeroPasta">Número da Pasta:</label>
                            <input type="text" class="form-control form-control-sm" id="numeroPasta" placeholder="Numero Pasta" name="numeroPasta">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="numeroCertificado">Número de Serie:</label>
                            <input type="text" class="form-control form-control-sm" id="numeroCertificado" placeholder="Numero de Certificado" name="numeroCertificado">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="periodicidade">Periodicidade:</label>
                            <input type="text" class="form-control form-control-sm" id="periodicidade" placeholder="Periodicidade" name="periodicidade">
                        </div>
                        <div> <input type="hidden" id="nome_img_qr" name="nome_img_qr" value="<?= $nome_img ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-info">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalExcluirEquipamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <!-- <div class="modal" id="modalExcluirequipamento" tabindex="-1"> -->
        <!-- <div class="modal-dialog"> -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('equipamento/deletar') ?>" id="formExcluirequipamento" method="post">
                <div class="modal-body">
                    <p>Deseja realmente excluir esse registro?</p>
                    <input type="hidden" id="uidExcluir" name="uid" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-info">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>