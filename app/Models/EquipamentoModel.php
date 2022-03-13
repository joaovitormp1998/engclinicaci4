<?php

namespace App\Models;

use CodeIgniter\Model;

class EquipamentoModel extends Model
{
    protected $table = 'equipamento';
    protected $fk_usuario;
    protected $fk_setor;
    protected $allowedFields = [
        'nome',
        'marca',  
        'numero_serie', 
        'patrimonio', 
        'criticidade', 
        'tag', 
        'sincov', 
        'localizacao',
        'fornecedor',
        'unidade',
        'data_aquisicao',
        'data_fabricacao',
        'numero_pasta',
        'numero_certificado',
        'periocidade',
        'img_qrcode',
        'fk_setor',
        'fk_usuario'
    ];
}
