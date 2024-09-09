<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class CabangLombaModel extends Model
{
    protected $table      = 'cabang_perlombaan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'kode_perlombaan', 'nama_perlombaan'];


    public function getLombabyKode($kode_perlombaan)
    {
        return $this->where('kode_perlombaan', $kode_perlombaan)
                    ->findAll();
    }

    public function getAllLomba()
    {
        return $this->findAll();
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
    public function updateData($id, $data)
    {

        // Update data berdasarkan ID
        $this->set($data)->where('id', $id)->update();
    }
    public function deleteById($id)
    {
        return $this->delete($id);
    }
    public function getLomba($id)
    {

        return $this->where("id", $id)->get()->getRow();
    }
}
