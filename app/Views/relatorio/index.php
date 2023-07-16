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
                    <h1 class="m-0 text-dark" align="left">Relatorio Os Equipamentos</h1>
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
        <form action="<?= base_url('relatorio/') ?>" method="POST">
            <div class="container-fluid">
                <div class="card-body">
                    <div class="col-12">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="categorias_id">Setor</label>
                                <select name="setor" id="setor" class="form-control">

                                    <option value="">Selecione o Modelo </option>
                                    <?php foreach ($setor as $setores) : ?>
                                        <option value="<?= $setores['id'] ?>"><?= $setores['nome'] ?></option>

                                    <?php endforeach; ?>
                                </select>

                            </div>
                            <div class="form-group col-md-3">
                                <label for="tiposdemanutencao">Tipo de Ordem de Serviço</label>
                                <select name="tipoos" id="tipo" class="form-control">
                                    <option value="">Selecione o Tipo de OS</option>
                                    <?php
                                    include("conexao.php");
                                    $sql = "SELECT * FROM `ordem_servico_tipo` ";
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
                                        <option value="<?= $equipamentos['id'] ?>"><?= $equipamentos['id'] ?> - <?= $equipamentos['nome'] ?></option>

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
                                <label for="categorias_id">Tipo de Busca</label>

                                <select name="tipo_busca" id="tipo_busca" class="form-control">
                                    <option value="equipamento">Por equipamento</option>
                                    <option value="os">Por O.S</option>


                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-row">
                            <div class="form-group col-md-2">

                                <button type="submit" class="form-control btn btn-outline-secondary"><i class="fas fa-eye"></i>
                                    Visualizar
                                </button>
                            </div>
        </form>
        <div class="form-group col-md-2">
            <form action="<?= base_url('relatorio/printpdf') ?>" method="POST">
                <button type="submit" class=" form-control btn btn-outline-secondary"><i class="far fa-file-pdf"></i>
                    Gerar relatorio
                </button>
            </form>
        </div>
</div>
</div>


<div class="container col-sm-11">
    <?php //mDebug($relatorio);
    $c = 0;
    foreach ($relatorio as $relatorios) :
        if (count($relatorios['os']) > 0) : ?>
            <h3><b><?= $relatorios['nome'] . " Quantidade OS: " . count($relatorios['os']) ?> </b></h3>
            <?php foreach ($relatorios['os'] as $os) : ?>
                <div>
                    <hr>
                    <b><?= $os['nome'] == $relatorios['nome'] ? "OS: " . $os['id'] : "Equipamento: " . $os['nome'] ?></b><br>
                    <hr>
                    <b>Modelo: </b> <?= $os['modelo'] ?><br>
                    <hr>
                    <b>Data Fabricação: </b> <?= date_format(new Datetime($os['data_fabricacao']), 'd/m/Y '); ?><br>
                    <hr>
                    <b>Nome Setor: </b><?= $os['nome_setor'] ?><br>
                    <hr>
                    <b>Tipo de Os: </b><?= $os['nome_tipo_os'] ?><br>
                    <hr>
                    <b>Data Realizada: </b><?= date_format(new Datetime($os['data_realizada']), 'd/m/Y '); ?><br>
                    <hr>
                    <b>Data Proxima: </b><?= date_format(new Datetime($os['data_proxima']), 'd/m/Y '); ?><br>
                    <hr>
                    <b>Tecnico: </b><?= $os['tecnico'] ?><br>
                    <hr>
                    <b>Funcionario: </b><?= $os['funcionario'] ?><br>
                    <hr>
                    <b>Data Hora Entrada: </b><?= date_format(new Datetime($os['data_entrada']), 'd/m/Y  H:i:s '); ?><br>
                    <hr>
                    <b>Data Hora Saida: </b><?= date_format(new Datetime($os['data_saida']), 'd/m/Y  H:i:s ');  ?><br>
                    <hr>
                    <b>Material: </b><?= $os['material'] ?><br>
                    <hr>
                    <div>
                    <?php endforeach; ?>

                <?php endif; ?>
            <?php endforeach; ?>


                    </div>
                </div>
                </section>
</div>
</div>
<style>
    .container {
        margin-left: 0.6%;
        padding: 2% 2% 2% 2%;
        border: solid;
        background-color: #fff;


    }
</style>