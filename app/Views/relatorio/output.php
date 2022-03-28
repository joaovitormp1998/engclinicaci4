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
