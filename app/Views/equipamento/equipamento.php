<?php

include './config.php';
include("conexao.php");


use chillerlan\QRCode\{
    QRCode,
    QROptions
};


foreach ($equipamentos as $equipamento) :

endforeach; 
$_base="http://localhost:8080/equipamento/";
// Em caso de rodar em produção alterar linha abaixo
// $_base="http://www.softeng.com.br/equipamento/";
$url = base_url($_base . 'ordem/' . $equipamento['id']);

$options = new QROptions([
    'version' => 5,
    'outputType' => QRCode::OUTPUT_MARKUP_SVG,
    'eccLevel' => QRCode::ECC_L,
]);

$qrcode = new QRCode($options);

$nome_img = $equipamento['id'] . '.svg';

$qrcode->render($url, 'assets/imgqrcode/' . $nome_img);
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Equipamentos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Equipamentos</li>
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
            <script>
                function confirma() {
                    if (!confirm("Deseja excluir este registros?")) {
                        return false;
                    }
                    return true;
                }
            </script>
            <table id="tablita" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Setor</th>
                        <th>Qr Code</th>
                        <th>Editar</th>
                        <th> Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($equipamentos as $equipamento) : ?>
                        <tr>
                            <td><?= $equipamento['id'] ?></td>
                            <td><a href="<?= base_url($_base . 'ordem/' . $equipamento['id']) ?>"><?= $equipamento['nome'] ?></td>
                            <td><?= $equipamento['marca'] ?></td>
                            <td><?= $equipamento['modelo'] ?></td>
                            <td><?= $equipamento['setor'] ?></td>
                            <td><?php echo "<img src='" . URL . "imgqrcode/" .  $equipamento['id']. ".svg' width='100'><br><hr>"; ?></td>
                            <td><a href="<?= base_url($_base . 'edit/' . $equipamento['id']) ?>"  class="btn-editar" data-id="<?= $equipamento['id'] ?>"><i class="far fa-edit"></i></a></td>
                            <td><a href="<?= base_url($_base . 'delete/' . $equipamento['id']) ?>" class="btn-excluir" data-id="<?= $equipamento['id'] ?>" onclick="return confirma();"><i class="far fa-trash-alt"></i></a></td>
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

                <?php echo form_open('equipamento/store') ?>
                <input id="uid" type="hidden" name="uid" value="">
                <h4>Dados do Equipamento</h4>
                </hr>
                <div class="row">
                    <div class="form-group col-6 col-sm-6">
                        <label for="nome">Nome:</label>
                        <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['nome'] : '' ?>" class="form-control form-control-sm" id="nome" placeholder="Nome" name="nome" required>
                    </div>
                    <div class="form-group col-8 col-sm-6">
                        <label for="marca">Marca:</label>
                        <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['marca'] : '' ?>" class="form-control form-control-sm" id="marca" placeholder="Marca" name="marca" required>
                    </div>
                    <div class="form-group col-8 col-sm-6">
                        <label for="modelo">Modelo :</label>
                        <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['modelo'] : '' ?>" class="form-control form-control-sm" id="modelo" placeholder="Modelo" name="modelo">
                    </div>
                    <div class="form-group col-8 col-sm-6">
                        <label for="numeroSerie">Número de Serie:</label>
                        <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['numeroSerie'] : '' ?>" class="form-control form-control-sm" id="numeroSerie" placeholder="Numero de Serie" name="numeroSerie">
                    </div>
                    <div class="form-group col-8 col-sm-6">
                        <label for="patrimonio">Patrimonio:</label>
                        <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['patrimonio'] : '' ?>" class="form-control form-control-sm" id="patrimonio" placeholder="Patrimonio" name="patrimonio">
                    </div>
                    <div class="form-group col-8 col-sm-6">
                        <label for="criticidade">Criticidade:</label>
                        <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['criticidade'] : '' ?>" class="form-control form-control-sm" id="criticidade" placeholder="Numero de Serie" name="criticidade">
                    </div>
                    <div class="form-group col-8 col-sm-6">
                        <label for="tag">Tag:</label>
                        <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['tag'] : '' ?>" class="form-control form-control-sm" id="tag" placeholder="Tag" name="tag">
                    </div>
                    <div class="form-group col-8 col-sm-6">
                        <label for="siconv">Siconv:</label>
                        <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['siconv'] : '' ?>" class="form-control form-control-sm" id="siconv" placeholder="Siconv" name="siconv">
                    </div>
                    <div class="form-group col-8 col-sm-6">
                        <label for="localizacao">Localização:</label>
                        <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['localizacao'] : '' ?>" class="form-control form-control-sm" id="localizacao" placeholder="Localização" name="localizacao">
                    </div>
                    <div class="form-group col-8 col-sm-6">
                        <label for="setor">Setor:</label>
                        <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['setor'] : '' ?>" class="form-control form-control-sm" id="setor" placeholder="Setor" name="setor">
                    </div>
                    <div class="form-group col-8 col-sm-6">
                        <label for="unidade">Unidade:</label>
                        <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['unidade'] : '' ?>" class="form-control form-control-sm" id="unidade" placeholder="Unidade" name="unidade">
                    </div>
                    <div class="form-group col-8 col-sm-6">
                        <label for="fornecedor">Fornecedor:</label>
                        <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['fornecedor'] : '' ?>" class="form-control form-control-sm" id="fornecedor" placeholder="Fornecedor" name="fornecedor">
                    </div>
                    <div class="form-group col-8 col-sm-6">
                        <label for="dataAquisicao">Data Aquisição:</label>
                        <input type="date" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['dataAquisicao'] : '' ?>" class="form-control form-control-sm" id="dataAquisicao" placeholder="Data Aquisição" name="dataAquisicao">
                    </div>
                    <div class="form-group col-8 col-sm-6">
                        <label for="dataFabricacao">Data Fabricacao:</label>
                        <input type="date" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['dataFabricacao'] : '' ?>" class="form-control form-control-sm" id="dataFabricacao" placeholder="Data Fabricação" name="dataFabricacao">
                    </div>
                    <div class="form-group col-8 col-sm-6">
                        <label for="numeroPasta">Número da Pasta:</label>
                        <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['numeroPasta'] : '' ?>" class="form-control form-control-sm" id="numeroPasta" placeholder="Numero Pasta" name="numeroPasta">
                    </div>
                    <div class="form-group col-8 col-sm-6">
                        <label for="numeroCertificado">Número de Serie:</label>
                        <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['numeroCertificado'] : '' ?>" class="form-control form-control-sm" id="numeroCertificado" placeholder="Numero de Certificado" name="numeroCertificado">
                    </div>
                    <div class="form-group col-8 col-sm-6">
                        <label for="periodicidade">Periodicidade:</label>
                        <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['periodicidade'] : '' ?>" class="form-control form-control-sm" id="periodicidade" placeholder="Periodicidade" name="periodicidade">
                    </div>
                    <div> <input type="hidden" id="nome_img_qr" name="nome_img_qr" value="<?= isset($dadosEquipamento) ? $dadosEquipamento['id']: ''?>.svg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-info">Salvar</button>
                    <input type="hidden" name="id" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['id'] : '' ?>">

                    <?php echo form_close() ?>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalExcluirEquipamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('equipamento/excluir') ?>" id="formExcluirequipamento" method="post">
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

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js ">
</script>
<script> $(document).ready(function(){
        $('#tablita').DataTable({
            dom:'Bftip',
            buttons: [
                'pdfHtml5',
            ]
        });
    });</script>