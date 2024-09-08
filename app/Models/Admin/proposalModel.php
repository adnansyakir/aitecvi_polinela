<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ProposalModel extends Model
{
    protected $table      = 'proposal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id',  'pt_id', 'cabang_perlombaan_id', 'nama_team','peserta_id', 'proposal', 'keterangan'];

    public function getProposalWithKeterangan($keterangan)
{
    return $this->where('keterangan', $keterangan)
                ->findAll();
}

    public function getAllPendaftaran()
    {
        return $this->findAll();
    }
    public function proposalbyPt()
    {
        return $this->select('proposal.*, peserta.nama_peserta,  pt.nama_pt, cabang_perlombaan.nama_perlombaan')
            ->join('pt', 'proposal.pt_id = pt.id')
            ->join('cabang_perlombaan', 'proposal.cabang_perlombaan_id = cabang_perlombaan.id')
            ->join('peserta', 'proposal.peserta_id = peserta.id')
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
