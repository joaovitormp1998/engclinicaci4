<table>
                    <?php
                    include("conexao.php");
                    $sql = "SELECT e.id AS equipamento_id,
                os.id AS ordem_id,
                DATE_FORMAT(e.data_fabricacao, \"%Y\") AS ano,
                e.nome AS nome,
                e.marca AS marca,
                e.modelo AS modelo,
                e.data_fabricacao AS data_fabricacao,
                e.nome_setor AS nome_setor,
                e.unidade AS unidade,
                e.criticidade AS criticidade,
                os.tecnico AS tecnico,
                os.data_preventiva AS data_realizada,
                os.data_proxima AS data_proxima,
                os.tecnico AS tecnico,
                os.funcionario AS funcionario,
                os.material AS material,
                CONCAT(
                    os.data_entrada,
                    ' ',
                    os.hora_entrada
                ) AS data_entrada,
                CONCAT(os.data_saida,' ', os.hora_saida) AS data_saida ";
                    $sql .= "FROM `ordem-servico` os ";
                    $sql .= "LEFT JOIN `ordem-servico-tipo` ost ON (
                    os.fk_ordem_servico_tipo = ost.id
                ) ";
                    $sql .= "LEFT JOIN vw_equipamento_setor e ON (os.fk_equipamento = e.id )";
                    $sql .= "WHERE DATE_FORMAT(os.data_entrada, \"%Y\") = '2000';";
                    $resultadoT = mysqli_query($mysqli, $sql);
                    $qtd_equipamentos = mysqli_num_rows($resultadoT);
                    $row = $resultadoT->fetch_all(MYSQLI_ASSOC);
                    
                    
                    ?> 
                    
                    <tr><td>Nome : <?= $row[0]['nome'] ?></td></tr>
                        <tr><td>Marca :<?= $row[0]['marca'] ?></td</tr>
                        <tr><td>Modelo :<?= $row[0]['modelo'] ?></td></tr>
                        <tr><td>Data de Fabricação :<?=  date_format(new Datetime($row[0]['data_fabricacao']), 'd/m/Y ');?></td></tr>
                        <tr><td>Setor :<?= $row[0]['nome_setor'] ?></td></tr>
                      
                    </table>/<br>
                    <table> 
                        <tr><td>Ordem Id :<?= $row[1]['ordem_id'] ?></td></tr>
                        <tr><td>Data Realizada :<?= date_format(new Datetime($row[1]['data_realizada']), 'd/m/Y '); ?></td></tr>
                        <tr><td>Data Proxima :<?= date_format(new Datetime($row[1]['data_proxima']), 'd/m/Y '); ?></td></tr>
                        <tr><td>Técnico  :<?= $row['tecnico'] ?></td></tr>
                        <tr><td>Funcionario Solicitante :<?= $row[1]['funcionario'] ?></td></tr>
                        <tr><td>Material Utilizado :<?= $row[1]['material'] ?></td></tr>
                        <tr><td>Data Entrada :<?= date_format(new Datetime($row['data_entrada']), 'd/m/Y  H:i:s '); ?></td></tr>
                        <tr><td>Data Saida :<?= date_format(new Datetime($row['data_saida']), 'd/m/Y  H:i:s ');  ?></td></tr>

                        </table>
                        <br>                       <table>
                        <tr><td>Ordem Id :<?= $row[1]['ordem_id'] ?></td></tr>
                        <tr><td>Data Realizada :<?= date_format(new Datetime($row[1]['data_realizada']), 'd/m/Y '); ?></td></tr>
                        <tr><td>Data Proxima :<?= date_format(new Datetime($row[1]['data_proxima']), 'd/m/Y '); ?></td></tr>
                        <tr><td>Técnico  :<?= $row['tecnico'] ?></td></tr>
                        <tr><td>Funcionario Solicitante :<?= $row[1]['funcionario'] ?></td></tr>
                        <tr><td>Material Utilizado :<?= $row[1]['material'] ?></td></tr>
                        <tr><td>Data Entrada :<?= date_format(new Datetime($row[1]['data_entrada']), 'd/m/Y  H:i:s '); ?></td></tr>
                        <tr><td>Data Saida :<?= date_format(new Datetime($row[1]['data_saida']), 'd/m/Y  H:i:s ');  ?></td></tr>
                        </table>
