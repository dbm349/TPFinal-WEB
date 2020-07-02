<?php

namespace App\Models;

use App\Core\Model;

class Users extends Model
{
    protected $table = 'users';

    public function get()
    {
        return $this->db->selectAll($this->table);
    }

    public function insert(array $user)
    {
        $this->db->insert($this->table, $user);
    }

    public function BuscarUsuario(array $user)
    {
        return $this->db->buscarUser($this->table, $user);
    }

    public function BuscarMail($user)
    {
        return $this->db->buscarByMail($this->table, $user);
    }

    public function GetUsuario(array $user)
    {
        return $this->db->GetUser($this->table, $user);
    }

    public function UpdateUsuario(array $user)
    {
       $this->db->UpdateUser($this->table,$user);
    }
}
