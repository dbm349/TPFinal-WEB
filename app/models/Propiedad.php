<?php

namespace App\Models;

use App\Core\Model;

class Propiedad extends Model
{
    protected $table = 'propiedades';

    public function get($to, $tp)
    {
        return $this->db->select($this->table,$to,$tp);
    }

    public function getByID($propID)
    {
        return $this->db->selectPropId($this->table,$propID);
    }

    public function insert(array $propiedad)
    {
        $this->db->insert($this->table, $propiedad);
    }
}
