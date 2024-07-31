<?php

namespace App\Models\Guru;

use CodeIgniter\Model;

class GuruUserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'username', 'email', 'password', 'update_at'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function getData($session)
    {
        // Lakukan query untuk mendapatkan data berdasarkan session
        $query = $this->db->table($this->table)->select('id, username, email, updated_at')
            ->where('username', $session) // Ganti 'session' dengan kolom yang sesuai
            ->get();

        // Mengembalikan hasil query dalam bentuk array
        return $query->getRow();
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
}
