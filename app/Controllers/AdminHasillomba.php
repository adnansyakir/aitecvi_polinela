<?php

namespace App\Controllers;

use App\Models\Admin\HasilLombaModel;
use App\Models\Admin\PendaftaranModel;
use App\Models\Admin\CabangLombaModel;
use Ramsey\Uuid\Uuid;

class AdminHasillomba extends BaseController
{
    protected $HasilLombaModel;
    protected $PendaftaranModel;
    protected $cabanglombaModel;

    public function __construct()
    {
        $this->PendaftaranModel = new PendaftaranModel();
        $this->cabanglombaModel = new CabangLombaModel();
        $this->HasilLombaModel = new HasilLombaModel();
    }

    public function index()
    {
        $cabangPerlombaanId = $this->request->getGet('cabang_perlombaan_id');

        $data = [
            'hasillomba' => $this->HasilLombaModel->Hasillombabypendaftaran($cabangPerlombaanId),
            'cabang_perlombaan' => $this->cabanglombaModel->findAll(),
            'current_cabang_perlombaan_id' => $cabangPerlombaanId // Pass the current filter value
        ];

        echo view('konten/admin/hasillomba/index', $data);
    }


    public function add()
    {
        $data = [
            'pendaftaran' => $this->PendaftaranModel->findAll(),
            'cabang_perlombaan' => $this->cabanglombaModel->findAll()
        ];
        return view('konten/admin/hasillomba/add', $data);
    }

    public function store()
    {
        $validationRules = [
            'pendaftaran_id' => 'required',
            'cabang_perlombaan_id' => 'required',
            'nilai_juri1' => 'required|numeric',
            'nilai_juri2' => 'required|numeric',
            'nilai_juri3' => 'required|numeric',
            'catatan_juri1' => 'uploaded[catatan_juri1]|max_size[catatan_juri1,2048]',
            'catatan_juri2' => 'uploaded[catatan_juri2]|max_size[catatan_juri2,2048]',
            'catatan_juri3' => 'uploaded[catatan_juri3]|max_size[catatan_juri3,2048]',
            'keterangan' => 'required'
        ];
        $validationMessages = [
            // Validation messages here
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file uploads
        $catatanJuri1 = $this->request->getFile('catatan_juri1');
        $catatanJuri2 = $this->request->getFile('catatan_juri2');
        $catatanJuri3 = $this->request->getFile('catatan_juri3');

        $nilaiJuri1 = (float)$this->request->getPost('nilai_juri1');
        $nilaiJuri2 = (float)$this->request->getPost('nilai_juri2');
        $nilaiJuri3 = (float)$this->request->getPost('nilai_juri3');
        $totalNilai = $nilaiJuri1 + $nilaiJuri2 + $nilaiJuri3;
        $hasilAkhir = $totalNilai / 3;

        $data = [
            'id' => Uuid::uuid4()->toString(),
            'pendaftaran_id' => $this->request->getPost('pendaftaran_id'),
            'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
            'nilai_juri1' => $nilaiJuri1,
            'nilai_juri2' => $nilaiJuri2,
            'nilai_juri3' => $nilaiJuri3,
            'keterangan' => $this->request->getPost('keterangan'),
            'total_nilai' => $totalNilai,
            'hasil_akhir' => $hasilAkhir
        ];

        // Move files if they are valid
        foreach (['catatan_juri1', 'catatan_juri2', 'catatan_juri3'] as $field) {
            $file = $this->request->getFile($field);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $filename = $file->getRandomName();
                $file->move(FCPATH . '/uploads/catatan', $filename);
                $data[$field] = $filename;
            }
        }

        $this->HasilLombaModel->insert($data);
        session()->setFlashdata('primary', 'Data berhasil disimpan.');
        return redirect()->to('/admin/hasillomba');
    }



    public function edit($id)
    {
        $hasillomba = $this->HasilLombaModel->find($id);
        if (!$hasillomba) {
            throw new \RuntimeException('Data hasil lomba tidak ditemukan');
        }

        $data = [
            'hasillomba' => $hasillomba,
            'pendaftaran' => $this->PendaftaranModel->findAll(),
            'cabang_perlombaan' => $this->cabanglombaModel->findAll()
        ];

        return view('konten/admin/hasillomba/edit', $data);
    }

    public function update($id)
    {
        $hasillomba = $this->HasilLombaModel->find($id);
        if (!$hasillomba) {
            throw new \RuntimeException('Data hasil lomba tidak ditemukan');
        }

        $validationRules = [
            'pendaftaran_id' => 'required',
            'cabang_perlombaan_id' => 'required',
            'nilai_juri1' => 'required|numeric',
            'nilai_juri2' => 'required|numeric',
            'nilai_juri3' => 'required|numeric',
            'catatan_juri1' => 'max_size[catatan_juri1,2048]',
            'catatan_juri2' => 'max_size[catatan_juri2,2048]',
            'catatan_juri3' => 'max_size[catatan_juri3,2048]',
            'keterangan' => 'required'
        ];
        $validationMessages = [
            // Validation messages here
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $nilaiJuri1 = (float)$this->request->getPost('nilai_juri1');
        $nilaiJuri2 = (float)$this->request->getPost('nilai_juri2');
        $nilaiJuri3 = (float)$this->request->getPost('nilai_juri3');
        $totalNilai = $nilaiJuri1 + $nilaiJuri2 + $nilaiJuri3;
        $hasilAkhir = $totalNilai / 3;

        $data = [
            'pendaftaran_id' => $this->request->getPost('pendaftaran_id'),
            'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
            'nilai_juri1' => $nilaiJuri1,
            'nilai_juri2' => $nilaiJuri2,
            'nilai_juri3' => $nilaiJuri3,
            'keterangan' => $this->request->getPost('keterangan'),
            'total_nilai' => $totalNilai,
            'hasil_akhir' => $hasilAkhir
        ];

        foreach (['catatan_juri1', 'catatan_juri2', 'catatan_juri3'] as $field) {
            $file = $this->request->getFile($field);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $filename = $file->getRandomName();
                $file->move(FCPATH . '/uploads/catatan', $filename);
                $data[$field] = $filename;
            } else {
                $data[$field] = $hasillomba[$field];
            }
        }

        $this->HasilLombaModel->update($id, $data);
        session()->setFlashdata('primary', 'Data berhasil diupdate.');
        return redirect()->to('/admin/hasillomba');
    }


    public function delete($id)
    {
        $hasillomba = $this->HasilLombaModel->find($id);
        if ($hasillomba) {
            $this->HasilLombaModel->delete($id);
            session()->setFlashdata('danger', 'Data berhasil dihapus.');
        } else {
            session()->setFlashdata('warning', 'Data tidak ditemukan.');
        }
        return redirect()->to('/admin/hasillomba');
    }
}
