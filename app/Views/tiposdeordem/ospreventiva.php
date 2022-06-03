<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-warning" align="right">Ordens Preventivas Proximas </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>



    <section class="content">
        <div class="container-fluid">
            <script>
                function confirma() {
                    if (!confirm("Deseja excluir este registros?")) {
                        return false;
                    }
                    return true;
                }
            </script>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Equipamento</th>
                        <th>Nome</th>
                        <th>Data Preventiva</th>
                        <th>Data Proxima</th>

                    </tr>
                </thead>
                <tbody>


                    <?php
                    include("conexao.php");
                    $hoje = date('Y:m:d H:i:s');
                    $datapreventiva = strtotime($hoje);
                    $datafinal = strtotime('+7 day', $datapreventiva);
                    $datecerta = date('Y-m-d', $datafinal);
                    $sql = "SELECT * FROM `ordem-servico` as os JOIN `equipamento`as eq ON os.fk_equipamento = eq.id
                    WHERE  fk_ordem_servico_tipo=1 and data_proxima = '$datecerta'";
                    $resultadoT = mysqli_query($mysqli, $sql);
                    $row = $resultadoT->fetch_array(MYSQLI_ASSOC);

                    ?>


                    <?php

                    if (empty($row)) {
                        echo   '
                        <td colspan="6" class="text-center">
                                 Nenhuma ordem encontrada!
                         </td>
                                ';
                    } ?>
                    <?php foreach ($resultadoT as $equipamento) : ?>

                        <tr>
                            <td><?= $row['id'];  ?></td>
                            <td><a href="<?= base_url($_base . 'equipamento/ordem/' . $equipamento['eq.id']) ?>"><?= $equipamento['nome']; ?></a></td>
                            <td><?= date_format(new Datetime($equipamento['data_preventiva']), 'd/m/Y '); ?></td>
                            <td><?= date_format(new Datetime($equipamento['data_proxima']), 'd/m/Y '); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <br>
                </tbody>
            </table>
        </div>
    </section>


</div>
</div>