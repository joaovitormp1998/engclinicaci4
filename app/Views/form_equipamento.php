<style>
    .l {
      color: darkred;
    }

    ul {
      list-style: none;
    }
  </style>

<script>
    function confirma() {
        if (!confirm("Deseja excluir esta ordem?")) {
            return false;
        }

        return true;
    }
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/equipamento">Equipamento</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

<div class="card">
    <div class="card-body">
        <?php echo form_open('equipamento/store') ?>

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['nome'] : '' ?>" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['marca'] : '' ?>" name="marca" id="marca" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['modelo'] : '' ?>" name="modelo" id="modelo" class="form-control" >
        </div>
        
        <div class="form-group">
            <label for="numeroSerie">Nº de Serie</label>
            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['numeroSerie'] : '' ?>" name="numeroSerie" id="numeroSerie" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="patrimonio">Patrimonio:</label>
            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['patrimonio'] : '' ?>" name="patrimonio" id="patrimonio" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="criticidade">Criticidade</label>
            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['criticidade'] : '' ?>" name="criticidade" id="criticidade" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="tag">Tag:</label>
            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['tag'] : '' ?>" name="tag" id="tag" class="form-control" >
        </div>

        <div class="form-group">
            <label for="siconv">Siconv:</label>
            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['siconv'] : '' ?>" name="siconv" id="siconv" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="localizacao">Localização:</label>
            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['localizacao'] : '' ?>" name="localizacao" id="localizacao" class="form-control" >
        </div>

        <div class="form-group">
            <label for="setor">Setor:</label>
            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['setor'] : '' ?>" name="setor" id="setor" class="form-control">
        </div>

        <div class="form-group">
            <label for="unidade">Unidade</label>
            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['unidade'] : '' ?>" name="unidade" id="unidade" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="fornecedor">Fornecedor</label>
            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['fornecedor'] : '' ?>" name="fornecedor" id="fornecedor" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="dataAquisicao">Data de Aquisição</label>
            <input type="date" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['dataAquisicao'] : '' ?>" name="dataAquisicao" id="dataAquisicao" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="dataFabricacao">dataFabricacao</label>
            <input type="date" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['dataFabricacao'] : '' ?>" name="dataFabricacao" id="dataFabricacao" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="numeroPasta">Numero da Pasta:</label>
            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['numeroPasta'] : '' ?>" name="numeroPasta" id="numeroPasta" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="numeroCertificado">Numero Certificado:</label>
            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['numeroCertificado'] : '' ?>" name="numeroCertificado" id="numeroCertificado" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="periodicidade">Periodicidade :</label>
            <input type="text" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['periodicidade'] : '' ?>" name="periodicidade" id="periodicidade" class="form-control" required>
        </div>


        <input type="submit" class="btn btn-primary" value="Salvar">

        <input type="hidden" name="id" value="<?php echo isset($dadosEquipamento) ? $dadosEquipamento['id'] : '' ?>">

        <?php echo form_close() ?>
    </div>
</div>
</div>  