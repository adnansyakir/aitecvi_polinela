<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class JuriModel extends Model
{
    protected $table      = 'juri';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'kode_juri', 'nama_juri', 'pt_id', 'cabang_perlombaan_id', 'keterangan'];

    public function getAllJuri()
    {
        return $this->findAll();
    }
    public function JuribyPt()
    {
        return $this->select('juri.*,  pt.nama_pt, cabang_perlombaan.nama_perlombaan')
            ->join('pt', 'juri.pt_id = pt.id')
            ->join('cabang_perlombaan', 'juri.cabang_perlombaan_id = cabang_perlombaan.id')
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
