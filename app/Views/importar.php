<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Faça aqui seu Upload de arquivos</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Documentos</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->

	<style>
		.l {
			color: #008080;
		}

		.arquivo {
			display: none;
		}

		.btn {
			border: none;
			box-sizing: border-box;
			padding: 2px 10px;
			background-color: #008080;
			color: #FFF;
			height: 32px;
			font-size: 15px;
			vertical-align: middle;
		}
	</style>
	<?php
	include("conexao.php");
	include './config.php';
	$nome_arq = filter_input(INPUT_POST, 'nome_arq', FILTER_SANITIZE_STRING);
	$slug = filter_input(INPUT_POST, 'slug', FILTER_SANITIZE_STRING);
	$url = URL . $slug;
	echo $url;
	if (isset($_FILES['arquivo'])) {
		$arquivo = $_FILES['arquivo'];

		if ($arquivo['error'])
			die("Falha ao Enviar arquivo");

		if ($arquivo['size'] > 5242880)
			die("Arquivo muito Pesado favor inserir menor que 5 Mb");

		$pasta = "assets/arquivos/";
		$nomeDoArquivo = $arquivo['name'];
		$novoNomeDoArquivo = uniqid();
		$extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

		if ($extensao != "jpg" && $extensao != 'png') {
			die("Tipo de arquivo não aceito ! Tipos;jpg,png");
		}
		$path = $pasta . $novoNomeDoArquivo . "." . $extensao;
		$deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
		if ($deu_certo) {
			$mysqli->query("INSERT INTO arquivos (nome, path, nome_arq ) values('$nomeDoArquivo','$path','$nome_arq')") or die($mysqli->error);

			echo "<p>&nbsp;&nbsp;&nbsp;Arquivo enviado com sucesso </p>";
		} else
			echo "Deu falha no Envio";
	}
	$sql_query = $mysqli->query("SELECT * FROM arquivos") or die($mysqli->error);
	?>
	<section class="content">
		<div class="container-fluid">
			<ul class="list-unstyled">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="file" name="arquivo" id="arquivo" class="arquivo">
					<input type="button" class="btn" value="Escolher arquivo">


					<input type="submit" class="btn btn-success" value="Enviar" />
				</form>
			</ul>
			<h2>Lista de Arquivo</h2>
			<table id="tb-estagiario" class="display">
				<thead>
					<th>Nome</th>
					<th>Arquivo</th>
					<th>Data de Envio</th>
				</thead>
				<tbody>
					<?php
					while ($arquivo = $sql_query->fetch_assoc()) {

					?>
						<tr>
							<td><a href="<?php echo $arquivo['path'] ?>"><?php echo $arquivo['nome']; ?></a></td>
							<td><img height="50" src="<?php echo $arquivo['path'] ?>" alt="err"></img></td>

							<td><?php echo date("d/m/Y H:i", strtotime($arquivo['data_upload'])); ?></td>
						</tr>
					<?php
					}

					?>
				</tbody>
			</table>

		</div>
	</section>
	<script>
		$('.btn').on('click', function() {
			$('.arquivo').trigger('click');
		});

		$('.arquivo').on('change', function() {
			var fileName = $(this)[0].files[0].name;
			$('#file').val(fileName);
		});
	</script>


</div>