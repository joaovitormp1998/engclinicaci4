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
                    <h1 class="m-0 text-dark" align="left">Cadastro de Equipamentos</h1>
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
        <div class="container-fluid">
            <div class="card-body">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="id">Id</label>
                            <select name="id" id="id" class="form-control">

                                <option value="">Selecione </option>
                                <?php
                                include("conexao.php");
                                $sql = "SELECT DISTINCT id  FROM equipamento";
                                $resultadoT = mysqli_query($mysqli, $sql);
                                while ($row = mysqli_fetch_assoc($resultadoT)) { ?>
                                    <option value="<?= $row['id']; ?>"><?= $row['id']; ?></option><?php
                                                                                                }
                                                                                                    ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="categorias_id">Setor</label>
                            <select name="setor" id="setor" class="form-control">

                                <option value="">Selecione o Setor </option>
                                <?php
                                include("conexao.php");
                                $sql = "SELECT DISTINCT setor  FROM equipamento";
                                $resultadoT = mysqli_query($mysqli, $sql);
                                while ($row = mysqli_fetch_assoc($resultadoT)) { ?>
                                    <option value="<?= $row['setor']; ?>"><?= $row['setor']; ?></option><?php
                                                                                                    }
                                                                                                        ?>
                            </select>

                        </div>

                        <div class="form-group col-md-2">
                            <label for="categorias_id">Ano</label>

                            <select name="ano" id="ano" class="form-control">
                                <option value="">Selecione o Ano</option>
                                <option value="">2021 </option>
                                <option value="">2020 </option>
                                <option value="">2019 </option>
                                <option value="">2018 </option>
                                <option value="">Todos os Anos</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tiposdemanutencao">Tipo de manutenção</label>
                            <select name="tipoos" id="tipo" class="form-control">
                                <option value="">Selecione o Tipo de OS</option>
                                <option value="">OS Manutenção Preventiva </option>
                                <option value="">OS Manutenção Corretiva </option>
                                <option value="">OS Instalação </option>
                                <option value="">OS Treinamento </option>
                                <option value="">OS Calibração </option>
                                <option value="">OS Inspeção</option>
                                <option value="">Todas as OS</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="tiposdemanutencao">&nbsp;</label>
                            <input type="button" class="form-control btn btn-outline-secondary" value="Buscar">
                            </input>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
</div>