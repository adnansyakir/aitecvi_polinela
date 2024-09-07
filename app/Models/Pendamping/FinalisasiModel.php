<?php

namespace App\Models\Pendamping;

use CodeIgniter\Model;

class FinalisasiModel extends Model
{
    protected $table      = 'finalisasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'surat_tugas', 'invoice', 'bukti_transfer'];

    public function getAllfinalisasi()
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
}
