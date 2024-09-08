<?php

namespace App\Models\Pendamping;

use CodeIgniter\Model;

class FinalisasiModel extends Model
{
    protected $table      = 'finalisasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama_team', 'surat_tugas', 'invoice', 'bukti_transfer', 'keterangan'];

    public function getFinalisasiWithKeterangan($keterangan)
{
    return $this->where('keterangan', $keterangan)
                ->findAll();
}

    public function getAllfinalisasi()
    {
        return $this->select('finalisasi.*, proposal.nama_team')
                    ->join('proposal', 'proposal.nama_team = finalisasi.nama_team')
                    ->findAll();
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
        return $this->select('finalisasi.*, proposal.nama_team')
                    ->join('proposal', 'proposal.nama_team = finalisasi.nama_team')
                    ->where('finalisasi.id', $id)
                    ->get()
                    ->getRow();
    }
}
