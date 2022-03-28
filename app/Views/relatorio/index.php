<style>
    .container {
        width: 100%;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    tr th {
        padding: 15px;
        color: #fff;
        background-color: #555;
        border-right: 1px solid;
    }

    tr th:last-child {
        border-right: none;
    }

    table,
    tr,
    td {
        border: 1px solid;
        padding: 10px;

    }

    .text-success {
        color: forestgreen;
    }

    .text-danger {
        color: red;
    }

    .nome-categoria {
        font-weight: bolder;
        background-color: #ccc;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark" align="left">Relatorio de Os de Equipamentos</h1>
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
    <section class="content">
    <form action="<?= base_url('relatorio/')?>" method="POST">
        <div class="container-fluid">
            <div class="card-body">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="categorias_id">Setor</label>
                            <select name="setor" id="setor" class="form-control">

                                <option value="">Selecione o Modelo </option>
                                <?php foreach ($setor as $setores) : ?>
                                    <option value="<?=$setores['id']?>"><?=$setores['nome']?></option>
                                    
                    <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form-group col-md-3">
                            <label for="tiposdemanutencao">Tipo de Ordem de Serviço</label>
                            <select name="tipoos" id="tipo" class="form-control">
                                <option value="">Selecione o Tipo de OS</option>
                                <?php
                                include("conexao.php");
                                $sql = "SELECT * FROM `ordem-servico-tipo` ";
                                $resultadoT = mysqli_query($mysqli, $sql);
                                while ($row = mysqli_fetch_assoc($resultadoT)) { ?>
                                    <option value="<?= $row['id']; ?>"><?= $row['nome']; ?></option><?php
                                                                                                }
                                                                                                    ?>
                                <option value="">Todas as OS</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="id">Nome</label>
                            <select name="id" id="id" class="form-control">

                                <option value="">Selecione </option>
                          
                                <?php foreach ($equipamento as $equipamentos) : ?>
                                    <option value="<?=$equipamentos['id']?>"><?=$equipamentos['id']?> - <?=$equipamentos['nome']?></option>
                                    
                    <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="categorias_id">Ano</label>

                            <select name="ano" id="ano" class="form-control">
                                <option value="">Selecione o Ano</option>
                                <?php
                                include("conexao.php");
                                $sql = "SELECT DISTINCT ano FROM `vw_equipamento_relatorio`
                                ";
                                $resultadoT = mysqli_query($mysqli, $sql);
                                while ($row = mysqli_fetch_assoc($resultadoT)) { ?>
                                    <option value="<?= $row['ano']; ?>"><?= $row['ano']; ?></option><?php
                                                                                                                        }
                                                                                                                            ?>
                           
                                <option value="">Todos os Anos</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="tiposdemanutencao">&nbsp;</label>
                            <button type="submit" class="form-control btn btn-outline-secondary"  >Buscar
                            </button></form>
                            <form action="<?= base_url('relatorio/printpdf')?>" method="POST">
                            <button type="submit"class="btn btn-outline-secondary" ><i class="far fa-file-pdf"></i>

                            </button></form>
                        </div>
                    </div>
                </div>
                                                                                                                    </form>
                <table class="table">
                        <thead class="thead-dark">

                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th class="col">Data de Fabricação</th>
                        <th>Setor</th>
                        <th>Ordem</th>
                        <th class="col">Data Realizada</th>
                        <th class="col">Data Proxima</th>
                        <th>Técnico</th>
                        <th class="col">Funcionario Solicitante</th>
                        <th class="col">Data Entrada:</th>
                        <th class="col">Data Saida</th>
                        <th class="col">Material Utilizado</th>
                        </thead>
                        <tr>
                        <?php foreach ($relatorio as $relatorios) : ?>

                        <td><?= $relatorios['nome'] ?></td>
                        <td><?= $relatorios['marca'] ?></td>
                        <td><?= $relatorios['modelo'] ?></td>
                        <td><?=  date_format(new Datetime($relatorios['data_fabricacao']), 'd/m/Y ');?></td>
                        <td><?= $relatorios['nome_setor'] ?></td>
                        <td><?= $relatorios['nome_tipo_os'] ?></td>
                        <td><?= date_format(new Datetime($relatorios['data_realizada']), 'd/m/Y '); ?></td>
                        <td><?= date_format(new Datetime($relatorios['data_proxima']), 'd/m/Y '); ?></td>
                        <td>
                         <?php if ($relatorios['tecnico'] !="") ?>   
                         <?= $relatorios['tecnico'] ?>

                        </td>
                        <td><?= $relatorios['funcionario'] ?></td>
                        <td><?= date_format(new Datetime($relatorios['data_entrada']), 'd/m/Y  H:i:s '); ?></td>
                        <td><?= date_format(new Datetime($relatorios['data_saida']), 'd/m/Y  H:i:s ');  ?></td>
                        <td><?= $relatorios['material'] ?></td>
                    
                </tr>
                        <?php endforeach ; ?>
                           
                </table>

            </div>
        </div>
    </section>
</div>