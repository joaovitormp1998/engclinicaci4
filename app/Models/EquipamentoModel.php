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
        'modelo',
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
    public function getAll($filtro = [], $fields = '*', $limit = 0, $offset = 0)
    {
        $db = \Config\Database::connect();
        $database = $db->table('vw_equipamento_setor');
        $database->select($fields)
            ->where($filtro)
            ->orderBy('id');
        if ($limit != 0 || $offset != 0) {
            $database->limit($limit, $offset);
        }
        return $database->get()->getResultArray();
    }
}
