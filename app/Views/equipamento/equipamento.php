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

        .nome-equipamento {
            color: black;
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
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalCadastroEquipamento">
                <i class="fas fa-plus"></i>
            </button>
            <div class="table-responsive">
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
                        <?php if (!empty($equipamentos)) : ?>
                            <?php foreach ($equipamentos as $equipamento) : ?>
                                <tr>
                                    <td><?= $equipamento['id'] ?></td>
                                    <td><a class="nome-equipamento" href="<?= base_url(URLQRCODE . 'ordem/' . $equipamento['id']) ?>"><?= $equipamento['nome'] ?></a></td>
                                    <td><?= $equipamento['marca'] ?></td>
                                    <td><?= $equipamento['setor_nome'] ?></td>
                                    <td><?= $equipamento['criticidade'] ?></td>
                                    <td>

                                    </td>
                                    <td>
                                        <a href="#" class="btn-editar" data-id="<?= $equipamento['id'] ?>" data-nome="<?= $equipamento['nome'] ?>" data-marca="<?= $equipamento['marca'] ?>" data-modelo="<?= $equipamento['modelo'] ?>" data-numero-serie="<?= $equipamento['numero_serie'] ?>" data-patrimonio="<?= $equipamento['patrimonio'] ?>" data-criticidade="<?= $equipamento['criticidade'] ?>" data-tag="<?= $equipamento['tag'] ?>" data-sincov="<?= $equipamento['sincov'] ?>" data-localizacao="<?= $equipamento['localizacao'] ?>" data-fornecedor="<?= $equipamento['fornecedor'] ?>" data-unidade="<?= $equipamento['unidade'] ?>" data-data-aquisicao="<?= $equipamento['data_aquisicao'] ?>" data-data-fabricacao="<?= $equipamento['data_fabricacao'] ?>" data-numero-pasta="<?= $equipamento['numero_pasta'] ?>" data-numero-certificado="<?= $equipamento['numero_certificado'] ?>" data-periocidade="<?= $equipamento['periocidade'] ?>" data-img-qrcode="<?= $equipamento['img_qrcode'] ?>" data-fk-setor="<?= $equipamento['fk_setor'] ?>" data-fk-usuario="<?= $equipamento['fk_usuario'] ?>">
                                            <i class="fas fa-pencil-alt text-success"></i>
                                        </a>

                                        <a href="<?= base_url(URLQRCODE . 'delete/' . $equipamento['id']) ?>" class="btn-excluir" data-id="<?= $equipamento['id'] ?>" title="Excluir dados do equipamento">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7">Nenhum equipamento encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Inclusão das bibliotecas jQuery e Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-editar').on('click', function() {
                var id = $(this).data('id');
                var nome = $(this).data('nome');
                var marca = $(this).data('marca');
                var modelo = $(this).data('modelo');
                var numeroSerie = $(this).data('numero-serie');
                var patrimonio = $(this).data('patrimonio');
                var criticidade = $(this).data('criticidade');
                var tag = $(this).data('tag');
                var sincov = $(this).data('sincov');
                var localizacao = $(this).data('localizacao');
                var fornecedor = $(this).data('fornecedor');
                var unidade = $(this).data('unidade');
                var setor = $(this).data('setor');
                var dataAquisicao = $(this).data('data-aquisicao');
                var dataFabricacao = $(this).data('data-fabricacao');
                var numeroPasta = $(this).data('numero-pasta');
                var numeroCertificado = $(this).data('numero-certificado');
                var periocidade = $(this).data('periocidade');
                var imgQrcode = $(this).data('img-qrcode');
                var fkSetor = $(this).data('fk-setor');
                var fkUsuario = $(this).data('fk-usuario');

                $('#edit-id').val(id);
                $('#edit-nome').val(nome);
                $('#edit-marca').val(marca);
                $('#edit-modelo').val(modelo);
                $('#edit-numero-serie').val(numeroSerie);
                $('#edit-patrimonio').val(patrimonio);
                $('#edit-criticidade').val(criticidade);
                $('#edit-tag').val(tag);
                $('#edit-sincov').val(sincov);
                $('#edit-localizacao').val(localizacao);
                $('#edit-fornecedor').val(fornecedor);
                $('#edit-unidade').val(unidade);
                $('#edit-data-aquisicao').val(dataAquisicao);
                $('#edit-data-fabricacao').val(dataFabricacao);
                $('#edit-numero-pasta').val(numeroPasta);
                $('#edit-numero-certificado').val(numeroCertificado);
                $('#edit-periocidade').val(periocidade);
                $('#edit-img-qrcode').val(imgQrcode);
                $('#edit-setor').val(setor);
                $('#edit-fk-setor').val(fkSetor);
                $('#edit-fk-usuario').val(fkUsuario);

                $('#modalEditarEquipamento').modal('show');
            });
        });
    </script>
    <div class="modal fade" id="modalEditarEquipamento" tabindex="-1" role="dialog" aria-labelledby="modalEditarEquipamentoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarEquipamentoLabel">Editar Equipamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('equipamento/update') ?>" method="post">
                        <input type="hidden" name="id" id="edit-id" value="">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="edit-nome">Nome</label>
                                <input type="text" class="form-control" id="edit-nome" name="nome" placeholder="Nome do equipamento" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit-marca">Marca</label>
                                <input type="text" class="form-control" id="edit-marca" name="marca" placeholder="Marca do equipamento" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="edit-modelo">Modelo</label>
                                <input type="text" class="form-control" id="edit-modelo" name="modelo" placeholder="Modelo do equipamento" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit-numero-serie">Número de Série</label>
                                <input type="text" class="form-control" id="edit-numero-serie" name="numero_serie" placeholder="Número de Série do equipamento" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="edit-patrimonio">Patrimônio</label>
                                <input type="text" class="form-control" id="edit-patrimonio" name="patrimonio" placeholder="Patrimônio do equipamento" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit-criticidade">Criticidade</label>
                                <input type="text" class="form-control" id="edit-criticidade" name="criticidade" placeholder="Criticidade do equipamento" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="edit-tag">Tag</label>
                                <input type="text" class="form-control" id="edit-tag" name="tag" placeholder="Tag do equipamento" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit-sincov">Sincov</label>
                                <input type="text" class="form-control" id="edit-sincov" name="sincov" placeholder="Sincov do equipamento" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="edit-localizacao">Localização</label>
                                <input type="text" class="form-control" id="edit-localizacao" name="localizacao" placeholder="Localização do equipamento" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit-fornecedor">Fornecedor</label>
                                <input type="text" class="form-control" id="edit-fornecedor" name="fornecedor" placeholder="Fornecedor do equipamento" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="edit-unidade">Unidade</label>
                                <input type="text" class="form-control" id="edit-unidade" name="unidade" placeholder="Unidade do equipamento" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit-data-aquisicao">Data de Aquisição</label>
                                <input type="text" class="form-control" id="edit-data-aquisicao" name="data_aquisicao" placeholder="Data de Aquisição do equipamento" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="edit-data-fabricacao">Data de Fabricação</label>
                                <input type="text" class="form-control" id="edit-data-fabricacao" name="data_fabricacao" placeholder="Data de Fabricação do equipamento" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit-numero-pasta">Número de Pasta</label>
                                <input type="text" class="form-control" id="edit-numero-pasta" name="numero_pasta" placeholder="Número de Pasta do equipamento" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="edit-numero-certificado">Número de Certificado</label>
                                <input type="text" class="form-control" id="edit-numero-certificado" name="numero_certificado" placeholder="Número de Certificado do equipamento" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit-periocidade">Periocidade</label>
                                <input type="text" class="form-control" id="edit-periocidade" name="periocidade" placeholder="Periocidade do equipamento" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="edit-img-qrcode">Imagem do QR Code</label>
                                <input type="text" class="form-control" id="edit-img-qrcode" name="img_qrcode" placeholder="Imagem do QR Code do equipamento" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit-fk-setor">Setor</label>
                                <select class="form-control" id="edit-fk-setor" name="fk_setor">
                                    <!-- Opções do select -->
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="edit-fk-usuario">Usuário</label>
                                <select class="form-control" id="edit-fk-usuario" name="fk_usuario">
                                    <!-- Opções do select -->
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                        <hr>
                        <div class="row">
                            <div class="form-group col-12 col-sm-6">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control form-control-sm" id="nome" placeholder="Nome" name="nome" required>
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="marca">Marca:</label>
                                <input type="text" class="form-control form-control-sm" id="marca" placeholder="Marca" name="marca" required>
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="modelo">Modelo:</label>
                                <input type="text" class="form-control form-control-sm" id="modelo" placeholder="Modelo" name="modelo" required>
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="numero_serie">Número de Série:</label>
                                <input type="text" class="form-control form-control-sm" id="numero_serie" placeholder="Número de Série" name="numero_serie">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="patrimonio">Patrimônio:</label>
                                <input type="text" class="form-control form-control-sm" id="patrimonio" placeholder="Patrimônio" name="patrimonio">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="criticidade">Criticidade:</label>
                                <input type="text" class="form-control form-control-sm" id="criticidade" placeholder="Criticidade" name="criticidade">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="tag">Tag:</label>
                                <input type="text" class="form-control form-control-sm" id="tag" placeholder="Tag" name="tag">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="sincov">Siconv:</label>
                                <input type="text" class="form-control form-control-sm" id="sincov" placeholder="Siconv" name="sincov">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="localizacao">Localização:</label>
                                <input type="text" class="form-control form-control-sm" id="localizacao" placeholder="Localização" name="localizacao">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="setor">Setor:</label>
                                <select name="fk_setor" class="form-control form-control-sm" id="fk_setor" required>
                                    <option value="">Selecione</option>
                                    <?php
                                    include("conexao.php");
                                    $sql = "SELECT DISTINCT id, nome FROM setor";
                                    $resultadoT = mysqli_query($mysqli, $sql);
                                    while ($row = mysqli_fetch_assoc($resultadoT)) {
                                        echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="unidade">Unidade:</label>
                                <input type="text" class="form-control form-control-sm" id="unidade" placeholder="Unidade" name="unidade">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="fornecedor">Fornecedor:</label>
                                <input type="text" class="form-control form-control-sm" id="fornecedor" placeholder="Fornecedor" name="fornecedor">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="data_aquisicao">Data de Aquisição:</label>
                                <input type="date" class="form-control form-control-sm" id="data_aquisicao" placeholder="Data de Aquisição" name="data_aquisicao">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="data_fabricacao">Data de Fabricação:</label>
                                <input type="date" class="form-control form-control-sm" id="data_fabricacao" placeholder="Data de Fabricação" name="data_fabricacao">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="numero_pasta">Número da Pasta:</label>
                                <input type="text" class="form-control form-control-sm" id="numero_pasta" placeholder="Número da Pasta" name="numero_pasta">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="numero_certificado">Número do Certificado:</label>
                                <input type="text" class="form-control form-control-sm" id="numero_certificado" placeholder="Número do Certificado" name="numero_certificado">
                            </div>
                            <div class="form-group col-12 col-sm-6">
                                <label for="periocidade">Periodicidade:</label>
                                <input type="text" class="form-control form-control-sm" id="periocidade" placeholder="Periodicidade" name="periocidade">
                            </div>
                        </div>
                        <input type="hidden" name="fk_usuario" value="<?php echo session()->id ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-info">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
