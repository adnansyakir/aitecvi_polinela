<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ProdiModel extends Model
{
    protected $table      = 'prodi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'kode_prodi', 'nama_prodi', 'pt_id'];

    

   
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

    public function prodibypt(){
        $builder = $this->db->table($this->table);
        $builder->select('prodi.*, pt.nama_pt');
        $builder->join('pt', 'pt.id = prodi.pt_id');
        
        $query = $builder->get();
        return $query->getResultArray();
   
    }

    

    public function getAllProdiWithpt()
    {
        return $this->select('prodi.id, prodi.kode_prodi, prodi.nama_prodi, pt.kode_pt, pt.nama_pt, pt.email_pt')
        ->join('pt', 'prodi.pt_id = pt.id')
        ->findAll();
        
    }

    public function prodibyptedit($id,$data){
        return $this->select('prodi.*, pt.nama_pt')
                    ->join('pt','prodi.pt_id = pt.id')
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
    

    
    public function getProdi($id)
    {

        return $this->where("id", $id)->get()->getRow();
    }


}
