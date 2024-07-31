<?php

namespace App\Controllers;

use App\Models\Admin\PtModel;
use App\Models\Pendamping\PesertaModel;
use App\Models\Pendamping\ProdiModel;
use Ramsey\Uuid\Uuid;

class PendampingPeserta extends BaseController
{
    protected $ptModel;
    protected $prodiModel;
    protected $pesertaModel;
    public function __construct()
    {
        $this->ptModel = new PtModel();
        $this->pesertaModel = new PesertaModel();
        $this->prodiModel = new ProdiModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->db = \Config\Database::connect();
    }
    public function peserta()
    {
        // Retrieve pt_id from session
        $pt_id = session()->get('pt_id');
        // dd($pt_id);
        // Get peserta data filtered by pt_id
        $data = [
            'peserta' => $this->pesertaModel->pesertabyjoinsemua($pt_id)
        ];

        // Load the view with the data
        echo view('konten/pendamping/peserta/index', $data);
    }

    public function addPeserta()
    {
        $data = [
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'pt' => $this->ptModel->getAllPt(),
            'prodi' => $this->prodiModel->getAllProdi(),

            'errors' => session('errors'), // Add validation errors to data
        ];
        // dd($data);

        return view('konten/pendamping/peserta/add', $data);
    }

    public function addPesertaPost()
    {
        $validationRules = [
            'nama_peserta' => 'required',
            'kode_peserta' => 'required',
            'pt_id' => 'required',
            'prodi_id' => 'required',

            'file_surat_tugas' =>  'max_size[file_surat_tugas,5120]|ext_in[file_surat_tugas,pdf,doc,docx, png]',
            'ktm' => 'max_size[ktm,5120]|ext_in[ktm,pdf,doc,docx,png]',
            'no_wa' => 'required',
        ];

        $validationMessages = [
            'nama_peserta' => ['required' => 'Kolom Nama Peserta Harus diisi'],
            'kode_peserta' => ['required' => 'Kolom Kode Peserta Harus diisi'],
            'pt_id' => ['required' => 'Kolom Perguruan Tinggi Harus diisi'],
            'prodi_id' => ['required' => 'Kolom Program Studi Harus diisi'],

            'ktm' => [
                'max_size' => 'Ukuran file KTM tidak boleh lebih dari 5120 KB',
                'ext_in' => 'Format file KTM harus PDF, DOC, DOCX, PNG',
            ],
            'file_surat_tugas' => [
                'max_size' => 'Ukuran file Surat Tugas tidak boleh lebih dari 5.120 KB',
                'ext_in' => 'Format file Surat Tugas harus PDF, DOC, DOCX, PNG',
            ],
            'no_wa' => ['required' => 'Kolom No Whatsapp Harus diisi'],
        ];

        $validation = $this->validate($validationRules, $validationMessages);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $data = [
            'nama_peserta' => $this->request->getPost('nama_peserta'),
            'kode_peserta' => $this->request->getPost('kode_peserta'),
            'pt_id' => $this->request->getPost('pt_id'),
            'prodi_id' => $this->request->getPost('prodi_id'),

            'no_wa' => $this->request->getPost('no_wa'),
        ];

        // Handle file uploads
        $suratTugas = $this->request->getFile('file_surat_tugas');
        if ($suratTugas && $suratTugas->isValid() && !$suratTugas->hasMoved()) {
            $namasuratTugas = $suratTugas->getRandomName();
            $suratTugas->move(FCPATH . '/uploads/surat_tugas', $namasuratTugas);
            $data['file_surat_tugas'] = $namasuratTugas;
        }

        $KTM = $this->request->getFile('ktm');
        if ($KTM && $KTM->isValid() && !$KTM->hasMoved()) {
            $namaKTM = $KTM->getRandomName();
            $KTM->move(FCPATH . '/uploads/ktm', $namaKTM);
            $data['ktm'] = $namaKTM;
        }

        $this->pesertaModel->insert($data);
        session()->setFlashdata('primary', 'Data berhasil disimpan.');
        return redirect()->to('pendamping/peserta');
    }



    public function editPeserta($id)
    {
        $data = [
            'peserta' => $this->pesertaModel->getPeserta($id),
            'pt' => $this->ptModel->getAllPt(),
            'prodi' => $this->prodiModel->getAllProdi(),
            'errors' => session('errors'), // Add validation errors to data
        ];
        return view('konten/pendamping/peserta/edit', $data);
    }

    public function editPesertaPost($id)
    {
        $validationRules = [
            'nama_peserta' => 'required',
            'kode_peserta' => 'required',
            'pt_id' => 'required',
            'prodi_id' => 'required',

            'file_surat_tugas' => 'max_size[file_surat_tugas,5120]|ext_in[file_surat_tugas,pdf,doc,docx,png]',
            'ktm' => 'max_size[ktm,5120]|ext_in[ktm,pdf,doc,docx,png]',
            'no_wa' => 'required',
        ];

        $validationMessages = [
            'nama_peserta' => ['required' => 'Kolom Nama Peserta Harus diisi'],
            'kode_peserta' => ['required' => 'Kolom Kode Peserta Harus diisi'],
            'pt_id' => ['required' => 'Kolom Perguruan Tinggi Harus diisi'],
            'prodi_id' => ['required' => 'Kolom Program Studi Harus diisi'],

            'ktm' => [
                'max_size' => 'Ukuran file KTM tidak boleh lebih dari 5120 KB',
                'ext_in' => 'Format file KTM harus PDF, DOC, DOCX, PNG',
            ],
            'file_surat_tugas' => [
                'max_size' => 'Ukuran file Surat Tugas tidak boleh lebih dari 5120 KB',
                'ext_in' => 'Format file Surat Tugas harus PDF, DOC, DOCX, PNG',
            ],
            'no_wa' => ['required' => 'Kolom No Whatsapp Harus diisi'],
        ];

        $validation = $this->validate($validationRules, $validationMessages);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $data = [
            'nama_peserta' => $this->request->getPost('nama_peserta'),
            'kode_peserta' => $this->request->getPost('kode_peserta'),
            'pt_id' => $this->request->getPost('pt_id'),
            'prodi_id' => $this->request->getPost('prodi_id'),

            'no_wa' => $this->request->getPost('no_wa'),
        ];

        // Handle file uploads
        $suratTugas = $this->request->getFile('file_surat_tugas');
        if ($suratTugas && $suratTugas->isValid() && !$suratTugas->hasMoved()) {
            $namasuratTugas = $suratTugas->getRandomName();
            $suratTugas->move(FCPATH . '/uploads/surat_tugas', $namasuratTugas);
            $data['file_surat_tugas'] = $namasuratTugas;
        }

        $KTM = $this->request->getFile('ktm');
        if ($KTM && $KTM->isValid() && !$KTM->hasMoved()) {
            $namaKTM = $KTM->getRandomName();
            $KTM->move(FCPATH . '/uploads/ktm', $namaKTM);
            $data['ktm'] = $namaKTM;
        }

        $this->pesertaModel->update($id, $data);
        session()->setFlashdata('primary', 'Data berhasil diupdate.');
        return redirect()->to('pendamping/peserta');
    }


    public function deletePeserta($id)
    {
        // Check if the record exists
        $pt = $this->pesertaModel->find($id);
        if ($pt) {
            // Delete the record
            $this->pesertaModel->deleteById($id);
            return redirect()->to('/pendamping/peserta')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/pendamping/peserta')->with('danger', 'Record not found');
        }
    }
}
