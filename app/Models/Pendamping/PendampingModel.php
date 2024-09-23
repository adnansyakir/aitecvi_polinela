<?php

namespace App\Models\Pendamping;

use CodeIgniter\Model;

class PendampingModel extends Model
{
    protected $table      = 'pendamping';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'kode_pendamping', 'nama_pendamping', 'pt_id','status','jk','uk_kaos','no_wa'];

    public function getALlPendamping()
    {
        return $this->findAll();
    }
    public function pendampingbyPt($ptId)
    {
        // Get pt_id from session
        
        return $this->select('pendamping.*,  pt.nama_pt')
            ->join('pt', 'pendamping.pt_id = pt.id')
            ->where('pendamping.pt_id', $ptId) // Filter based on pt_id
            ->distinct() // Ensure no duplicate data
            ->get()
            ->getResultArray();
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
    public function change($id, $password)
    {
        // Lakukan query untuk mengupdate password berdasarkan id pengguna
        $builder = $this->db->table($this->table);
        $builder->set('password',  hash('sha256', sha1($password)));
        $builder->where('id', $id);
        $builder->update();

        return $this->db->affectedRows(); // Mengembalikan jumlah baris yang terpengaruh oleh operasi update
    }
    public function deleteById($id)
    {
        return $this->delete($id);
    }
}
