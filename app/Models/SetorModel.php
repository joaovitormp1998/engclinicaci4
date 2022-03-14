<?php

namespace App\Models;

use CodeIgniter\Model;

class SetorModel extends Model
{
    protected $table = 'setor';
    protected $fk_usuario;

    protected $allowedFields = [
        'nome', 'fk_usuario'
    ];
}
