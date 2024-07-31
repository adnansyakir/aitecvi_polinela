<?php

namespace App\Models;

use CodeIgniter\Model;

class TestModel extends Model
{
    protected $table      = 'jadwal';
    protected $primaryKey = 'id';


    public function tampilinDong()
    {
        return  $this->select('tahun_ajaran.tahun_ajaran, kelas.nama_kelas, guru.nama, mapel.nama_mapel, jadwal.id')
            ->join('tahun_ajaran', 'jadwal.tahun_ajar_id = tahun_ajaran.id')
            ->join('kelas', 'jadwal.kelas_id = kelas.id')
            ->join('guru', 'jadwal.guru_id = guru.id')
            ->join('mapel', 'jadwal.mapel_id = mapel.id')
            ->get()
            ->getResultArray();
    }

    // getResult() -> ditampilkan menggunakan object
    // getResultArray() -> ditampilkan menggunakan array

    // untuk menampilkan data yang jamak
    // datanya biasanya ditampilkan menggunakan perulangan

    // getRow()
    // getRowArray()

    // untuk menampilkan data yang tunggal

    public function getJadwalById($id)
    {
        return $this->select('jadwal.*')

            ->where('jadwal.id', $id)

            ->get()->getRow();
    }
}
