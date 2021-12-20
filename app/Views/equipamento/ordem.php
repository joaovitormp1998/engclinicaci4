<?php
include './config.php';
include("conexao.php");

?>
<!-- Inicio de estilo de alguns componentes -->
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
    width: 144px;
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
  <!-- Inicio Script de card fechado ou aberto -->
  <script>
    function confirma() {
      if (!confirm("Deseja excluir este registros?")) {
        return false;

      }
      return true;
    }

    function display1() {
      return document.getElementById("card-body1").style.display = "block";
    }

    function displayFalse1() {
      return document.getElementById("card-body1").style.display = "none";
    }

    function display2() {
      return document.getElementById("card-body2").style.display = "block";
    }

    function displayFalse2() {
      return document.getElementById("card-body2").style.display = "none";
    }

    function display3() {
      return document.getElementById("card-body3").style.display = "block";
    }

    function displayFalse3() {
      return document.getElementById("card-body3").style.display = "none";
    }

    function display4() {
      return document.getElementById("card-body4").style.display = "block";
    }

    function displayFalse4() {
      return document.getElementById("card-body4").style.display = "none";
    }

    function display5() {
      return document.getElementById("card-body5").style.display = "block";
    }

    function displayFalse5() {
      return document.getElementById("card-body5").style.display = "none";
    }

    function display6() {
      return document.getElementById("card-body6").style.display = "block";
    }

    function displayFalse6() {
      return document.getElementById("card-body6").style.display = "none";
    }
  </script>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- Apresentação dados do equipamento -->
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
                  <?php echo "<img src='" . URL . "imgqrcode/" .  $dadosEquipamento['id'] . ".svg' width='100'><br><hr>"; ?>
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
                  <?php if (count($ospreventivasEquipamento) > 0 || count($ostreinamentosEquipamento) > 0 || count($osinstalacoesEquipamento) > 0 || count($oscorretivasEquipamento) > 0 || count($oscalibracoesEquipamento) > 0 || count($osinspecoesEquipamento) > 0) : ?>
                    <section class="grid grid-template-rows-1" id="botoesdeos">
                      <div class="item"><a href="<?php echo base_url("ospreventiva/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroPreventiva"> <i class="fas fa-user"></i> O.S Preventiva</a></div>
                      <div class="item"><a href="<?php echo base_url("osinstalacao/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroInstalacao"> <i class="fas fa-user"></i> O.S Instalação</a></div>

                      <div class="item"><a href="<?php echo base_url("ostreinamento/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroTreinamento"> <i class="fas fa-user"></i> O.S Treinamento</a></div>
                      <div class="item"><a href="<?php echo base_url("oscorretiva/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroCorretiva"> <i class="fas fa-user"></i> O.S Corretiva</a></div>

                      <div class="item"><a href="<?php echo base_url("osinspecao/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroInspecao"> <i class="fas fa-user"></i> O.S Inspeção</a></div>
                      <div class="item"><a href="<?php echo base_url("oscalibracao/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroCalibracao"> <i class="fas fa-user"></i> O.S Calibração</a></div>
                    </section>
                  <?php else : ?>
                    <p class="text-danger">Equipamento sem Ordem de Serviço Cadastrada. Deseja Adicionar?</p>
                    <section class="grid grid-template-rows-1" id="botoesdeos">
                      <div class="item"><a href="<?php echo base_url("ospreventiva/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroPreventiva"> <i class="fas fa-user"></i> O.S Preventiva</a></div>
                      <div class="item"><a href="<?php echo base_url("osinstalacao/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroInstalacao"><i class="fas fa-user"></i> O.S Instalação</a></div>

                      <div class="item"><a href="<?php echo base_url("ostreinamento/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroTreinamento"> <i class="fas fa-user"></i> O.S Treinamento</a></div>
                      <div class="item"><a href="<?php echo base_url("oscorretiva/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroCorretiva"><i class="fas fa-user"></i> O.S Corretiva</a></div>

                      <div class="item"><a href="<?php echo base_url("osinspecao/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroInspecao"> <i class="fas fa-user"></i> O.S Inspeção</a></div>
                      <div class="item"><a href="<?php echo base_url("oscalibracao/create/{$dadosEquipamento['id']}") ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCadastroCalibracao"> <i class="fas fa-user"></i> O.S Calibração</a></div>
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
          <!-- Inicio card Preventiva -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Historico O.S Preventiva</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" onclick="return display1();"><i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn btn-tool" onclick="return displayFalse1();"><i class="fas fa-minus"></i></button>
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
                      <th><a href="<?php echo base_url("tiposdeordem/delete/{$ospreventivaEquipamento['idOs']}/{$dadosEquipamento['id']}") ?>" onclick="return confirma()" class="btn-excluir" title="Excluir Resgistro de OS"><i class="far fa-trash-alt"></i></a>
                        <button type="button" class="btn btn-ligth" data-toggle="modal" data-target="#modalExemplo">
                          <i class="fas fa-eye"></i>
                        </button>
                      </th>
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
          <!-- Inicio card corretiva -->
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
              <div>
                <table class="table table-strip">
                  <thead>
                    <tr>
                      <th>Data Cadastro</th>
                      <th colspan="2">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($oscorretivasEquipamento as $oscorretivaEquipamento) : ?>
                      <th><?php echo  date_format(new DateTime($oscorretivaEquipamento['dataEntrada']), 'd/m/Y '); ?></th>
                      <th><a href="<?php echo base_url("oscorretiva/delete/{$oscorretivaEquipamento['idOs']}/{$dadosEquipamento['id']}") ?>" onclick="return confirma()" class="btn-excluir" title="Excluir Resgistro de OS"><i class="far fa-trash-alt"></i></a>
                        <button type="button" class="btn btn-ligth" data-toggle="modal" data-target="#modalExemplo3">
                          <i class="fas fa-eye"></i>
                        </button>
                      </th>
                  </tbody>
                <?php endforeach; ?>
                </table>
              </div>
              <div class="chart">
                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
          <!-- Inicio card Instalação -->
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
              <div>
                <table class="table table-strip">
                  <thead>
                    <tr>
                      <th>Data de Cadastro</th>
                      <th colspan="2">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($osinstalacoesEquipamento as $osinstalacaoEquipamento) : ?>
                      <th><?php echo  date_format(new DateTime($osinstalacaoEquipamento['dataEntrada']), 'd/m/Y '); ?></th>
                      <th><a href="<?php echo base_url("osinstalacao/delete/{$osinstalacaoEquipamento['idOs']}/{$dadosEquipamento['id']}") ?>" onclick="return confirma()" class="btn-excluir" title="Excluir Resgistro de OS"><i class="far fa-trash-alt"></i></a>
                        <button type="button" class="btn btn-ligth" data-toggle="modal" data-target="#modalExemplo2">
                          <i class="fas fa-eye"></i>
                        </button>
                      </th>
                  </tbody>
                <?php endforeach; ?>
                </table>
              </div>
              <div class="chart">
                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
          <!-- Inicio card Inspeção -->
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
              <div>
                <table class="table table-strip">
                  <thead>
                    <tr>
                      <th>Data de Cadastro</th>
                      <th colspan="2">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($osinspecoesEquipamento as $osinspecaoEquipamento) : ?>
                      <th><?php echo  date_format(new DateTime($osinspecaoEquipamento['dataEntrada']), 'd/m/Y '); ?></th>
                      <th><a href="<?php echo base_url("osinspecao/delete/{$osinspecaoEquipamento['idOs']}/{$dadosEquipamento['id']}") ?>" onclick="return confirma()" class="btn-excluir" title="Excluir Registro de OS"><i class="far fa-trash-alt"></i></a>
                        <button type="button" class="btn btn-ligth" data-toggle="modal" data-target="#modalExemplo6" title="Visualizar Registro de OS">
                          <i class="fas fa-eye"></i>
                        </button>
                      </th>
                  </tbody>
                <?php endforeach; ?>
                </table>
              </div>
              <div class="chart">
                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>

          </div>
          <!-- Inicio card Treinamento -->
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
              <div>
                <table class="table table-strip">
                  <thead>
                    <tr>
                      <th>Data de Cadastro</th>
                      <th colspan="2">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ostreinamentosEquipamento as $ostreinamentoEquipamento) : ?>
                      <th><?php echo  date_format(new DateTime($ostreinamentoEquipamento['dataEntrada']), 'd/m/Y '); ?></th>
                      <th><a href="<?php echo base_url("ostreinamento/delete/{$ostreinamentoEquipamento['idOs']}/{$dadosEquipamento['id']}") ?>" onclick="return confirma()" class="btn-excluir" title="Excluir Resgistro de OS"><i class="far fa-trash-alt"></i></a>
                        <button type="button" class="btn btn-ligth" data-toggle="modal" data-target="#modalExemplo5">
                          <i class="fas fa-eye"></i>
                        </button>
                      </th>
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
          <!-- Inicio card Calibração -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Historico O.S Calibração </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" onclick="return display6();"><i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn btn-tool" onclick="return displayFalse6();"><i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body1" id="card-body6">
              <div>
                <table class="table table-strip">
                  <thead>
                    <tr>
                      <th>Data de Cadastro</th>
                      <th colspan="2">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($oscalibracoesEquipamento as $oscalibracaoEquipamento) : ?>
                      <th><?php echo  date_format(new DateTime($oscalibracaoEquipamento['dataEntrada']), 'd/m/Y '); ?></th>
                      <th><a href="<?php echo base_url("oscalibracao/delete/{$oscalibracaoEquipamento['idOs']}/{$dadosEquipamento['id']}") ?>" onclick="return confirma()" class="btn-excluir" title="Excluir Registro de OS"><i class="far fa-trash-alt"></i></a>
                        <button type="button" class="btn btn-ligth" data-toggle="modal" data-target="#modalExemplo4" title="Visualizar Registro de OS">
                          <i class="fas fa-eye"></i>
                        </button>
                      </th>
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
      </div>
    </div>
  </section>
  <!--Inicio modal de os preventiva-->
  <div class="modal fade" id="modalCadastroPreventiva" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cadastro de Ordem de serviço Preventiva</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formCadastroEquipamento" action="<?= base_url('ospreventiva/store') ?>" method="post">
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
              <input type="submit" class="btn btn-info" value="Salvar"></input>

            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- Inicio modal Cadastro Instalacao-->
  <div class="modal fade" id="modalCadastroInstalacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cadastro de Ordem de serviço Instalação</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formCadastroEquipamento" action="<?= base_url('osinstalacao/store') ?>" method="post">
            <input id="uid" type="hidden" name="uid" value="">

            </hr>
            <div class="row">
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
              <input type="submit" class="btn btn-info" value="Salvar"></input>

            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- Inicio modal Cadastro Treinamento-->
  <div class="modal fade" id="modalCadastroTreinamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cadastro de Ordem de serviço Treinamento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formCadastroEquipamento" action="<?= base_url('ostreinamento/store') ?>" method="post">
            <input id="uid" type="hidden" name="uid" value="">

            </hr>
            <div class="row">
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
              <input type="submit" class="btn btn-info" value="Salvar"></input>

            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- Inicio modal Cadastro Corretiva-->
  <div class="modal fade" id="modalCadastroCorretiva" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cadastro de Ordem de serviço Corretiva</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formCadastroEquipamento" action="<?= base_url('oscorretiva/store') ?>" method="post">
            <input id="uid" type="hidden" name="uid" value="">

            </hr>
            <div class="row">
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
              <input type="submit" class="btn btn-info" value="Salvar"></input>

            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- Inicio modal Cadastro Inspeçao-->
  <div class="modal fade" id="modalCadastroInspecao" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cadastro de Ordem de serviço de Inspeção</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formCadastroEquipamento" action="<?= base_url('osinspecao/store') ?>" method="post">
            <input id="uid" type="hidden" name="uid" value="">

            </hr>
            <div class="row">
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
              <input type="submit" class="btn btn-info" value="Salvar"></input>

            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- Inicio modal Cadastro Calibracao-->
  <div class="modal fade" id="modalCadastroCalibracao" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cadastro de Ordem de serviço de Calibração</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formCadastroEquipamento" action="<?= base_url('oscalibracao/store') ?>" method="post">
            <input id="uid" type="hidden" name="uid" value="">

            </hr>
            <div class="row">
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
              <input type="submit" class="btn btn-info" value="Salvar"></input>

            </div>
          </form>
        </div>
      </div>

    </div>
  </div>

  <!-- Inicio Modal de apresentação de dados da o.s Preventiva -->
  <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dados da O.S</h5>
          <button typte="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col md-8">
              <?php foreach ($ospreventivasEquipamento as $os) : ?>
                <p class="text-muted text-sm"><b>Data Preventiva: </b> <?php echo date_format(new DateTime($os['dataPreventiva']), 'd/m/Y '); ?> </p>
                <p class="text-muted text-sm"><b>Data Proxima: </b> <?php echo date_format(new DateTime($os['dataProxima']), 'd/m/Y '); ?></p>
                <p class="text-muted text-sm"><b>Técnico Responsável: </b><?php echo $os['tecnico']; ?></p>
                <p class="text-muted text-sm"><b>Data Entrada: </b> <?php echo date_format(new DateTime($os['dataEntrada']), 'd/m/Y '); ?></p>
                <p class="text-muted text-sm"><b>Hora Entrada: </b> <?php echo $os['horaEntrada']; ?></p>
                <p class="text-muted text-sm"><b>Data Saida: </b> <?php echo date_format(new DateTime($os['dataSaida']), 'd/m/Y '); ?></p>
                <p class="text-muted text-sm"><b>Hora Saida: </b> <?php echo $os['horaSaida']; ?></p>
              <?php endforeach; ?>
            </div>
            <div class="col md-4">
              <label>Foto da OS</label>
              <img src="<?= base_url('assets/img/ospadrao.jpeg') ?>" width="150px" height="150px"></img>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Inicio Modal de apresentação de dados da o.s Instalação -->
  <div class="modal fade" id="modalExemplo2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dados da O.S de Instalacao</h5>
          <button typte="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col md-8">
              <?php foreach ($osinstalacoesEquipamento as $os) : ?>
                <p class="text-muted text-sm"><b>Técnico Responsável: </b><?php echo $os['tecnico']; ?></p>
                <p class="text-muted text-sm"><b>Data Entrada: </b> <?php echo date_format(new DateTime($os['dataEntrada']), 'd/m/Y '); ?></p>
                <p class="text-muted text-sm"><b>Hora Entrada: </b> <?php echo $os['horaEntrada']; ?></p>
                <p class="text-muted text-sm"><b>Data Saida: </b> <?php echo date_format(new DateTime($os['dataSaida']), 'd/m/Y '); ?></p>
                <p class="text-muted text-sm"><b>Hora Saida: </b> <?php echo $os['horaSaida']; ?></p>
              <?php endforeach; ?>
            </div>
            <div class="col md-4">
              <label>Foto da OS</label>
              <img src="<?= base_url('assets/img/ospadrao.jpeg') ?>" width="150px" height="150px"></img>
            </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Inicio Modal de apresentação de dados da o.s Corretiva -->
  <div class="modal fade" id="modalExemplo3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dados da O.S de Corretiva</h5>
          <button typte="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col md-8">
              <?php foreach ($oscorretivasEquipamento as $os) : ?>
                <p class="text-muted text-sm"><b>Técnico Responsável: </b><?php echo $os['tecnico']; ?></p>
                <p class="text-muted text-sm"><b>Data Entrada: </b> <?php echo date_format(new DateTime($os['dataEntrada']), 'd/m/Y '); ?></p>
                <p class="text-muted text-sm"><b>Hora Entrada: </b> <?php echo $os['horaEntrada']; ?></p>
                <p class="text-muted text-sm"><b>Data Saida: </b> <?php echo date_format(new DateTime($os['dataSaida']), 'd/m/Y '); ?></p>
                <p class="text-muted text-sm"><b>Hora Saida: </b> <?php echo $os['horaSaida']; ?></p>
              <?php endforeach; ?>
            </div>
            <div class="col md-4">
              <label>Foto da OS</label>
              <img src="<?= base_url('assets/img/ospadrao.jpeg') ?>" width="150px" height="150px"></img>
            </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Inicio Modal de apresentação de dados da o.s Calibracao -->
  <div class="modal fade" id="modalExemplo4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dados da O.S de Calibracao</h5>
          <button typte="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col md-8">
              <?php foreach ($oscalibracoesEquipamento as $os) : ?>
                <p class="text-muted text-sm"><b>Técnico Responsável: </b><?php echo $os['tecnico']; ?></p>
                <p class="text-muted text-sm"><b>Data Entrada: </b> <?php echo date_format(new DateTime($os['dataEntrada']), 'd/m/Y '); ?></p>
                <p class="text-muted text-sm"><b>Hora Entrada: </b> <?php echo $os['horaEntrada']; ?></p>
                <p class="text-muted text-sm"><b>Data Saida: </b> <?php echo date_format(new DateTime($os['dataSaida']), 'd/m/Y '); ?></p>
                <p class="text-muted text-sm"><b>Hora Saida: </b> <?php echo $os['horaSaida']; ?></p>
              <?php endforeach; ?>
            </div>
            <div class="col md-4">
              <label>Foto da OS</label>
              <img src="<?= base_url('assets/img/ospadrao.jpeg') ?>" width="150px" height="150px"></img>
            </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Inicio Modal de apresentação de dados da o.s Treinamento -->
  <div class="modal fade" id="modalExemplo5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dados da O.S de Treinamento</h5>
          <button typte="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col md-8">
              <?php foreach ($ostreinamentosEquipamento as $os) : ?>
                <p class="text-muted text-sm"><b>Técnico Responsável: </b><?php echo $os['tecnico']; ?></p>
                <p class="text-muted text-sm"><b>Data Entrada: </b> <?php echo date_format(new DateTime($os['dataEntrada']), 'd/m/Y '); ?></p>
                <p class="text-muted text-sm"><b>Hora Entrada: </b> <?php echo $os['horaEntrada']; ?></p>
                <p class="text-muted text-sm"><b>Data Saida: </b> <?php echo date_format(new DateTime($os['dataSaida']), 'd/m/Y '); ?></p>
                <p class="text-muted text-sm"><b>Hora Saida: </b> <?php echo $os['horaSaida']; ?></p>
              <?php endforeach; ?>
            </div>
            <div class="col md-4">
              <label>Foto da OS</label>
              <img src="<?= base_url('assets/img/ospadrao.jpeg') ?>" width="150px" height="150px"></img>
            </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Inicio Modal de apresentação de dados da o.s Inspeção -->
  <div class="modal fade" id="modalExemplo6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dados da O.S de Inspeção</h5>
          <button typte="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col md-8">
              <?php foreach ($osinspecoesEquipamento as $os) : ?>
                <p class="text-muted text-sm"><b>Técnico Responsável: </b><?php echo $os['tecnico']; ?></p>
                <p class="text-muted text-sm"><b>Data Entrada: </b> <?php echo date_format(new DateTime($os['dataEntrada']), 'd/m/Y '); ?></p>
                <p class="text-muted text-sm"><b>Hora Entrada: </b> <?php echo $os['horaEntrada']; ?></p>
                <p class="text-muted text-sm"><b>Data Saida: </b> <?php echo date_format(new DateTime($os['dataSaida']), 'd/m/Y '); ?></p>
                <p class="text-muted text-sm"><b>Hora Saida: </b> <?php echo $os['horaSaida']; ?></p>
              <?php endforeach; ?>
            </div>
            <div class="col md-4">
              <label>Foto da OS</label>
              <img src="<?= base_url('assets/img/ospadrao.jpeg') ?>" width="150px" height="150px"></img>
            </div>
          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

          </div>
        </div>
      </div>
    </div>
  </div>

</div>