<div class="overflow-x-auto shadow-md rounded-md bg-white">
    <table id="tablita" class="table-auto w-full">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nome</th>
                <th class="px-4 py-2">Marca</th>
                <th class="px-4 py-2">Setor</th>
                <th class="px-4 py-2">Criticidade</th>
                <th class="px-4 py-2">QR Code</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($equipamentos)) : ?>
                <?php foreach ($equipamentos as $equipamento) : ?>
                    <tr>
                        <td class="border px-4 py-2"><?= $equipamento['id'] ?></td>
                        <td class="border px-4 py-2"><?= $equipamento['nome'] ?></td>
                        <td class="border px-4 py-2"><?= $equipamento['marca'] ?></td>
                        <td class="border px-4 py-2"><?= $equipamento['setor_nome'] ?></td>
                        <td class="border px-4 py-2"><?= $equipamento['criticidade'] ?></td>
                        <td class="border px-4 py-2">
                            <img src="" width="50" alt="QR Code do Equipamento">
                        </td>
                        <td class="border px-4 py-2">
                            <a href="#" class="btn-editar text-green-500 hover:text-green-700 mr-2" 
                                data-id="<?= $equipamento['id'] ?>" 
                                data-nome="<?= $equipamento['nome'] ?>"
                                data-marca="<?= $equipamento['marca'] ?>"
                                data-modelo="<?= $equipamento['modelo'] ?>"
                                data-numero-serie="<?= $equipamento['numero_serie'] ?>"
                                data-patrimonio="<?= $equipamento['patrimonio'] ?>"
                                data-criticidade="<?= $equipamento['criticidade'] ?>"
                                data-tag="<?= $equipamento['tag'] ?>"
                                data-sincov="<?= $equipamento['sincov'] ?>"
                                data-localizacao="<?= $equipamento['localizacao'] ?>"
                                data-fornecedor="<?= $equipamento['fornecedor'] ?>"
                                data-unidade="<?= $equipamento['unidade'] ?>"
                                data-data-aquisicao="<?= $equipamento['data_aquisicao'] ?>"
                                data-data-fabricacao="<?= $equipamento['data_fabricacao'] ?>"
                                data-numero-pasta="<?= $equipamento['numero_pasta'] ?>"
                                data-numero-certificado="<?= $equipamento['numero_certificado'] ?>"
                                data-periocidade="<?= $equipamento['periocidade'] ?>"
                                data-img-qrcode="<?= $equipamento['img_qrcode'] ?>"
                                data-fk-setor="<?= $equipamento['fk_setor'] ?>"
                                data-fk-usuario="<?= $equipamento['fk_usuario'] ?>"
                                title="Editar Equipamento">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <a href="" class="btn-excluir text-red-500 hover:text-red-700" data-id="<?= $equipamento['id'] ?>" title="Excluir Equipamento">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7" class="border px-4 py-2 text-center">Nenhum equipamento encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
