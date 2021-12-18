<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Sistema de Controle de Equipamentos</h1>

				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('painel') ?>">Home</a></li>
						<li class="breadcrumb-item active">Painel</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?php
									include("conexao.php");
									$sql = "SELECT * FROM equipamento";
									$resultadoT = mysqli_query($mysqli, $sql);
									$qtd_equipamentos = mysqli_num_rows($resultadoT);
									echo $qtd_equipamentos;
									?>
							</h3>
							<p>Equipamentos</p>
						</div>
						<div class="icon">
							<i class="fas fa-cogs"></i>
						</div>
						<a href="<?= base_url('equipamento') ?>" class="small-box-footer">Mais informaçes<i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="small-box bg-warning">
						<div class="inner">
							<h3><?php
									include("conexao.php");
									$hoje = date('Y:m:d H:i:s');
									$datapreventiva = strtotime($hoje);
									$datafinal = strtotime('+7 day', $datapreventiva);
									$datecerta = date('Y-m-d', $datafinal);
									$sql = "SELECT * FROM `os_preventiva` JOIN equipamento ON fk_equipamento=id WHERE dataProxima = '$datecerta'";
									$resultadoT = mysqli_query($mysqli, $sql);
									$qtd7days = mysqli_num_rows($resultadoT);
									echo $qtd7days;
									?>
							</h3>
							<p>Preventivas</p>
						</div>
						<div class="icon">
							<i class="fas fa-tools"></i>
						</div>
						<a href="<?= base_url('tiposdeordem/ospreventiva') ?>" class="small-box-footer">Mais Informações <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3>
								<?php
								include("conexao.php");
								$sql = "SELECT * FROM `os_preventiva`JOIN equipamento ON fk_equipamento=id WHERE dataProxima < CURRENT_DATE";
								$resultadoT = mysqli_query($mysqli, $sql);
								$qtd_equipamentos = mysqli_num_rows($resultadoT);
								echo $qtd_equipamentos;
								?>
							</h3>

							<p>Atrasadas</p>
						</div>
						<div class="icon">
							<i class="fas fa-radiation"></i>

						</div>
						<a href="<?= base_url('tiposdeordem/ospreventivaa') ?>" class="small-box-footer">Mais Informações<i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>