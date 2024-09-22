<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PendampingModel extends Model
{
    protected $table      = 'pendamping';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'kode_pendamping', 'nama_pendamping', 'pt_id','status','jk','uk_kaos','no_wa','foto'];

    public function getALlPendamping()
    {
        return $this->findAll();
    }
    public function pendampingbyPt()
    {
        return $this->select('pendamping.*,  pt.nama_pt')
            ->join('pt', 'pendamping.pt_id = pt.id')
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
    public function deleteById($id)
    {
        return $this->delete($id);
    }
}
