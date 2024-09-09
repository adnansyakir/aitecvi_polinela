<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class KntsDaringLuringModel extends Model
{
    protected $table      = 'kntsdaring_luring';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id',  'pt_id', 'cabang_perlombaan_id', 'peserta_id', 'keterangan'];

    public function getAllPendaftaran()
    {
        return $this->findAll();
    }
    // Method untuk join kntsdaring_luring dengan proposal berdasarkan nama_team
    public function kntsdaringluringbyPt()
    {
        return $this->select('kntsdaring_luring.*, pt.nama_pt, cabang_perlombaan.nama_perlombaan, peserta.nama_peserta')
            ->join('pt', 'kntsdaring_luring.pt_id = pt.id')
            ->join('cabang_perlombaan', 'kntsdaring_luring.cabang_perlombaan_id = cabang_perlombaan.id')
            ->join('peserta', 'kntsdaring_luring.peserta_id = peserta.id') // Join dengan tabel proposal berdasarkan nama_team
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
