<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class KntsLuringDaringModel extends Model
{
    protected $table      = 'kntsluring_daring';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id',  'pt_id', 'cabang_perlombaan_id', 'peserta_id', 'keterangan'];

    public function getAllPendaftaran()
    {
        return $this->findAll();
    }
    // Method untuk join kntsdaring_luring dengan proposal berdasarkan nama_team
    public function kntsdaringluringbyPt()
    {
        return $this->select('kntsluring_daring.*, pt.nama_pt, cabang_perlombaan.nama_perlombaan, peserta.nama_peserta')
            ->join('pt', 'kntsluring_daring.pt_id = pt.id')
            ->join('cabang_perlombaan', 'kntsluring_daring.cabang_perlombaan_id = cabang_perlombaan.id')
            ->join('peserta', 'kntsluring_daring.peserta_id = peserta.id') // Join dengan tabel proposal berdasarkan nama_team
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
