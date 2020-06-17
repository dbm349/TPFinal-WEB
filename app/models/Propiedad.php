<?php

namespace App\Models;

use App\Core\Model;

class Propiedad extends Model
{
    protected $table = 'propiedad';

    public function get()
    {
        return $this->db->selectAll($this->table);
    }

    public function insert(array $propiedad)
    {
        $this->db->insert($this->table, $propiedad);
    }
}
