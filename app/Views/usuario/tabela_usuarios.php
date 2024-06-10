<?php
// tabela_usuarios.php
?>
<div class="overflow-x-auto shadow-md rounded-md bg-white">
    <table id="tablita" class="table-auto w-full">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Foto</th>
                <th class="px-4 py-2">Nome</th>
                <th class="px-4 py-2">Nível</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td class="border px-4 py-2"><?= $usuario['id'] ?></td>
                    <td class="border px-4 py-2"><img src="<?= base_url('uploads') ?>/<?= $usuario['foto'] ?>" width="50px" height="50px" class="rounded-full"></td>
                    <td class="border px-4 py-2"><?= $usuario['nome'] ?></td>
                    <td class="border px-4 py-2"><?= $usuario['nivel'] ?></td>
                    <td class="border px-4 py-2"><?= $usuario['email'] ?></td>
                    <td class="border px-4 py-2">
                        <a href="<?= base_url('/usuario/edit') ?>/<?= $usuario['id'] ?>" data-id="<?= $usuario['id'] ?>" class="btn-editar text-green-500 hover:text-green-700 mr-2" title="Editar Usuário"><i class="far fa-edit"></i></a>
                        <a href="<?= base_url('/usuario/delete') ?>/<?= $usuario['id'] ?>" data-id="<?= $usuario['id'] ?>" class="btn-excluir text-red-500 hover:text-red-700" title="Excluir Usuário"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
