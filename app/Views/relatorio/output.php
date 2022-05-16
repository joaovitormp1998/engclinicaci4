<div class="container">
        <div class="info">
                <span class="titulo">Relatório</span>
        </div>
        <?php $c = 0;
        foreach ($relatorio as $relatorios) :
                if (count($relatorios['os']) > 0) : ?>
                        <h3> <b><?= $relatorios['nome'] . " Quantidade OS: " . count($relatorios['os']) ?> </b></h3>
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
</div>
<style>
        .container {
                padding: 10% 10% 10% 10%;
                border: solid;
                margin-top: 0px;

        }

        .info {
                border: solid;
                background-color: black;
                color: #fff;
                padding-top: 5%;
                padding-bottom: 5%;

        }

        .titulo {
                font-size: 40px;
                margin-left: 37%;
                margin-bottom: 10%;
                margin-top: 10%;


        }

        .quantidade {
                background-color: blue;
                color: white;
        }
</style>