<?php

use chillerlan\QRCode\{
    QRCode,
    QROptions
};


foreach ($equipamentos as $equipamento) :

endforeach;

$url = base_url(URLQRCODE . 'ordem/' . $equipamento['id']);

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
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Cadastro de Equipamentos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Equipamentos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-editar:link {
            color: green;
            text-decoration: none;
        }

        .btn-excluir:link {
            color: red;
            text-decoration: none;
        }

        .modal-header {
            background-color: #008080;

        }

        .modal-title {
            text-align: center;
            color: whitesmoke;
        }

        .close {
            color: whitesmoke;
            text-decoration: none;
        }

        .modal-content {
            border-color: #008080;
        }
    </style>

    <section class="content">
        <div class="container-fluid">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalCadastroEquipamento"><i class="fas fa-plus"></i>
            </button>
            <table id="tablita" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Setor</th>
                        <th>Criticidade</th>
                        <th>Qr Code</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($equipamentos as $equipamento) : ?>
                        <tr>
                            <td align="center"><?= $equipamento['id'] ?></td>
                            <td align="justify"><a href="<?= base_url(URLQRCODE . 'ordem/' . $equipamento['id']) ?>"><?= $equipamento['nome'] ?></td>
                            <td align="justify"><?= $equipamento['marca'] ?></td>
                            <td align="center"><?= $equipamento['nome_setor'] ?></td>
                            <td align="center"><?= $equipamento['criticidade'] ?></td>
                            <td align="center"><?php echo "<img src='" . URLIMG . "imgqrcode/" .  $equipamento['id'] . ".svg' width='100'><br><hr>"; ?></td>
                            <td><a href="<?= base_url(URLQRCODE . 'edit/' . $equipamento['id']) ?>" class="btn-editar" data-id="<?= $equipamento['id'] ?>"><i class="far fa-edit"></i></a>
                                &nbsp;&nbsp; <a href="<?= base_url(URLQRCODE . 'delete/' . $equipamento['id']) ?>" class="btn-excluir" data-id="<?= $equipamento['id'] ?>"><i class="far fa-trash-alt"></i></a>
                            </td>
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

                <form id="formCadastroEquipamento" action="<?= base_url('equipamento/store') ?>" method="post">
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
                            <label for="numero_serie">Número de Serie:</label>
                            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['numero_serie'] : '' ?>" class="form-control form-control-sm" id="numero_serie" placeholder="Numero de Serie" name="numero_serie">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="patrimonio">Patrimonio:</label>
                            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['patrimonio'] : '' ?>" class="form-control form-control-sm" id="patrimonio" placeholder="Patrimonio" name="patrimonio">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="criticidade">Criticidade:</label>
                            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['criticidade'] : '' ?>" class="form-control form-control-sm" id="criticidade" placeholder="Criticidade" name="criticidade">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="tag">Tag:</label>
                            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['tag'] : '' ?>" class="form-control form-control-sm" id="tag" placeholder="Tag" name="tag">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="sincov">Siconv:</label>
                            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['sincov'] : '' ?>" class="form-control form-control-sm" id="sincov" placeholder="sincov" name="sincov">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="localizacao">Localização:</label>
                            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['localizacao'] : '' ?>" class="form-control form-control-sm" id="localizacao" placeholder="Localização" name="localizacao">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="setor">Setor:</label>
                            <select name="fk_setor" class="form-control form-control-sm" id="fk_setor" required>
                                <option value="">Selecione</option>
                                <?php
                                include("conexao.php");
                                $sql = "SELECT DISTINCT id,nome  FROM setor";
                                $resultadoT = mysqli_query($mysqli, $sql);
                                while ($row = mysqli_fetch_assoc($resultadoT)) { ?>
                                    <option value="<?= $row['id']; ?>"><?= $row['nome']; ?></option><?php
                                                                                                }
                                                                                                    ?>
                            </select>
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
                            <label for="data_aquisicao">Data Aquisição:</label>
                            <input type="date" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['data_aquisicao'] : '' ?>" class="form-control form-control-sm" id="data_aquisicao" placeholder="Data Aquisição" name="data_aquisicao">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="data_fabricacao">Data Fabricacao:</label>
                            <input type="date" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['data_fabricacao'] : '' ?>" class="form-control form-control-sm" id="data_fabricacao" placeholder="Data Fabricação" name="data_fabricacao">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="numero_pasta">Número da Pasta:</label>
                            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['numero_pasta'] : '' ?>" class="form-control form-control-sm" id="numero_pasta" placeholder="Numero Pasta" name="numero_pasta">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="numero_certificado">Número de Serie:</label>
                            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['numero_certificado'] : '' ?>" class="form-control form-control-sm" id="numero_certificado" placeholder="Numero de Certificado" name="numero_certificado">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="periocidade">Periodicidade:</label>
                            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['periocidade'] : '' ?>" class="form-control form-control-sm" id="periocidade" placeholder="Periodicidade" name="periocidade">
                        </div>
                        <div>
                            <input type="hidden" name="fk_usuario" value="<?php echo session()->id ?>">
                        </div>
                        <div> <input type="hidden" id="nome_img_qr" name="nome_img_qr" value="<?= $nome_img ?>">
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
<div class="modal fade" id="modalExcluirEquipamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formExcluirEquipamento" method="get">
                    <input id="uid" type="hidden" name="id" value="">
                    Deseja realmente excluir esse Equipamento : <span class="modal-excluir-span" id="modal-excluir-span"></span> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-danger">Excluir</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>