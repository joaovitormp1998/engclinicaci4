<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Exibindo Dados</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dados</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <style>
    .l {
      color: darkred;
    }
  </style>

  <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
    <div class="card bg-light">
      <div class="card-body pt-0">
        <div class="row">
          <div class="col-7">
            <h2 class="lead"><b></b></h2>
            <p class="text-muted text-sm"><b>Nome: </b> <?php echo ($ordem['nome']); ?> </p>
            <p class="text-muted text-sm"><b>Marca: </b> <?php echo ($ordem['marca']); ?> </p>
            <p class="text-muted text-sm"><b>Modelo: </b> <?php echo ($ordem['modelo']); ?></p>
            <p class="text-muted text-sm"><b>Numero de Série: </b> <?php echo ($ordem['numeroSerie']); ?> </p>
            <p class="text-muted text-sm"><b>Patrimonio: </b> <?php echo ($ordem['patrimonio']); ?> </p>
          </div>
          <div class="col-5 text-center">
            <img src="https://br.qr-code-generator.com/wp-content/themes/qr/new_structure/markets/core_market/generator/dist/generator/assets/images/websiteQRCode_noFrame.png" alt="" class=" img-fluid">
          </div>
          <div class="col-7">
            <p class="text-muted text-sm"><b>Criticidade: </b> <?php echo ($ordem['criticidade']); ?> </p>
            <p class="text-muted text-sm"><b>Tag: </b> <?php echo ($ordem['tag']); ?> </p>
            <p class="text-muted text-sm"><b>Siconv: </b> <?php echo ($ordem['siconv']); ?></p>
            <p class="text-muted text-sm"><b>Localização: </b> <?php echo ($ordem['localizacao']); ?></p>
            <p class="text-muted text-sm"><b>Setor: </b> <?php echo ($ordem['setor']); ?></p>
            <p class="text-muted text-sm"><b>Unidade: </b> <?php echo ($ordem['unidade']); ?></p>
            <p class="text-muted text-sm"><b>Fornecedor: </b> <?php echo ($ordem['fornecedor']); ?></p>
            <p class="text-muted text-sm"><b>Data da Aquisição: </b> <?php echo date_format(new DateTime($ordem['dataAquisicao']), 'd/m/Y '); ?></p>
            <p class="text-muted text-sm"><b>Data da Fabricacão: </b> <?php echo date_format(new DateTime($ordem['dataFabricacao']), 'd/m/Y '); ?></p>
            <p class="text-muted text-sm"><b>Numero da Pasta: </b> <?php echo ($ordem['numeroPasta']); ?></p>
            <p class="text-muted text-sm"><b>Numero do Certifiado: </b> <?php echo ($ordem['numeroCertificado']); ?></p>
            <p class="text-muted text-sm"><b>Periodicidade Preventiva: </b> <?php echo ($ordem['periodicidade']); ?></p>

            </ul>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="text-right">
          <a href="#" class="btn btn-sm btn-success">
            <i class="fas fa-user"></i>O.S Instalação
          </a>
          <a href="#" class="btn btn-sm btn-success">
            <i class="fas fa-user"></i>O.S Preventiva
          </a>
          <a href="#" class="btn btn-sm btn-success">
            <i class="fas fa-user"></i>O.S Corretiva
          </a>
          </a>


        </div>
      </div>
      <div class="card-footer">
        <div class="text-right">
          <a href="#" class="btn btn-sm btn-success">
            <i class="fas fa-user"></i>O.S Instalação
          </a>
          <a href="#" class="btn btn-sm btn-success">
            <i class="fas fa-user"></i>O.S Preventiva
          </a>
          <a href="#" class="btn btn-sm btn-success">
            <i class="fas fa-user"></i>O.S Corretiva
          </a>
          </a>
        </div>
      </div>
    </div>
  </div>

  <?php



  ?>

</div>