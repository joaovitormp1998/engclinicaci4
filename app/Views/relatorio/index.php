<?php
use Dompdf\Dompdf;

        if (isset($getDados['tipo_impressao'])) {
            $view = view('relatorio/output', $dados);
            if ($getDados['tipo_impressao'] === 'pdf') {
                $nomeArquivo = 'relatorio - ' . date('d-m-Y-H-i-s') . '.pdf';
                $dompdf = new Dompdf();
                $dompdf->loadHtml($view);
                $dompdf->render();
                $dompdf->stream($nomeArquivo, ['Attachment' => true]);
            }
          else {
            echo view('', $dados);
        }

?>
<script type="text/javascript">
    $(document).ready(function() {

        $(".reset").click(function() {
            $('#formBusca').find("input[type=text]").val('');
        });

        $('#dataInicial').datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: 'linked',
            language: 'pt-BR',
            autoclose: true
        });
        $('#dataFinal').datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: 'linked',
            language: 'pt-BR',
            autoclose: true
        });
    });
</script>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?php echo anchor('', "Home") ?></li>
        <li class="breadcrumb-item active" aria-current="pag">Relatório</li>
    </ol>
</nav>
<h1>Relatório</h1>
<div class="card">
    <div class="card-header">
        Relatório
    </div>
    <div class="card-body">
        <div class="mx-auto col-sm-8">
            <div class="form-row">
                <div class="col">
                    <label for="id">Id</label>
                    <input type="text" name="id" id="id" class="form-control" value="<?php echo !empty($descricao) ? $descricao : '' ?>">
                </div>
                <div class="col">
                    <label for="categorias_id">Setor</label>
                    <input type="text" name="dataInicial" id="dataInicial" class="form-control" value="<?php echo !empty($dataInicial) ? $dataInicial : '' ?>">
            
                </div>
                <div class="col">
                    <label for="tipo">Tipo</label>
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="col">
                    <label for="dataInicial">Data Inicial</label>
                    <input type="text" name="dataInicial" id="dataInicial" class="form-control" value="<?php echo !empty($dataInicial) ? $dataInicial : '' ?>">
                </div>
                <div class="col">
                    <label for="dataFinal">Data Final</label>
                    <input type="text" name="dataFinal" id="dataFinal" class="form-control" value="<?php echo !empty($dataFinal) ? $dataFinal : '' ?>">
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="custom-control custom-radio">
                    <input type="radio" id="pdf" name="tipo_impressao" class="custom-control-input" value="pdf">
                    <label class="custom-control-label text-default" for="pdf">Gerar PDF</label>
                </div>
                <div class="custom-control custom-radio ">
                    <input type="radio" id="csv" name="tipo_impressao" class="custom-control-input" value="csv">
                    <label class="custom-control-label text-default" for="csv">Gerar CSV</label>
                </div>
            </div>
            <div class="form-row mt-3 d-flex justify-content-end">
                <input type="button" value="Limpar Campos" class="btn btn-secondary btn-sm reset">
            </div>
            <div class="form-row mt-3">
                <div class="col text-center">
                </div>
            </div>
        </div>
</div>