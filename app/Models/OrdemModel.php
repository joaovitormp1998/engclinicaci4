<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdemModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'ordem-servico';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'id',
        'data_preventiva',
        'data_proxima',
        'funcionario',	
        'falha',
        'defeito',
        'solucao',
        'causa',
        'resolvido',
        'agente',
        'tecnico',
        'data_entrada',
        'hora_entrada',
        'data_saida',
        'hora_saida',
        'imagem',
        'fk_equipamento',
        'fk_ordem_servico_tipo',
        'fk_usuario'
    ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];


    /**
     * Retorna todos os telefones daquele cliente
     *
     * @param [type] $fk_equipamento
     * @return void
     */
    public function getByIdEquipamento($fk_equipamento)
    {
        return $this->where('fk_equipamento', $fk_equipamento)->findAll();
    }

    /**
     * Retorna o id do cliente
     *
     * @param [type] $idOs
     * @return void
     */
    public function getIdEquipamentoByIdOspreventiva($idOs)
    {
        $rq = $this->find($idOs);

        return !is_null($rq) ? $rq['fk_equipamento'] : null;
    }
}
