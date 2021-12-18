<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Supervisor</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Supervisor</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

<style>
    .btn-editar:link{
        color:green;
        text-decoration:none
    }
    .btn-excluir:link{
        color:red;
        text-decoration:none
    }
    .modal-header{
        background-color: darkred;
        
    }
    .modal-title{
        text-align: center;
        color:whitesmoke
    }
    .close{
        color:whitesmoke;
        text-decoration:none
    }
    .modal-content{
        border-color: darkred;      
    }
   
    
</style>

    <section class="content">
        <div class="container-fluid">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalCadastroSupervisor"><i class="fas fa-plus"></i>
                    
                </button>

            <table id="tb-supervisor" class="display">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cargo</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($supervisores as $supervisor) : ?>
                        <tr>
                            <td><?= $supervisor->nome ?></td>
                            <td><?= $supervisor->cargo ?></td>
                            <td><?= $supervisor->email ?></td>
                            <td><?= $supervisor->celular ?></td>
                            <td><a href="<?= base_url($_base . 'getDados/') ?>" class="btn-editar" data-id="<?= $supervisor->id ?>"><i class="far fa-edit"></i></a></td>
                            <td><a href="<?= base_url($_base . 'excluir/') ?>" class="btn-excluir" data-id="<?= $supervisor->id ?>"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>


</div>

<div class="modal fade" id="modalCadastroSupervisor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cadastro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCadastroSupervisor" action="<?= base_url('supervisor/gravar') ?>" method="post">
                    <input id="uid" type="hidden" name="uid" value="">
                    
                    <h4>Dados Pessoais</h4>
                    </hr>
                    <div class="row">
                        <div class="form-group col-6 col-sm-6">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control form-control-sm" id="nome" placeholder="Nome" name="nome" required>
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control form-control-sm" id="cpf" placeholder="CPF" name="cpf" required>
                        </div>
                        <div class="form-group col-6 col-sm-6">
                            <label for="dataNascimento">Data de Nascimento:</label>
                            <input type="date" class="form-control form-control-sm" id="dataNascimento" placeholder="Data de Nascimento" name="dataNascimento" required>
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control form-control-sm" id="email" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="telefone">Tefefone :</label>
                            <input type="text" class="form-control form-control-sm" id="telefone" placeholder="Telefone" name="telefone">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="cargo">Cargo:</label>
                            <input type="text" class="form-control form-control-sm" id="cargo" placeholder="Cargo" name="cargo">
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="celular">Celular:</label>
                            <input type="text" class="form-control form-control-sm" id="celular" placeholder="Celular" name="celular" required>
                        </div>
                        <h4 class="form-group col-8 col-sm-12">Dados do Endereço</h4><br> 
                        <div class="form-group col-8 col-sm-6">
                            <label for="cep">Cep:</label>
                            <input type="text" class="form-control form-control-sm" id="cep" placeholder="Cep" name="cep" required>
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="logradouro">Logradouro:</label>
                            <input type="text" class="form-control form-control-sm" id="logradouro" placeholder="Logradouro" name="logradouro" required>
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="numero">Numero:</label>
                            <input type="text" class="form-control form-control-sm" id="numero" placeholder="Numero" name="numero" required>
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control form-control-sm" id="bairro" placeholder="Bairro" name="bairro" required>
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control form-control-sm" id="cidade" placeholder="Cidade" name="cidade" required>
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="uf">Uf:</label>
                            <input type="text" class="form-control form-control-sm" id="uf" placeholder="UF" name="uf" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-info">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalExcluirSupervisor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <!-- <div class="modal" id="modalExcluirsupervisor" tabindex="-1"> -->
        <!-- <div class="modal-dialog"> -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('supervisor/deletar') ?>" id="formExcluirSupervisor" method="post">
                <div class="modal-body">
                    <p>Deseja realmente excluir esse registro?</p>
                    <input type="hidden" id="uidExcluir" name="uid" value="">
                </div>
                <input type="hidden" id="uidExcluir" name="uid" value="">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>

