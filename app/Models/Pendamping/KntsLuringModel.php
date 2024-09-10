<?php

namespace App\Models\Pendamping;

use CodeIgniter\Model;

class KntsLuringModel extends Model
{
    protected $table      = 'knts_luring';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id',  'pt_id', 'cabang_perlombaan_id', 'peserta_id', 'keterangan'];

    public function getAllPendaftaran()
    {
        return $this->findAll();
    }
    // Method untuk join kntsdaring_luring dengan proposal berdasarkan nama_team
    public function kntsdaringluringbyPt()
    {
        return $this->select('knts_luring.*, pt.nama_pt, cabang_perlombaan.nama_perlombaan, peserta.nama_peserta')
            ->join('pt', 'knts_luring.pt_id = pt.id')
            ->join('cabang_perlombaan', 'knts_luring.cabang_perlombaan_id = cabang_perlombaan.id')
            ->join('peserta', 'knts_luring.peserta_id = peserta.id') // Join dengan tabel proposal berdasarkan nama_team
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
