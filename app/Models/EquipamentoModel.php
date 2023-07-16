<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class EquipamentoModel extends Model
{
    protected $table = 'equipamento';
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

    protected $db;

    public function __construct(ConnectionInterface &$db = null)
    {
        if (!$db) {
            $db = \Config\Database::connect();
        }

        $this->db = &$db;
    }

    public function getAll($filtro = [], $fields = '*', $limit = 0, $offset = 0): array
    {
        $database = $this->db->table('vw_equipamento_setor');
        $database->select($fields)
            ->where($filtro)
            ->orderBy('id');

        if ($limit != 0 || $offset != 0) {
            $database->limit($limit, $offset);
        }

        return $database->get()->getResultArray();
    }

    public function getBySetor($setorId, $fields = '*'): array
    {
        return $this->getAll(['fk_setor' => $setorId], $fields);
    }

    public function getById($id, $fields = '*')
    {
        return $this->find($id, $fields);
    }

    public function getEquipamentoById($id)
    {
        return $this->find($id);
    }

    public function gerarQRCode($id)
    {
        $equipamento = $this->getEquipamentoById($id);
        $url = base_url(URLQRCODE . 'ordem/' . $equipamento['id']);

        $options = new QROptions([
            'version' => 5,
            'outputType' => QRCode::OUTPUT_MARKUP_SVG,
            'eccLevel' => QRCode::ECC_L,
        ]);

        $qrcode = new QRCode($options);

        $nome_img = $equipamento['id'] . '.svg';

        $qrcode->render($url, 'assets/imgqrcode/' . $nome_img);
    }
}
