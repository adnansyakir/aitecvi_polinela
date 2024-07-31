<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PtModel extends Model
{
    protected $table      = 'pt';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'kode_pt', 'nama_pt', 'email_pt','asal_prov','asal_negara'];

    public function getAllPt()
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
    
    public function updateData($id, $data)
    {

        // Update data berdasarkan ID
        $this->set($data)->where('id', $id)->update();
    }
    public function getPt($id)
    {

        return $this->where("id", $id)->get()->getRow();
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
