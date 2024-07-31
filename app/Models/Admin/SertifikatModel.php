<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class SertifikatModel extends Model
{
    protected $table      = 'sertifikat';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'peserta_id', 'kode_peserta', 'prodi_id', 'pt_id', 'file_sertifikat', 'cabang_perlombaan_id'];




    public function insertData($data)
    {
        try {
            $this->insert($data);
            return true;  // Berhasil
        } catch (\Exception $e) {
            return false; // Gagal, tangani exception jika diperlukan
        }
    }
    public function updateData($id, $data)
    {

        // Update data berdasarkan ID
        $this->set($data)->where('id', $id)->update();
    }
    public function deleteById($id)
    {
        return $this->delete($id);
    }

    public function getAllSertifikat()
    {
        return $this->findAll();
    }

    public function sertifikat()
    {
        return $this->select('sertifikat.*, peserta.nama_peserta,  pt.nama_pt, prodi.nama_prodi, cabang_perlombaan.nama_perlombaan')
            ->join('pt', 'sertifikat.pt_id = pt.id')
            ->join('cabang_perlombaan', 'sertifikat.cabang_perlombaan_id = cabang_perlombaan.id')
            ->join('peserta', 'sertifikat.peserta_id = peserta.id')
            ->join('prodi', 'sertifikat.prodi_id = prodi.id')
            ->get()
            ->getResultArray();
    }



    public function getAllProdiWithpt()
    {
        return $this->select('prodi.id, prodi.kode_prodi, prodi.nama_prodi, pt.kode_pt, pt.nama_pt, pt.email_pt')
            ->join('pt', 'prodi.pt_id = pt.id')
            ->findAll();
    }

    public function prodibyptedit($id, $data)
    {
        return $this->select('prodi.*, pt.nama_pt')
            ->join('pt', 'prodi.pt_id = pt.id')
            ->get()
            ->getResultArray();
        $this->set($data)->where('id', $id)->update();
    }

    // public function prodibyptedit($id, $data) {
    //     // Pertama, update data prodi berdasarkan ID
    //     $this->set($data)->where('id', $id)->update();

    //     // Setelah data diperbarui, lakukan query untuk mendapatkan data yang telah di-join dengan tabel pt
    //     return $this->select('prodi.*, pt.nama_pt')
    //                 ->join('pt', 'prodi.pt_id = pt.id')
    //                 ->get()
    //                 ->getResultArray();
    // }



    // public function getSertifikat($id)
    // {

    //     return $this->where("id", $id)->get()->getRow();
    // }

    
}
