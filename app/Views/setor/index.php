<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark" align="left"> Cadastro de Setor</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Setores</li>
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
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalCadastroSetor"><i class="fas fa-plus"></i>
            </button></br>


            <table id="tablita" name="tablita" class="table table-striped">
                <thead>
                    <tr>
                        <th align="left">ID</th>
                        <th align="left">Nome</th>
                        <th align="left">
                            Ações
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($setor as $setor) : ?>
                        <tr>
                            <td align="left"><?= $setor['id'] ?></td>
                            <td align="left"><?= $setor['nome'] ?></td>
                            <td align="left"><a href="<?= base_url('/setor/edit') ?>/<?= $setor['id'] ?>" class="btn-editar" data-id="<?= $setor['id'] ?>"><i class="far fa-edit"></i></a>
                                &nbsp;&nbsp; <a href="<?= base_url('/setor/delete') ?>/<?= $setor['id'] ?>" class="btn-excluir" data-id="<?= $setor['id'] ?>"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<div class="modal" id="modalCadastroSetor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cadastro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCadastroSetor" action="<?= base_url('setor/create') ?>" method="post">
                    <input id="uid" type="hidden" name="uid" value="">
                    <div class="row">
                        <div class="form-group col-6 col-sm-6">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control form-control-sm" value="<?php echo isset($dadosSetor) ? $dadosSetor['nome'] : ''; ?>" id="nome" placeholder="Nome" name="nome" required>
                        </div>
                        <div>
                            <input type="hidden" name="fk_usuario" value="<?php echo session()->id ?>">
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


<div class="modal fade" id="modalExcluirSetor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">

                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formExcluirSetor" method="get">
                    <input id="uid" type="hidden" name="id" value="">
                    Deseja realmente excluir esse Setor
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