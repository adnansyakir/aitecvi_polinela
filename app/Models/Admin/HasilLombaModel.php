<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class HasilLombaModel extends Model
{
    protected $table      = 'hasillomba';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id',  'pendaftaran_id', 'cabang_perlombaan_id', 'nilai_juri1', 'nilai_juri2', 'nilai_juri3', 'catatan_juri1', 'catatan_juri2', 'catatan_juri3', 'keterangan', 'total_nilai', 'hasil_akhir'];

    public function getAllhasillomba()
    {
        return $this->findAll();
    }
    public function Hasillombabypendaftaran($cabangPerlombaanId = null)
    {
        $builder = $this->select('hasillomba.*, pendaftaran.nama_team, cabang_perlombaan.nama_perlombaan')
            ->join('pendaftaran', 'hasillomba.pendaftaran_id = pendaftaran.id')
            ->join('cabang_perlombaan', 'hasillomba.cabang_perlombaan_id = cabang_perlombaan.id');

        if ($cabangPerlombaanId) {
            $builder->where('hasillomba.cabang_perlombaan_id', $cabangPerlombaanId);
        }

        return $builder->get()->getResultArray();
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
