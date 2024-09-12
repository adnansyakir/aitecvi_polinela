<?php

namespace App\Models\Pendamping;

use CodeIgniter\Model;

class LuringTimModel extends Model
{
    protected $table      = 'luring_tim';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id',  'pt_id', 'cabang_perlombaan_id', 'nama_team', 'peserta_id'];

    public function getProposalWithKeteranganAndPt($pt_id, $keterangan)
    {
        return $this->where('pt_id', $pt_id)
                    ->where('keterangan', $keterangan)
                    ->findAll();
    }

    public function getAllPendaftaran()
    {
        return $this->findAll();
    }
    public function LuringTimbyPt()
    {
        $ptId = session()->get('pt_id'); // Mendapatkan pt_id dari session

        return $this->select('luring_tim.*, pt.nama_pt, cabang_perlombaan.nama_perlombaan')
            ->join('pt', 'luring_tim.pt_id = pt.id')
            ->join('cabang_perlombaan', 'luring_tim.cabang_perlombaan_id = cabang_perlombaan.id')
            ->where('luring_tim.pt_id', $ptId) // Filter berdasarkan pt_id
            ->distinct() // Pastikan data tidak duplikat
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
