<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:history.back();">Home</a></li>
                        <li class="breadcrumb-item active">Registro de Ordem</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<div class="card">
    
    <div class="card-body">
        <?php echo form_open('ospreventiva/store') ?>

        <div class="form-group">
            <label for="dataPreventiva">Data Preventiva</label>
            <input type="date" name="dataPreventiva" id="dataPreventiva" class="form-control" required autofocus>
        </div>
        
        <div class="form-group">
            <label for="dataProxima">Data Proxima</label>
            <input type="date" name="dataProxima" id="dataProxima" class="form-control" required autofocus>
        </div>
        
        <div class="form-group">
            <label for="funcionario">Funcionario</label>
            <input type="text" name="funcionario" id="funcionario" class="form-control" required autofocus>
        </div>
        
        <div class="form-group">
            <label for="falha">Falha</label>
            <input type="text" name="falha" id="falha" class="form-control" required autofocus>
        </div>
        
        <div class="form-group">
            <label for="defeito">Defeito</label>
            <input type="text" name="defeito" id="defeito" class="form-control" required autofocus>
        </div>
        <div class="form-group">
            <label for="solucao">Solucao</label>
            <input type="text" name="solucao" id="solucao" class="form-control" required autofocus>
        </div>	
        
        <div class="form-group">
            <label for="causa">Causa</label>
            <input type="text" name="causa" id="causa" class="form-control" required autofocus>
        </div>
        
        <div class="form-group">
            <label for="resolvido">Resolvido</label>
            <input type="text" name="resolvido" id="resolvido" class="form-control" required autofocus>
        </div>
        
        <div class="form-group">
            <label for="agente">Agente</label>
            <input type="text" name="agente" id="agente" class="form-control" required autofocus>
        </div>
        
        <div class="form-group">
            <label for="tecnico">Tecnico</label>
            <input type="text" name="tecnico" id="tecnico" class="form-control" required autofocus>
        </div>
        <div class="form-group">
            <label for="dataEntrada">Data Entrada</label>
            <input type="date" name="dataEntrada" id="dataEntrada" class="form-control" required autofocus>
        </div>
        <div class="form-group">
            <label for="horaEntrada">Hora Entrada</label>
            <input type="time" name="horaEntrada" id="horaEntrada" class="form-control" required autofocus>
        </div>
        
        <div class="form-group">
            <label for="dataSaida">Data Saida</label>
            <input type="date" name="dataSaida" id="dataSaida" class="form-control" required autofocus>
        </div>
        <div class="form-group">
            <label for="horaSaida">Hora Saida</label>
            <input type="time" name="horaSaida" id="horaSaida" class="form-control" required autofocus>
        </div>
        
        <div class="form-group">
            <label for="material">Material</label>
            <input type="text" name="material" id="material" class="form-control" required autofocus>
        </div>
        <div>
        <label for="imagem">Foto da OS assinada</label>
        <input type="file" name="imagem" id="imagem"></input>
        </div>
        <input type="hidden" name="fk_equipamento" value="<?php echo $fk_equipamento ?>"></input>
        <input type="submit" class="btn btn-primary" value="Salvar"></input>
        <?php echo form_close() ?>
    </div>
</div>