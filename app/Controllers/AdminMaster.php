<?php

namespace App\Controllers;

use App\Models\Admin\PtModel; // Corrected namespace
use App\Models\Admin\CabangLombaModel;
use App\Models\Admin\ProdiModel;
use App\Models\Admin\PesertaModel;
use App\Models\Admin\KelompokModel;
use Ramsey\Uuid\Uuid;

class AdminMaster extends BaseController
{
    protected $ptModel;
    protected $cabanglombaModel;
    protected $prodiModel;
    protected $pesertaModel;
    protected $kelompokModel;


    public function __construct()
    {
        // Initialize Model
        $this->ptModel = new PtModel();

        $this->cabanglombaModel = new CabangLombaModel();
        $this->prodiModel = new ProdiModel();
        $this->pesertaModel = new PesertaModel();
        $this->kelompokModel = new KelompokModel();
    }

    // Index view PT
    public function pt()
    {
        $data = [
            'pt' => $this->ptModel->getAllPt()
        ];

        echo view('konten/admin/perguruantinggi/index', $data);
    }

    public function addPt()
    {

        $data = [
            'pt'     => $this->ptModel->getAllpt(),
            'errors'    => session('errors'), // Tambahkan validation ke data
        ];
        return view('konten/admin/perguruantinggi/add', $data);
    }
    public function addPtPost()
    {
        $validationRules = [
            'kode_pt' => 'required',
            'nama_pt' => 'required',
            'email_pt' => 'valid_email',
            'asal_negara' => 'required',
            'asal_prov' => 'required',
        ];

        $validationMessages = [
            'kode_pt' => [
                'required' => 'Kolom Kode Prodi Harus diisi',
            ],
            'nama_pt' => [
                'required' => 'Kolom Nama Prodi Harus diisi',
            ],
            'email_pt' => [
                'valid_email' => 'Format email tidak valid',
            ],
            'asal_prov' => [
                'required' => 'Kolom Kode Prodi Harus diisi',
            ],
            'asal_negara' => [
                'required' => 'Kolom Nama Prodi Harus diisi',
            ]
        ];
        $validation = $this->validate($validationRules, $validationMessages);
        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }
        // Selanjutnya, Anda dapat menyusun array data seperti yang Anda lakukan sebelumnya
        $data = [
            'id' => Uuid::uuid4()->toString(),
            'nama_pt' => $this->request->getPost('nama_pt'),
            'kode_pt' =>  $this->request->getPost('kode_pt'),
            'email_pt' => $this->request->getPost('email_pt'),
            'asal_prov' =>  $this->request->getPost('asal_prov'),
            'asal_negara' => $this->request->getPost('asal_negara'),
        ];
        $this->ptModel->insertData($data, false);
        session()->setFlashdata('primary', 'Data berhasil disimpan.');
        return redirect()->to('admin/master/perguruantinggi');
    }

    public function editPt($id)
    {
        $data = [
            'pt' => $this->ptModel->getPt($id),
            'errors' => session('errors'), // Tambahkan validation ke data
        ];

        return view('konten/admin/perguruantinggi/edit', $data);
    }

    public function editPtPost($id)
    {
        $validationRules = [

            'nama_pt' => 'required',
            'email_pt' => 'valid_email',
            'asal_negara' => 'required',
            'asal_prov' => 'required',
        ];

        $validationMessages = [

            'nama_pt' => [
                'required' => 'Kolom Nama Prodi Harus diisi',
            ],
            'email_pt' => [
                'valid_email' => 'Format email tidak valid',
            ],
            'asal_prov' => [
                'required' => 'Kolom Kode Prodi Harus diisi',
            ],
            'asal_negara' => [
                'required' => 'Kolom Nama Prodi Harus diisi',
            ]
        ];
        if (!$this->validate($validationRules, $validationMessages)) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Data yang diupdate
        $data = [

            'nama_pt' => $this->request->getPost('nama_pt'),
            'email_pt' => $this->request->getPost('email_pt'),
            'asal_prov' => $this->request->getPost('asal_prov'),
            'asal_negara' => $this->request->getPost('asal_negara'),
        ];

        $this->ptModel->update($id, $data);

        session()->setFlashdata('primary', 'Data berhasil disimpan.');

        return redirect()->to('/admin/master/perguruantinggi');
    }


    public function deletePt($id)
    {
        // Check if the record exists
        $pt = $this->ptModel->find($id);
        if ($pt) {
            // Delete the record
            $this->ptModel->deleteById($id);
            return redirect()->to('/admin/master/perguruantinggi')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/admin/master/perguruantinggi')->with('danger', 'Record not found');
        }
    }


    //cabang lomba model
    public function cabanglomba()
    {
        $data = [
            'cabang_perlombaan' => $this->cabanglombaModel->getAlllomba()
        ];

        echo view('konten/admin/lomba/index', $data);
    }

    public function addcabanglomba()
    {

        $data = [
            'cabang_perlombaan'     => $this->cabanglombaModel->getAlllomba(),
            'errors'    => session('errors'), // Tambahkan validation ke data
        ];
        return view('konten/admin/lomba/add', $data);
    }

    public function addCabangLombaPost()
    {
        $validationRules = [
            'kode_perlombaan' => 'required',
            'nama_perlombaan' => 'required',
        ];

        $validationMessages = [
            'kode_perlombaan' => [
                'required' => 'Kolom Kode Prodi Harus diisi',
            ],
            'nama_perlombaan' => [
                'required' => 'Kolom Nama Prodi Harus diisi',
            ],
        ];
        $validation = $this->validate($validationRules, $validationMessages);
        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }
        // Selanjutnya, Anda dapat menyusun array data seperti yang Anda lakukan sebelumnya
        $data = [
            'id' => Uuid::uuid4()->toString(),
            'nama_perlombaan' => $this->request->getPost('nama_perlombaan'),
            'kode_perlombaan' =>  $this->request->getPost('kode_perlombaan'),

        ];
        $this->cabanglombaModel->insertData($data, false);
        session()->setFlashdata('primary', 'Data berhasil disimpan.');
        return redirect()->to('admin/master/lomba');
    }

    public function editCabangLomba($id)
    {
        $data = [
            'cabang_perlombaan' => $this->cabanglombaModel->getLomba($id),
            'errors' => session('errors'), // Tambahkan validation ke data
        ];
        return view('konten/admin/lomba/edit', $data);
    }

    public function editCabangLombaPost($id)
    {
        $validationRules = [

            'nama_perlombaan' => 'required',

        ];

        $validationMessages = [

            'nama_perlombaan' => [
                'required' => 'Kolom Nama Prodi Harus diisi',
            ],

        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Data yang diupdate
        $data = [

            'nama_perlombaan' => $this->request->getPost('nama_perlombaan'),

        ];

        $this->cabanglombaModel->update($id, $data);

        session()->setFlashdata('primary', 'Data berhasil disimpan.');

        return redirect()->to('/admin/master/lomba');
    }


    public function deleteCabangLomba($id)
    {
        // Check if the record exists
        $pt = $this->cabanglombaModel->find($id);
        if ($pt) {
            // Delete the record
            $this->cabanglombaModel->deleteById($id);
            return redirect()->to('/admin/master/lomba')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/admin/master/lomba')->with('danger', 'Record not found');
        }
    }

    //PRODI
    public function prodi()
    {
        $data = [
            'prodi' => $this->prodiModel->getAllProdiWithpt(),
            'errors' => session('errors'), // Add validation errors to data
        ];
        // dd($data);
        // Load view dengan data yang sudah diambil

        return view('konten/admin/prodi/index', $data);
    }


    public function addProdi()
    {
        $data = [
            'prodi' => $this->prodiModel->getAllProdi(),
            'pt' => $this->ptModel->getAllPt(),
            'errors' => session('errors'), // Add validation errors to data
        ];
        // dd($data);

        return view('konten/admin/prodi/add', $data);
    }

    public function addProdiPost()
    {
        $validationRules = [
            'kode_prodi' => 'required',
            'nama_prodi' => 'required',
            'pt_id' => 'required',
        ];

        $validationMessages = [
            'kode_prodi' => [
                'required' => 'Kolom Kode Prodi Harus diisi',
            ],
            'nama_prodi' => [
                'required' => 'Kolom Nama Prodi Harus diisi',
            ],
            'pt_id' => [
                'required' => 'Kolom PT Harus diisi',
            ],
        ];

        $validation = $this->validate($validationRules, $validationMessages);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $data = [
            'id' => Uuid::uuid4()->toString(),
            'kode_prodi' => $this->request->getPost('kode_prodi'),
            'nama_prodi' => $this->request->getPost('nama_prodi'),
            'pt_id' => $this->request->getPost('pt_id'),
        ];

        $this->prodiModel->insert($data);
        session()->setFlashdata('primary', 'Data berhasil disimpan.');
        return redirect()->to('/admin/master/prodi');
    }

    public function editProdi($id)
    {
        $data = [
            'prodi' => $this->prodiModel->getProdi($id),
            'pt' => $this->ptModel->getAllPt(),
            'errors' => session('errors'), // Tambahkan validation ke data
        ];
        return view('konten/admin/prodi/edit', $data);
    }

    public function editProdiPost($id)
    {
        $validationRules = [

            'nama_prodi' => 'required',
            'pt_id' => 'required',
        ];

        $validationMessages = [

            'nama_prodi' => [
                'required' => 'Kolom Nama Prodi Harus diisi',
            ],
            'pt_id' => [
                'required' => 'Kolom Nama Prodi Harus diisi',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Data yang diupdate
        $data = [

            'nama_prodi' => $this->request->getPost('nama_prodi'),
            'pt_id' => $this->request->getPost('pt_id'),
        ];

        $this->prodiModel->updateData($id, $data);

        session()->setFlashdata('primary', 'Data berhasil disimpan.');

        return redirect()->to('/admin/master/prodi');
    }



    public function deleteProdi($id)
    {
        // Check if the record exists
        $pt = $this->prodiModel->find($id);
        if ($pt) {
            // Delete the record
            $this->prodiModel->deleteById($id);
            return redirect()->to('/admin/master/prodi')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/admin/master/prodi')->with('danger', 'Record not found');
        }
    }




    //PESERTA
    public function peserta()
    {
        $data = [
            'peserta' => $this->pesertaModel->pesertabyjoinsemua()
        ];
        // dd($data);
        echo view('konten/admin/peserta/index', $data);
    }

    public function pesertaview($id)
    {
        $data['peserta'] = $this->pesertaModel->getPesertaById($id);

    if (empty($data['peserta'])) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Peserta dengan ID ' . $id . ' tidak ditemukan.');
    }

    return view('konten/admin/peserta/view', $data);
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

        return view('konten/admin/peserta/add', $data);
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
        return redirect()->to('admin/peserta');
        
    }



    public function editPeserta($id)
    {
        $data = [
            'peserta' => $this->pesertaModel->getPeserta($id),
            'pt' => $this->ptModel->getAllPt(),
            'prodi' => $this->prodiModel->getAllProdi(),

            'errors' => session('errors'), // Add validation errors to data
        ];
        return view('konten/admin/peserta/edit', $data);
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
        return redirect()->to('admin/peserta');
    }


    public function deletePeserta($id)
    {
        // Check if the record exists
        $pt = $this->pesertaModel->find($id);
        if ($pt) {
            // Delete the record
            $this->pesertaModel->deleteById($id);
            return redirect()->to('/admin/peserta')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/admin/peserta')->with('danger', 'Record not found');
        }
    }
}
