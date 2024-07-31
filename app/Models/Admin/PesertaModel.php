<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table      = 'peserta';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'kode_peserta', 'nama_peserta', 'no_wa','ktm','file_surat_tugas','prodi_id','pt_id','keterangan'];

    

    public function getAllpeserta()
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

    public function getAllProdi()
    {
        return $this->findAll();
    }

    public function pesertabyjoinsemua(){
        $builder = $this->db->table('peserta');
        $builder->select('peserta.*, prodi.nama_prodi, pt.nama_pt');
        $builder->join('prodi', 'peserta.prodi_id = prodi.id', 'left');
        $builder->join('pt', 'peserta.pt_id = pt.id', 'left');
        
        
        // // Print query for debugging
        // echo $builder->getCompiledSelect();
        
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function getPeserta($id)
    {

        return $this->where("id", $id)->get()->getRow();
    }

}
