<?php $c = 0;
foreach ($relatorio as $relatorios) :
        if (count($relatorios['os']) > 0) : ?>
                <h3> <?= $relatorios['nome'] . " QTD OS: " . count($relatorios['os']) ?> </h3>
                <?php foreach ($relatorios['os'] as $os) : ?>
                        <div>
                                <?= $os['nome'] == $relatorios['nome'] ? "OS: " . $os['id'] : "Equipamento: " . $os['nome'] ?><br>
                                Modelo: <?= $os['modelo'] ?><br>
                                Dta Fabricação: <?= date_format(new Datetime($os['data_fabricacao']), 'd/m/Y '); ?><br>
                                <?= $os['nome_setor'] ?><br>
                                <?= $os['nome_tipo_os'] ?><br>
                                <?= date_format(new Datetime($os['data_realizada']), 'd/m/Y '); ?><br>
                                <?= date_format(new Datetime($os['data_proxima']), 'd/m/Y '); ?><br>
                                <?= $os['tecnico'] ?><br>
                                <?= $os['funcionario'] ?><br>
                                <?= date_format(new Datetime($os['data_entrada']), 'd/m/Y  H:i:s '); ?><br>
                                <?= date_format(new Datetime($os['data_saida']), 'd/m/Y  H:i:s ');  ?><br>
                                <?= $os['material'] ?><br>
                                <div>
                                <?php endforeach; ?>

                        <?php endif; ?>
                <?php endforeach; ?>