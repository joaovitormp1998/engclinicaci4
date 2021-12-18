<?php

namespace App\Models;

use CodeIgniter\Model;

class OspreventivaModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'os_preventiva';
    protected $primaryKey           = 'idOs';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'idOs',
        'dataPreventiva',
        'dataProxima',
        'funcionario',	
        'falha',
        'defeito',
        'solucao',
        'causa',
        'resolvido',
        'agente',
        'tecnico',
        'dataEntrada',
        'horaEntrada',
        'dataSaida',
        'horaSaida',
        'material',
        'imagem',
        'fk_equipamento'
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
     * @param [type] $id_ospreventiva
     * @return void
     */
    public function getIdEquipamentoByIdOspreventiva($id_ospreventiva)
    {
        $rq = $this->find($id_ospreventiva);

        return !is_null($rq) ? $rq['fk_equipamento'] : null;
    }
}
