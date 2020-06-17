<?php

namespace App\Models;

use App\Core\Model;

class Imagenes extends Model
{
    protected $table = 'imagenes';

    public function get()
    {
        return $this->db->selectAll($this->table);
    }

    public function insert(array $imagen)
    {
        $this->db->insert($this->table, $imagen);
    }
}
