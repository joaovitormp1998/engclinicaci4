<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->



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
                        <th>Id:</th>
                        <th>Nome:</th>
                        <th>Data Preventiva:</th>
                        <th>Data Proxima:</th>

                    </tr>
                </thead>
                <tbody>
                    <h3><?php
                        include("conexao.php");
                        $sql = "SELECT * FROM `os_preventiva`
                        JOIN equipamento ON fk_equipamento=id
                        WHERE `dataProxima`='2021-12-07'";
                        $resultadoT = mysqli_query($mysqli, $sql);
                        $qtd_equipamentos = mysqli_num_rows($resultadoT);
                        $row = $resultadoT->fetch_array(MYSQLI_ASSOC);

                        ?>
                        <?php foreach ($resultadoT as $equipamento) : ?>
                            <tr>
                                <td><?= $row['id'];  ?></td>
                                <td><?= $row['nome']; ?></td>
                                <td><?= $equipamento['dataPreventiva'] ?></td>
                                <td><?= $equipamento['dataProxima'] ?></td>


                            </tr>
                        <?php endforeach; ?>
                    </h3>
                </tbody>
            </table>
        </div>
    </section>


</div>
</div>