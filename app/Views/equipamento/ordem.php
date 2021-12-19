  <style>
    .l {
      color: darkred;
    }

    ul {
      list-style: none;
    }

    .btn-ligth {
      color: green;
      text-decoration: none
    }

    .btn-excluir:link {
      color: red;
      text-decoration: none
    }

    .modal-header {
      background-color: #008080;

    }

    .modal-title {
      text-align: center;
      color: whitesmoke
    }

    .btn-success {
      width: 142px;
    }

    .close {
      color: whitesmoke;
      text-decoration: none
    }

    .modal-content {
      border-color: #008080;
    }

    .grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
    }

    .grid-template-rows-1 {
      grid-template-rows: 38px 38px 40px 10px;
    }

    .card-body1 {
      display: none;
    }
  </style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Exibindo Dados do Equipamento</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/equipamento">Equipamento</a></li>
              <li class="breadcrumb-item active">Ordem</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <script>
      function confirma() {
        if (!confirm("Deseja excluir este registros?")) {
          return false;

        }
        return true;
      }

      function display1(){
        return document.getElementById("card-body1").style.display = "block";
      }
      
      function displayFalse1(){
        return document.getElementById("card-body1").style.display = "none";
      }
      function display2(){
        return document.getElementById("card-body2").style.display = "block";
      }
      function displayFalse2(){
        return document.getElementById("card-body2").style.display = "none";
      }
      function display3(){
        return document.getElementById("card-body3").style.display = "block";
      }
      function displayFalse3(){
        return document.getElementById("card-body3").style.display = "none";
      }
      function display4(){
        return document.getElementById("card-body4").style.display = "block";
      }
      function displayFalse4(){
        return document.getElementById("card-body4").style.display = "none";
      }
      function display5(){
        return document.getElementById("card-body5").style.display = "block";
      }
      function displayFalse5(){
        return document.getElementById("card-body5").style.display = "none";
      }
      function display6(){
        return document.getElementById("card-body6").style.display = "block";
      }
      function displayFalse6(){
        return document.getElementById("card-body6").style.display = "none";
      }
    </script>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="card bg-light">
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-7">
                    <h2 class="lead"><b></b></h2>
                    <p class="text-muted text-sm"><b>Nome: </b> <?php echo ($dadosEquipamento['nome']); ?> </p>
                    <p class="text-muted text-sm"><b>Marca: </b> <?php echo ($dadosEquipamento['marca']); ?> </p>
                    <p class="text-muted text-sm"><b>Modelo: </b> <?php echo ($dadosEquipamento['modelo']); ?></p>
                    <p class="text-muted text-sm"><b>Numero de Série: </b> <?php echo ($dadosEquipamento['numeroSerie']); ?> </p>
                    <p class="text-muted text-sm"><b>Patrimonio: </b> <?php echo ($dadosEquipamento['patrimonio']); ?> </p>
                  </div>
                  <div class="col-5 text-center">
                    <img src="https://br.qr-code-generator.com/wp-content/themes/qr/new_structure/markets/core_market/generator/dist/generator/assets/images/websiteQRCode_noFrame.png" alt="" class=" img-fluid">
                  </div>
                  <div class="col-7">
                    <p class="text-muted text-sm"><b>Criticidade: </b> <?php echo ($dadosEquipamento['criticidade']); ?> </p>
                    <p class="text-muted text-sm"><b>Tag: </b> <?php echo ($dadosEquipamento['tag']); ?> </p>
                    <p class="text-muted text-sm"><b>Siconv: </b> <?php echo ($dadosEquipamento['siconv']); ?></p>
                    <p class="text-muted text-sm"><b>Localização: </b> <?php echo ($dadosEquipamento['localizacao']); ?></p>
                    <p class="text-muted text-sm"><b>Setor: </b> <?php echo ($dadosEquipamento['setor']); ?></p>
                    <p class="text-muted text-sm"><b>Unidade: </b> <?php echo ($dadosEquipamento['unidade']); ?></p>
                    <p class="text-muted text-sm"><b>Fornecedor: </b> <?php echo ($dadosEquipamento['fornecedor']); ?></p>
                    <p class="text-muted text-sm"><b>Data da Aquisição: </b> <?php echo date_format(new DateTime($dadosEquipamento['dataAquisicao']), 'd/m/Y '); ?></p>
                    <p class="text-muted text-sm"><b>Data da Fabricacão: </b> <?php echo date_format(new DateTime($dadosEquipamento['dataFabricacao']), 'd/m/Y '); ?></p>
                    <p class="text-muted text-sm"><b>Numero da Pasta: </b> <?php echo ($dadosEquipamento['numeroPasta']); ?></p>
                    <p class="text-muted text-sm"><b>Numero do Certifiado: </b> <?php echo ($dadosEquipamento['numeroCertificado']); ?></p>
                    <p class="text-muted text-sm"><b>Periodicidade Preventiva: </b> <?php echo ($dadosEquipamento['periodicidade']); ?></p>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-left">
                  <?php $mensagem = session()->getFlashdata('mensagem_telefone'); ?>
                  <?php if (!empty($mensagem)) : ?>
                    <div class="alert alert-success"><?php echo $mensagem ?></div>
                  <?php endif; ?>
                  <?php if (isset($dadosEquipamento['id'])) : ?>

                  <?php else : ?>
                    <a href="javascript:;" class="btn btn-sm btn-success" disabled> <i class="fas fa-user"></i>O.S Preventiva</a>
                  <?php endif; ?>
                  <?php if (isset($dadosEquipamento['id'])) : ?>
                    <?php if (count($ospreventivasEquipamento) > 0) : ?>
                      <section class="grid grid-template-rows-1" id="botoesdeos">
                        <div class="item"><a href="<?php echo base_url("tiposdeordem/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroPreventiva"> <i class="fas fa-user"></i>O.S Preventiva</a></div>
                        <div class="item"><a href="<?php echo base_url("tiposdeordem/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success"> <i class="fas fa-user"></i>O.S Instalação</a></div>

                        <div class="item"><a href="<?php echo base_url("tiposdeordem/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroPreventiva"> <i class="fas fa-user"></i>O.S Treinamento</a></div>
                        <div class="item"><a href="<?php echo base_url("tiposdeordem/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success"> <i class="fas fa-user"></i>O.S Corretiva</a></div>

                        <div class="item"><a href="<?php echo base_url("tiposdeordem/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroPreventiva"> <i class="fas fa-user"></i>O.S Inspeção</a></div>
                        <div class="item"><a href="<?php echo base_url("tiposdeordem/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success"> <i class="fas fa-user"></i>O.S Calibração</a></div>
                      </section>
                    <?php else : ?>
                      <p class="text-danger">Equipamento sem Ordem de Serviço Cadastrada. Deseja Adicionar?</p>
                      <section class="grid grid-template-rows-1" id="botoesdeos">
                        <div class="item"><a href="<?php echo base_url("tiposdeordem/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroPreventiva"> <i class="fas fa-user"></i>O.S Preventiva</a></div>
                        <div class="item"><a href="<?php echo base_url("tiposdeordem/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success"> <i class="fas fa-user"></i>O.S Instalação</a></div>

                        <div class="item"><a href="<?php echo base_url("tiposdeordem/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroPreventiva"> <i class="fas fa-user"></i>O.S Treinamento</a></div>
                        <div class="item"><a href="<?php echo base_url("tiposdeordem/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success"> <i class="fas fa-user"></i>O.S Corretiva</a></div>

                        <div class="item"><a href="<?php echo base_url("tiposdeordem/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroPreventiva"> <i class="fas fa-user"></i>O.S Inspeção</a></div>
                        <div class="item"><a href="<?php echo base_url("tiposdeordem/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success"> <i class="fas fa-user"></i>O.S Calibração</a></div>
                      </section>
                    <?php endif; ?>
                  <?php else : ?>
                    <p><small>Salve o cliente antes de inserir um telefone</small></p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Historico O.S Preventiva</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" onclick="return display1();"><i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool"  onclick="return displayFalse1();"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body1" id="card-body1">
                <div>
                  <table class="table table-strip">
                    <thead>

                      <tr>
                        <th>Data Preventiva</th>

                        <th colspan="2">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($ospreventivasEquipamento as $ospreventivaEquipamento) : ?>
                        <th><?php echo  date_format(new DateTime($ospreventivaEquipamento['dataPreventiva']), 'd/m/Y '); ?></th>
                        <th><a href="<?php echo base_url("tiposdeordem/delete/{$ospreventivaEquipamento['idOs']}/{$dadosEquipamento['id']}") ?>" onclick="return confirma()" class="btn-excluir" title="Excluir Resgistro de OS"><i class="far fa-trash-alt"></i></a> <button type="button" class="btn btn-ligth" data-toggle="modal" data-target="#modalExemplo">
                            <i class="fas fa-eye"></i>
                          </button></th>
                    </tbody>
                  <?php endforeach; ?>
                  </table>
                </div>
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-md-4 ">
            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Historico O.S Corretiva</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" onclick="return display2();"><i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" onclick="return displayFalse2();"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body1" id="card-body2">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Historico O.S Instalação</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" onclick="return display3();"><i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" onclick="return displayFalse3();"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body1" id="card-body3">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Historico O.S Inspeção</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" onclick="return display4();"><i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" onclick="return displayFalse4();"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body1" id="card-body4">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Historico O.S Treinamento</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" onclick="return display5();"><i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" onclick="return displayFalse5();"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body1" id="card-body5">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Historico O.S Calibração </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" onclick="return display6();"><i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-tool"onclick="return displayFalse6();"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body1" id="card-body6">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="modalCadastroPreventiva" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Cadastro de Ordem de Serviço</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="formCadastroEquipamento" action="<?= base_url('tiposdeordem/store') ?>" method="post">
              <input id="uid" type="hidden" name="uid" value="">

              </hr>
              <div class="row">
                <div class="form-group col-6 col-sm-6">
                  <label for="dataPreventiva">Data Preventiva:</label>
                  <input type="date" class="form-control form-control-sm" id="dataPreventiva" name="dataPreventiva" required>
                </div>
                <div class="form-group col-8 col-sm-6">
                  <label for="dataProxima">Data Proxima Manutenção:</label>
                  <input type="date" class="form-control form-control-sm" id="dataProxima" name="dataProxima" required>
                </div>
                <div class="form-group col-8 col-sm-6">
                  <label for="funcionario">Funcionario Solicitante:</label>
                  <input type="text" class="form-control form-control-sm" id="funcionario" placeholder="Funcionario Solicitante" name="funcionario">
                </div>
                <div class="form-group col-8 col-sm-6">
                  <label for="falha">Falha Apresentada:</label>
                  <input type="text" class="form-control form-control-sm" id="falha" placeholder="falha Apresentada" name="falha">
                </div>
                <div class="form-group col-8 col-sm-6">
                  <label for="defeito">descricao do defeito:</label>
                  <input type="text" class="form-control form-control-sm" id="defeito" placeholder="defeito" name="defeito">
                </div>
                <div class="form-group col-8 col-sm-6">
                  <label for="solucao">descricao da Solução:</label>
                  <input type="text" class="form-control form-control-sm" id="solucao" placeholder="Solução" name="solucao">
                </div>
                <div class="form-group col-8 col-sm-6">
                  <label for="causa">Causa do defeito:</label>
                  <input type="text" class="form-control form-control-sm" id="causa" placeholder="Causa" name="causa">
                </div>
                <div class="form-group col-8 col-sm-6">
                  <label for="resolvido">Problema Resolvido:</label>
                  <input type="text" class="form-control form-control-sm" id="resolvido" placeholder="sim ou nao" name="resolvido">
                </div>
                <div class="form-group col-8 col-sm-6">
                  <label for="agente">Agente:</label>
                  <input type="text" class="form-control form-control-sm" id="agente" placeholder="Agente" name="agente">
                </div>
                <div class="form-group col-8 col-sm-6">
                  <label for="tecnico">Tecnico:</label>
                  <input type="text" class="form-control form-control-sm" id="tecnico" placeholder="Tecnico" name="tecnico">
                </div>
                <div class="form-group col-8 col-sm-6">
                  <label for="dataEntrada">Data Entrada:</label>
                  <input type="date" class="form-control form-control-sm" id="dataEntrada" name="dataEntrada">
                </div>
                <div class="form-group col-8 col-sm-6">
                  <label for="horaEntrada">Hora Entrada:</label>
                  <input type="time" class="form-control form-control-sm" id="horaEntrada" placeholder="Hora de entrada" name="horaEntrada">
                </div>
                <div class="form-group col-8 col-sm-6">
                  <label for="dataSaida">Data Saida:</label>
                  <input type="date" class="form-control form-control-sm" id="dataSaida" placeholder="Data Saida" name="dataSaida">
                </div>
                <div class="form-group col-8 col-sm-6">
                  <label for="horaSaida">Hora Saida:</label>
                  <input type="time" class="form-control form-control-sm" id="horaSaida" placeholder="Hora Saida" name="horaSaida">
                </div>
                <div class="form-group col-8 col-sm-6">
                  <label for="material">Material utilizado:</label>
                  <input type="text" class="form-control form-control-sm" id="material" placeholder="Material" name="material">
                </div>

                <div>
                  <label for="imagem">Foto da OS assinada</label>
                  <input type="file" name="imagem" id="imagem"></input>
                </div>

              </div>
              <div class="modal-footer">
                <input type="hidden" name="fk_equipamento" value="<?php echo $fk_equipamento = $dadosEquipamento['id'] ?>"></input>
                <input type="submit" class="btn btn-primary" value="Salvar"></input>

              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <?php foreach ($ospreventivasEquipamento as $os) : ?>

              <h5 class="modal-title" id="exampleModalLabel">Dados da O.S</h5>
              <button typte="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col md-8">
                <p class="text-muted text-sm"><b>Data Preventiva: </b> <?php echo date_format(new DateTime($os['dataPreventiva']), 'd/m/Y '); ?> </p>
                <p class="text-muted text-sm"><b>Data Proxima : </b> <?php echo date_format(new DateTime($os['dataProxima']), 'd/m/Y '); ?></p>
                <p class="text-muted text-sm"><b>Técnico Responsável: </b><?php echo $os['tecnico']; ?></p>
                <p class="text-muted text-sm"><b>Data Entrada: </b> <?php echo date_format(new DateTime($os['dataEntrada']), 'd/m/Y '); ?></p>
                <p class="text-muted text-sm"><b>Hora Entrada : </b> <?php echo $os['horaEntrada']; ?></p>
                <p class="text-muted text-sm"><b>Data Saida: </b> <?php echo date_format(new DateTime($os['dataSaida']), 'd/m/Y '); ?></p>
                <p class="text-muted text-sm"><b>Hora Saida : </b> <?php echo $os['horaSaida']; ?></p>
              </div>
              <div class="col md-4">
                <label>Foto da OS</label>
                <img src="<?= base_url('assets/img/ospadrao.jpeg') ?>" width="150px" height="150px"></img>
              </div>
            </div>
          <?php endforeach; ?>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary">Salvar mudanças</button>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>