<?php

namespace App\Controllers;

use App\Models\Admin\PtModel;
use App\Models\Admin\SertifikatModel;
use App\Models\Admin\ProdiModel;
use Ramsey\Uuid\Uuid;
use App\Models\Admin\PesertaModel;
use App\Models\Admin\CabangLombaModel;

class AdminSertifikat extends BaseController
{
    protected $ptModel;
    protected $prodiModel;
    protected $pesertaModel;
    protected $sertifikatModel;
    protected $cabanglombaModel;
    public function __construct()
    {
        $this->ptModel = new PtModel();
        $this->sertifikatModel = new SertifikatModel();
        $this->prodiModel = new ProdiModel();
        $this->pesertaModel = new PesertaModel();
        $this->cabanglombaModel = new CabangLombaModel();
    }
    public function Sertifikat()
    {
        $data = [
            'sertifikat' => $this->sertifikatModel->sertifikat()
        ];
        // dd($data);
        echo view('konten/admin/sertifikat/index', $data);
    }

    public function addSertifikat()
    {
        $data = [
            'sertifikat' => $this->sertifikatModel->getAllSertifikat(),
            'pt' => $this->ptModel->getAllPt(),
            'prodi' => $this->prodiModel->getAllProdi(),
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'cabang_perlombaan' => $this->cabanglombaModel->getAllLomba(),
            'errors' => session('errors'), // Add validation errors to data
        ];
        // dd($data);

        return view('konten/admin/sertifikat/add', $data);
    }

    public function addSertifikatPost()
    {
        $validationRules = [
            'peserta_id' => 'required',
            'kode_peserta' => 'required',
            'pt_id' => 'required',
            'prodi_id' => 'required',
            'file_sertifikat' => 'uploaded[file_sertifikat]|max_size[file_sertifikat,5120]|ext_in[file_sertifikat,pdf,doc,docx,png]',
            'cabang_perlombaan_id' => 'required',
        ];

        $validationMessages = [
            'peserta_id' => ['required' => 'Kolom Nama Peserta/Pendamping Harus diisi'],
            'kode_peserta' => ['required' => 'Kolom NIM/NIP Harus diisi'],
            'pt_id' => ['required' => 'Kolom Perguruan Tinggi Harus diisi'],
            'prodi_id' => ['required' => 'Kolom Nama Program Studi Harus diisi'],
            'file_sertifikat' => [
                'uploaded' => 'Kolom file_sertifikat Harus diisi',
                'max_size' => 'Ukuran file file_sertifikat tidak boleh lebih dari 5120 KB',
                'ext_in' => 'Format file file_sertifikat harus PDF, DOC, DOCX, PNG',
            ],
            'cabang_perlombaan_id' => ['required' => 'Kolom Nama Perlombaan Harus diisi'],
        ];

        $validation = $this->validate($validationRules, $validationMessages);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $data = [
            'id' => Uuid::uuid4()->toString(),
            'peserta_id' => $this->request->getPost('peserta_id'),
            'kode_peserta' => $this->request->getPost('kode_peserta'),
            'pt_id' => $this->request->getPost('pt_id'),
            'prodi_id' => $this->request->getPost('prodi_id'),
            'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
        ];

        // Handle file uploads
        $file_sertifikat = $this->request->getFile('file_sertifikat');
        if ($file_sertifikat && $file_sertifikat->isValid() && !$file_sertifikat->hasMoved()) {
            $namafile_sertifikat = $file_sertifikat->getRandomName();
            $file_sertifikat->move(FCPATH . '/uploads/sertifikat', $namafile_sertifikat);
            $data['file_sertifikat'] = $namafile_sertifikat;
        }

        $this->sertifikatModel->insert($data);
        session()->setFlashdata('primary', 'Data berhasil disimpan.');
        return redirect()->to('/admin/sertifikat');
    }

    public function editSertifikat($id)
    {$sertifikat = $this->sertifikatModel->find($id);
        if (!$sertifikat) {
            throw new \RuntimeException('Data sertifikat tidak ditemukan');
        }

        $data = [
            'sertifikat' => $sertifikat,
            'pt' => $this->ptModel->getAllPt(),
            'prodi' => $this->prodiModel->getAllProdi(),
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'cabang_perlombaan' => $this->cabanglombaModel->getAllLomba(),
            'errors' => session('errors'), // Add validation errors to data
        ];
        // dd($data);

        return view('konten/admin/sertifikat/edit', $data);
    }
    public function editSertifikatPost($id)
    {
        $validationRules = [
            'peserta_id' => 'required',
            'kode_peserta' => 'required',
            'pt_id' => 'required',
            'prodi_id' => 'required',
            'file_sertifikat' => 'max_size[file_sertifikat,5120]|ext_in[file_sertifikat,pdf,doc,docx,png]',
            'cabang_perlombaan_id' => 'required',
        ];

        $validationMessages = [
            'peserta_id' => ['required' => 'Kolom Nama Peserta/Pendamping Harus diisi'],
            'kode_peserta' => ['required' => 'Kolom NIM/NIP Harus diisi'],
            'pt_id' => ['required' => 'Kolom Perguruan Tinggi Harus diisi'],
            'prodi_id' => ['required' => 'Kolom Nama Program Studi Harus diisi'],
            'file_sertifikat' => [
                'max_size' => 'Ukuran file file_sertifikat tidak boleh lebih dari 5120 KB',
                'ext_in' => 'Format file file_sertifikat harus PDF, DOC, DOCX, PNG',
            ],
            'cabang_perlombaan_id' => ['required' => 'Kolom Nama Perlombaan Harus diisi'],
        ];

        $validation = $this->validate($validationRules, $validationMessages);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $data = [
            'peserta_id' => $this->request->getPost('peserta_id'),
            'kode_peserta' => $this->request->getPost('kode_peserta'),
            'pt_id' => $this->request->getPost('pt_id'),
            'prodi_id' => $this->request->getPost('prodi_id'),
            'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
        ];

        // Handle file uploads
        $file_sertifikat = $this->request->getFile('file_sertifikat');
        if ($file_sertifikat && $file_sertifikat->isValid() && !$file_sertifikat->hasMoved()) {
            $namafile_sertifikat = $file_sertifikat->getRandomName();
            $file_sertifikat->move(FCPATH . '/uploads/sertifikat', $namafile_sertifikat);
            $data['file_sertifikat'] = $namafile_sertifikat;
        }

        $this->sertifikatModel->update($id, $data);
        session()->setFlashdata('primary', 'Data berhasil diupdate.');
        return redirect()->to('/admin/sertifikat');
    }



    public function deleteSertifikat($id)
    {
        // Check if the record exists
        $pt = $this->sertifikatModel->find($id);
        if ($pt) {
            // Delete the record
            $this->sertifikatModel->deleteById($id);
            return redirect()->to('/admin/sertifikat')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/admin/sertifikat')->with('danger', 'Record not found');
        }
    }
}
