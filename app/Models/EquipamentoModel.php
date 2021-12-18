<?php

namespace App\Models;

use CodeIgniter\Model;

class EquipamentoModel extends Model
{
    protected $table = 'equipamento';
    protected $allowedFields = [
        'nome', 'marca', 'modelo', 'numeroSerie', 'patrimonio', 'criticidade', 'tag', 'siconv', 'localizacao', 'setor', 'unidade',
        'fornecedor',
        'dataAquisicao',
        'dataFabricacao',
        'numeroPasta',
        'numeroCertificado',
        'periodicidade',
        'nome_img_qr'
    ];
}
