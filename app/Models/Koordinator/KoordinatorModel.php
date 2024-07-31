<?php

namespace App\Models\Koordinator;

use CodeIgniter\Model;

class KoordinatorModel extends Model
{
    protected $table      = 'koordinator';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'kode_koordinator', 'nama_koordinator'];

    public function getAllKoordinator()
    {
        return $this->findAll();
    }

    public function insertData($data)
    {
        try {
            $this->insert($data);
            return true;  // Berhasil
        } catch (\Exception $e) {
            return false; // Gagal, tangani exception jika diperlukan
        }
    }
    public function deleteById($id)
    {
        return $this->delete($id);
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
