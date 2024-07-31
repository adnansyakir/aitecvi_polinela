<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'role'];

    public function getAllData()
    {
        return $this->findAll();
    }

    public function getDataById($id)
    {
        return $this->find($id);
    }

    public function getRoleIdByName($roleName)
    {
        $role = $this->where('role', $roleName)->first();
        return $role ? $role['id'] : null;
    }
}
