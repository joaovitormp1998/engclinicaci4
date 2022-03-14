<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark" align="left"> Cadastro de Usuarios</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Usuario</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <style>
        .btn-editar:link {
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

        .close {
            color: whitesmoke;
            text-decoration: none
        }

        .modal-content {
            overflow: auto;
            /*habilita o overflow no corpo da modal*/

            border-color: #008080;
        }

        @media screen and (max-width: 600px) {
            .um {
                background: #F9C;
            }

            span.lt600 {
                display: inline-block;
            }

            .modal {
                width: 50%;
                /* Full width */
                overflow: auto;
                /* Enable scroll if needed */
                /* Sit on top */
                left: 13;
                top: 0;

            }

        }
    </style>


    <section class="content">
        <div class="container-fluid">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalCadastroUsuario"><i class="fas fa-plus"></i>
            </button></br>
            </br>

            <table id="tablita" class="table table-striped">
                <thead>
                    <tr>
                        <th align="center">ID</th>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Nivel</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <td align="justify"><?= $usuario['id'] ?></td>
                            <td align="justify"><img src="<?= base_url('uploads') ?>/<?= $usuario['foto'] ?>" width="50px" height="50px"></td>
                            <td align="justify"><?= $usuario['nome'] ?></td>
                            <td align="center"><?= $usuario['nivel'] ?></td>
                            <td align="justify"><?= $usuario['email'] ?></td>
                            <td align="center"><a href="<?= base_url('/usuario/edit') ?>/<?= $usuario['id'] ?>" class="btn-editar" data-id="<?= $usuario['id'] ?>"><i class="far fa-edit"></i></a>
                                &nbsp;&nbsp; <a href="<?= base_url('/usuario/delete') ?>/<?= $usuario['id'] ?>" class="btn-excluir" data-id="<?= $usuario['id'] ?>"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<div class="modal" id="modalCadastroUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cadastro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCadastroUsuario" action="<?= base_url('usuario/create') ?>" method="post" enctype="multipart/form-data">
                    <input id="uid" type="hidden" name="uid" value="">
                    <div class="row">

                        <div class="form-group col-6 col-sm-6">
                            <label for="nome">Nome Completo:</label>
                            <input type="text" class="form-control form-control-sm" value="<?php echo isset($dadosUsuario) ? $dadosUsuario['nome'] : '' ?>" id="nome" placeholder="Nome" name="nome" required>
                        </div>
                        <div class="form-group col-6 col-sm-6">
                            <label for="foto">Foto:</label>
                            <input type="file" class="form-control form-control-sm" value="<?php echo isset($dadosUsuario) ? $dadosUsuario['foto'] : '' ?>" id="foto" name="foto" required>
                        </div>
                        <div class="form-group col-8 col-sm-6">
                            <label for="email">E-mail:</label>
                            <input type="text" class="form-control form-control-sm" value="<?php echo isset($dadosUsuario) ? $dadosUsuario['email'] : '' ?>" id="email" placeholder="email" name="email" required>
                        </div>
                        <div class="form-group col-6 col-sm-6">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control form-control-sm" value="<?php echo isset($dadosUsuario) ? $dadosUsuario['senha'] : '' ?>" id="senha" placeholder="Senha" name="senha" required>
                        </div>
                        <div class="form-group col-6 col-sm-6">
                            <label for="repita_senha">Repita sua senha:</label>
                            <input type="password" class="form-control form-control-sm" value="<?php echo isset($dadosUsuario) ? $dadosUsuario['senha'] : '' ?>" id="repita_senha" name="repita_senha" required>
                        </div>
                        <div class="form-group col-6 col-sm-6">
                            <label for="nivel">Nível:</label>
                            <select class="form-control form-control-sm" id="nivel" placeholder="Nível" name="nivel" required>
                                <option selected>Selecione</option>
                                <option value="A">Administrador</option>
                                <option value="F">Funcionario</option>
                            </select>
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













<div class="modal fade" id="modalExcluirUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">

                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">


                <form action="<?= base_url('usuario/delete/') ?>" id="formExcluirUsuario" method="post">
                    <input id="uid" type="hidden" name="id" value="">
                    Deseja realmente excluir esse Usuario:
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Excluir</button>
            </div>

            </form>

        </div>
    </div>
</div>
</div>