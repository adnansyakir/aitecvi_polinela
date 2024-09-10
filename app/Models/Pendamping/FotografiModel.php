<?php

namespace App\Models\Pendamping;

use CodeIgniter\Model;

class FotografiModel extends Model
{
    protected $table      = 'fotografi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id',  'pt_id', 'cabang_perlombaan_id', 'peserta_id', 'keterangan'];

    public function getAllPendaftaran()
    {
        return $this->findAll();
    }
    // Method untuk join kntsdaring_luring dengan proposal berdasarkan nama_team
    public function FotobyPt($pt_id)
    {
        return $this->select('fotografi.*, pt.nama_pt, cabang_perlombaan.nama_perlombaan, peserta.nama_peserta')
            ->join('pt', 'fotografi.pt_id = pt.id')
            ->join('cabang_perlombaan', 'fotografi.cabang_perlombaan_id = cabang_perlombaan.id')
            ->join('peserta', 'fotografi.peserta_id = peserta.id')
            ->where('fotografi.pt_id', $pt_id) // Filter based on pt_id from session
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
