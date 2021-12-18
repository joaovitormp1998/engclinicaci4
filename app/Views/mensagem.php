
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edição de Equipamento</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/equipamento">Equipamento</a></li>
                        <li class="breadcrumb-item active">Edição de Equipamento</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<div class="card">
    <div class="card-header">
        Atenção!
    </div>
    <div class="card-body">
        <div class="alert alert-<?php echo $mensagem['tipo'] ?>">
            <?php echo $mensagem['mensagem'] ?>
        </div>
        <p><?php echo anchor('/', 'Página Inicial') ?></p>
    </div>
</div>
</div>