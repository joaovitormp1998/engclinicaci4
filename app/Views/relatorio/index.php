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
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark" align="right">Cadastro de Equipamentos</h1>
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
    <div class="card-body">
        <div class="mx-auto col-sm-8">
            <div class="form-row">
                <div class="col">
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
                <div class="col">
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
                    <input type="button" class="btn btn-outline-secondary" value="Buscar">
                    </input>
                </div>

                <div class="col">
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
                <div class="col">
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
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table>
            <?php
            include("conexao.php");
            $sql = "SELECT * FROM `os_preventiva` JOIN equipamento ON fk_equipamento=id WHERE dataProxima < CURRENT_DATE ";
            $resultadoT = mysqli_query($mysqli, $sql);
            $qtd_equipamentos = mysqli_num_rows($resultadoT);
            $row = $resultadoT->fetch_array(MYSQLI_ASSOC);
            ?>
            <tr>
                <th>Date</th>
                <td>12 February</td>
            </tr>
            <tr>
                <th>Event</th>
                <td>Waltz with Strauss</td>
            </tr>
            <tr>
                <th>Venue</th>
                <td>Main Hall</td>
            </tr>
        </table>
    </div>
</div>