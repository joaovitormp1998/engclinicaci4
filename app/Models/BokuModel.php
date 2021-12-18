<?php namespace App\Models;
use CodeIgniter\Model;
class BokuModel extends Model{
    public function AllData(){
        return $this->db->table('equipamento')->get()->getResultArray;;
    }
}