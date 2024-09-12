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
    protected $session;
    protected $pesertaModel;
    protected $validation;
    protected $db;

    public function __construct()
    {
        $this->ptModel = new PtModel();
        $this->pesertaModel = new PesertaModel();
        $this->prodiModel = new ProdiModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->db = \Config\Database::connect();
    }
    //PESERTA
    public function peserta()
    {
        $pt_id = session()->get('pt_id');

        $data = [
            'peserta' => $this->pesertaModel->pesertabyjoinsemua($pt_id)
        ];
        // dd($data);
        echo view('konten/pendamping/peserta/index', $data);
    }

    public function pesertaview($id)
    {
        $data['peserta'] = $this->pesertaModel->getPesertaById($id);

    if (empty($data['peserta'])) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Peserta dengan ID ' . $id . ' tidak ditemukan.');
    }

    return view('konten/pendamping/peserta/view', $data);
    }

    public function addPeserta()
    {
        $data = [
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'pt' => $this->ptModel->getAllPt(),
            

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
            'status' => 'required',
            'jk' => 'required',
            'ukuran_kaos' => 'required',
            'pt_id' => 'required',
            'prodi' => 'required',
            'berita_acara' =>  'max_size[berita_acara,5120]|ext_in[berita_acara,pdf,doc,docx, png]',
            'ktm' => 'max_size[ktm,5120]|ext_in[ktm,pdf,doc,docx,png]',
            'foto' => 'max_size[foto,5120]|ext_in[foto,jpg,jpeg,png]',
            'no_wa' => 'required',
        ];

        $validationMessages = [
            'nama_peserta' => ['required' => 'Kolom Nama Peserta Harus diisi'],
            'kode_peserta' => ['required' => 'Kolom Kode Peserta Harus diisi'],
            'status' => ['required' => 'Kolom status peserta Harus diisi'],
            'jk' => ['required' => 'Kolom jenis kelamin peserta Harus diisi'],
            'ukuran_kaos' => ['required' => 'ukuran kaos peserta'],
            'pt_id' => ['required' => 'Kolom Perguruan Tinggi Harus diisi'],
            'prodi' => ['required' => 'Kolom Program Studi Harus diisi'],
            'ktm' => [
                'required' => 'Kolom file KTM harus diisi',
                'max_size' => 'Ukuran file KTM tidak boleh lebih dari 5120 KB',
                'ext_in' => 'Format file KTM harus PDF, DOC, DOCX, PNG',
            ],
            'berita_acara' => [
                'max_size' => 'Ukuran berita_acara tidak boleh lebih dari 5.120 KB',
                'ext_in' => 'Format berita_acara harus PDF, DOC, DOCX, PNG',
            ],
            'foto' => [
                'max_size' => 'Ukuran foto tidak boleh lebih dari 5.120 KB',
                'ext_in' => 'Format foto harus JPG,JPEG, PNG',
            ],
            'no_wa' => ['required' => 'Kolom No Whatsapp Harus diisi'],
        ];

        $validation = $this->validate($validationRules, $validationMessages);
        // dd($validation);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();
            // dd($errors);
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $data = [
            'nama_peserta' => $this->request->getPost('nama_peserta'),
            'kode_peserta' => $this->request->getPost('kode_peserta'),
            'pt_id' => $this->request->getPost('pt_id'),
            'prodi' => $this->request->getPost('prodi'),
            'status' => $this->request->getPost('status'),
            'jk' => $this->request->getPost('jk'),
            'ukuran_kaos' => strtoupper($this->request->getPost('ukuran_kaos')),
            'no_wa' => $this->request->getPost('no_wa'),
        ];

        // Handle file uploads
        // dd($data);

        $beritaAcara = $this->request->getFile('berita_acara');
        if ($beritaAcara && $beritaAcara->isValid() && !$beritaAcara->hasMoved()) {
            $namaberitaAcara = $beritaAcara->getRandomName();
            $beritaAcara->move(FCPATH . '/uploads/berita_acara', $namaberitaAcara);
            $data['berita_acara'] = $namaberitaAcara;
        }

        $Foto = $this->request->getFile('foto');
        if ($Foto && $Foto->isValid() && !$Foto->hasMoved()) {
            $namaFoto = $Foto->getRandomName();
            $Foto->move(FCPATH . '/uploads/foto', $namaFoto);
            $data['foto'] = $namaFoto;
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
            

            'errors' => session('errors'), // Add validation errors to data
        ];
        return view('konten/pendamping/peserta/edit', $data);
    }

    public function editPesertaPost($id)
    {
        $validationRules = [
            'nama_peserta' => 'required',
            'kode_peserta' => 'required',
            'status' => 'required',
            'jk' => 'required',
            'ukuran_kaos' => 'required',
            'pt_id' => 'required',
            'prodi' => 'required',
            'berita_acara' =>  'max_size[berita_acara,5120]|ext_in[berita_acara,pdf,doc,docx, png]',
            'ktm' => 'required','max_size[ktm,5120]|ext_in[ktm,pdf,doc,docx,png]',
            'foto' => 'max_size[foto,5120]|ext_in[foto,jpg,jpeg,png]',
            'no_wa' => 'required',
        ];

        $validationMessages = [
            'nama_peserta' => ['required' => 'Kolom Nama Peserta Harus diisi'],
            'kode_peserta' => ['required' => 'Kolom Kode Peserta Harus diisi'],
            'status' => ['required' => 'Kolom status peserta Harus diisi'],
            'jk' => ['required' => 'Kolom jenis kelamin peserta Harus diisi'],
            'ukuran_kaos' => ['required' => 'ukuran kaos peserta'],
            'pt_id' => ['required' => 'Kolom Perguruan Tinggi Harus diisi'],
            'prodi' => ['required' => 'Kolom Program Studi Harus diisi'],
            'ktm' => [
                'required' => 'Kolom file KTM harus diisi',
                'max_size' => 'Ukuran file KTM tidak boleh lebih dari 5120 KB',
                'ext_in' => 'Format file KTM harus PDF, DOC, DOCX, PNG',
            ],
            'berita_acara' => [
                'max_size' => 'Ukuran berita_acara tidak boleh lebih dari 5.120 KB',
                'ext_in' => 'Format berita_acara harus PDF, DOC, DOCX, PNG',
            ],
            'foto' => [
                'max_size' => 'Ukuran foto tidak boleh lebih dari 5.120 KB',
                'ext_in' => 'Format foto harus JPG,JPEG, PNG',
            ],
            'no_wa' => ['required' => 'Kolom No Whatsapp Harus diisi'],
        ];

        $validation = $this->validate($validationRules, $validationMessages);
        // dd($validation);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();
            // dd($errors);
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $data = [
            'nama_peserta' => $this->request->getPost('nama_peserta'),
            'kode_peserta' => $this->request->getPost('kode_peserta'),
            'pt_id' => $this->request->getPost('pt_id'),
            'prodi' => $this->request->getPost('prodi'),
            'status' => $this->request->getPost('status'),
            'jk' => $this->request->getPost('jk'),
            'ukuran_kaos' => strtoupper($this->request->getPost('ukuran_kaos')),
            'no_wa' => $this->request->getPost('no_wa'),
        ];

        // Handle file uploads
        // dd($data);

        $beritaAcara = $this->request->getFile('berita_acara');
        if ($beritaAcara && $beritaAcara->isValid() && !$beritaAcara->hasMoved()) {
            $namaberitaAcara = $beritaAcara->getRandomName();
            $beritaAcara->move(FCPATH . '/uploads/berita_acara', $namaberitaAcara);
            $data['berita_acara'] = $namaberitaAcara;
        }

        $Foto = $this->request->getFile('foto');
        if ($Foto && $Foto->isValid() && !$Foto->hasMoved()) {
            $namaFoto = $Foto->getRandomName();
            $Foto->move(FCPATH . '/uploads/foto', $namaFoto);
            $data['foto'] = $namaFoto;
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
