<?php

namespace App\Models\Pendamping;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table      = 'peserta';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'kode_peserta', 'nama_peserta', 'no_wa', 'jk', 'ktm', 'berita_acara', 'prodi', 'pt_id', 'foto', 'status', 'ukuran_kaos'];

    public function getPesertaWithdPt($pt_id)
    {
        return $this->where('pt_id', $pt_id)
            ->findAll();
    }

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

    public function getPesertaById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function getAllProdiid($id)
    {
        return $this->findAll($id);
    }

    public function pesertabyjoinsemua($pt_id)
    {
        return $this->select('peserta.*, pt.nama_pt')
            ->join('pt', 'peserta.pt_id = pt.id') // Join dengan tabel proposal berdasarkan nama_team
            ->where('peserta.pt_id', $pt_id) // Filter based on pt_id from session
            ->get()
            ->getResultArray();
    }

    public function pesertabyjoinsemuaid($peserta_id)
    {
        $builder = $this->db->table('peserta');
        $builder->select('peserta.*, prodi.nama_prodi, pt.nama_pt');
        $builder->join('prodi', 'peserta.prodi_id = prodi.id', 'left');
        $builder->join('pt', 'peserta.pt_id = pt.id', 'left');
        $builder->where('peserta.id', $peserta_id);

        $query = $builder->get();
        return $query->getRowArray(); // Use getRowArray() to fetch a single row if you're searching by ID
    }

    public function getPeserta($id)
    {

        return $this->where("id", $id)->get()->getRow();
    }
}
