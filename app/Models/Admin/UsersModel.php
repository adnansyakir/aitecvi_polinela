<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'username', 'email', 'password','pt_id', 'role_id', 'created_at', 'updated_at', 'status'];

    public function getAllUsers()
    {
        return $this->select('users.*, role.role, pt.nama_pt')
            ->join('role', 'role.id = users.role_id')
            ->join('pt', 'pt.id = users.pt_id')
            ->orderBy('status', '0')
            ->get()

            ->getResultArray();
    }

    public function countUser()
    {
        return $this->db->table('users')
            ->countAllResults();
    }

    public function activateUsers($id, $status)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id', $id);
        $builder->set('status', $status);

        $builder->update();
    }

    public function change($id, $password)
    {
        // Lakukan query untuk mengupdate password berdasarkan id pengguna
        $builder = $this->db->table($this->table);
        $builder->set('password',  hash('sha256', sha1($password)));
        $builder->where('id', $id);
        $builder->update();

        return $this->db->affectedRows(); // Mengembalikan jumlah baris yang terpengaruh oleh operasi update
    }
    public function getUsersById($id)
    {

        return $this->where("id", $id)->get()->getRow();
    }
}
