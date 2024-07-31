<?php

namespace App\Models\Guru;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'tahun_ajar_id', 'kelas_id', 'mapel_id', 'guru_id', 'hari', 'waktu_mulai', 'waktu_selesai', 'created_at', 'status'];

    public function getAllData($hari = null)
    {

        // Melakukan join dengan tabel tahun_ajaran
        $query =  $this->select('jadwal.*, tahun_ajaran.tahun_ajaran, guru.nama, kelas.nama_kelas, mapel.nama_mapel, tahun_ajaran.jenis')
            ->join('tahun_ajaran', 'jadwal.tahun_ajar_id = tahun_ajaran.id')
            ->join('guru', 'jadwal.guru_id = guru.id')
            ->join('kelas', 'jadwal.kelas_id = kelas.id')
            ->join('mapel', 'jadwal.mapel_id = mapel.id')
            ->where('jadwal.guru_id', session()->get('data')->id);

        if ($hari !== null and $hari !== "") {
            // dd($hari);
            $query = $this->where('jadwal.hari', $hari);
        }
        $query = $this->orderBy('kelas.nama_kelas', 'ASC')
            ->orderBy('tahun_ajaran.tahun_ajaran', 'DESC')
            ->get()->getResultArray();

        return $query;
    }
    public function getDataById($id)
    {
        $query = $this->select('jadwal.*, tahun_ajaran.tahun_ajaran, guru.nama, kelas.nama_kelas, mapel.nama_mapel, tahun_ajaran.jenis, wali_kelas.nama as nama_wali_kelas')
            ->join('tahun_ajaran', 'jadwal.tahun_ajar_id = tahun_ajaran.id')
            ->join('guru', 'jadwal.guru_id = guru.id')
            ->join('kelas', 'jadwal.kelas_id = kelas.id')
            ->join('guru as wali_kelas', 'kelas.wali_kelas_id = wali_kelas.id', 'left')
            ->join('mapel', 'jadwal.mapel_id = mapel.id')
            ->where('jadwal.id', $id);


        return $query->get()->getRow();
    }
    public function getDataByAbsen($id)
    {


        $query =  $this->db->table('absensi')
            ->select('absensi.*, jadwal.hari, jadwal.kelas_id, tahun_ajaran.tahun_ajaran, guru.nama, kelas.nama_kelas, mapel.nama_mapel, tahun_ajaran.jenis')
            ->join('jadwal', 'absensi.jadwal_id = jadwal.id')
            ->join('tahun_ajaran', 'jadwal.tahun_ajar_id = tahun_ajaran.id')
            ->join('guru', 'jadwal.guru_id = guru.id')
            ->join('kelas', 'jadwal.kelas_id = kelas.id')
            ->join('mapel', 'jadwal.mapel_id = mapel.id')
            ->where('absensi.id', $id);
        return $query->get()->getRow();
    }
    public function getAbsen($id)
    {
        $query = $this->db->table('absensi')->select('absensi.*')
            ->join('jadwal', 'absensi.jadwal_id = jadwal.id')
            ->where('absensi.jadwal_id', $id)->orderBy('absensi.tanggal');
        return $query->get()->getResult();
    }
}
