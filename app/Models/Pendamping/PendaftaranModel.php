<?php

namespace App\Models\Pendamping;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table      = 'pendaftaran';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id',  'pt_id', 'cabang_perlombaan_id', 'nama_team','peserta_id', 'kode_peserta', 'keterangan'];

    public function getAllPendaftaran()
    {
        return $this->findAll();
    }
    public function PendaftaranbyPeserta()
    {
        return $this->select('pendaftaran.*, peserta.nama_peserta,  pt.nama_pt, cabang_perlombaan.nama_perlombaan')
            ->join('pt', 'pendaftaran.pt_id = pt.id')
            ->join('cabang_perlombaan', 'pendaftaran.cabang_perlombaan_id = cabang_perlombaan.id')
            ->join('peserta', 'pendaftaran.peserta_id = peserta.id')
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
