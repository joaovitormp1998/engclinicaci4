<?php echo view('common/head.php'); ?>

    <style>
        #barradolado {
            background: #00997D !important;
        }

        .m-0 {
            color: #00997D !important;
        }

        .center {
            margin-left: 20%;
            text-justify: center;
            color: #f2f2f2;
        }
    </style>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('/home') ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('/contato') ?>" class="nav-link">Contato</a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4" id="barradolado">
            <a href="<?= base_url('home') ?>" class="brand-link">
                <img src="<?= base_url('') ?>" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="center">SISCONTROLE</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">

                        <img src="<?= base_url('uploads') ?>/<?php echo session()->foto
                                                                ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo session()->nome ?></a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item has-treeview">
                            <?php if (session()->nivel != 'F') { ?>
                                <a href="#" class="nav-link">
                                    <i class="fas fa-plus"></i>
                                    <p>
                                        Cadastro
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('usuario') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Usuario</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('setor') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Setor</p>
                                        </a>
                                    </li>

                                </ul>
                            <?php }; ?>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="<?= base_url('equipamento') ?>" class="nav-link">
                                <i class="fas fa-toolbox mav-icon"></i>
                                <p>Equipamento</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="<?= base_url('/contato') ?>" class="nav-link">
                                <i class="far fa-user"></i>
                                <p>Contato</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="<?= base_url('busca') ?>" class="nav-link">
                                <i class="fas fa-search"></i>
                                <p>Buscar</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="<?= base_url('relatorio') ?>" class="nav-link">
                                <i class="far fa-file-pdf"></i>
                                <p>Relatório</p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="<?= base_url('login/signOut') ?>" class=" nav-link">
                                <i class="fas fa-sign-out-alt"></i>
                                <p>Sair</p>
                            </a>

                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
