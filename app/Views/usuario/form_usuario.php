<style>
    .l {
      color: darkred;
    }

    ul {
      list-style: none;
    }
  </style>

<script>
    function confirma() {
        if (!confirm("Deseja excluir esta ordem?")) {
            return false;
        }

        return true;
    }
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/usuario">Usuario</a></li>
                        <li class="breadcrumb-item active">Editar </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

<div class="card">
    <div class="card-body">
        <?php echo form_open('usuario/store') ?>

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" value="<?php echo isset($dadosUsuario) ? $dadosUsuario['nome'] : '' ?>" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" value="<?php echo isset($dadosUsuario) ? $dadosUsuario['email'] : '' ?>" name="email" id="email" class="form-control" disable>
        </div>
        
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" value="<?php echo isset($dadosUsuario) ? $dadosUsuario['senha'] : '' ?>" name="senha" id="senha" class="form-control" >
        </div>
        
        
        <div class="form-group">
            <label for="repita_senha">Repita Senha:</label>
            <input type="password" value="<?php echo isset($dadosUsuario) ? $dadosUsuario['senha'] : '' ?>" name="repita_senha" id="repita_senha" class="form-control" >
        </div>
        
        
        

        <input type="submit" class="btn btn-primary" value="Salvar">

        <input type="hidden" name="id" value="<?php echo isset($dadosUsuario) ? $dadosUsuario['id'] : '' ?>">

        <?php echo form_close() ?>
    </div>
</div>
</div>  