<?php

namespace App\Models\Pendamping;

use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $table      = 'video';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id',  'pt_id', 'cabang_perlombaan_id', 'nama_team', 'video', 'keterangan'];

    public function getAllPendaftaran()
    {
        return $this->findAll();
    }
    // Method untuk join video dengan proposal berdasarkan nama_team
    public function videobyPt()
    {
        // Get pt_id from session
        $ptId = session()->get('pt_id');

        // Retrieve videos based on pt_id
        return $this->select('video.*, pt.nama_pt, cabang_perlombaan.nama_perlombaan')
            ->join('pt', 'video.pt_id = pt.id')
            ->join('cabang_perlombaan', 'video.cabang_perlombaan_id = cabang_perlombaan.id')
            ->where('video.pt_id', $ptId) // Filter based on pt_id
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
    public function deleteById($id)
    {
        return $this->delete($id);
    }
}
