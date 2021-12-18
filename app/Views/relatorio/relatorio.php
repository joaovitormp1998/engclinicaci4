<style>
    .container {
        width: 100%;
    }

    h1 {
        background-color: #ccc;
        margin: 0;
        padding: 10px;
        text-align: center;
    }

    p {
        margin: 0;
        text-align: center;
        background-color: #ccc;
        padding-bottom: 10px;
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

<div class="container">
    <h1>Relatório de Os do Equipamento</h1>
    <p><small>Gerado em: <?php echo date("d/m/Y H:i:s") ?></small></p>
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