<?php

namespace App\Controllers;

use App\Models\Admin\PendampingModel;
use App\Models\Admin\PtModel;
use App\Models\Admin\CabangLombaModel;
use Ramsey\Uuid\Uuid;

class PendampingPendamping extends BaseController
{
    protected $pendampingModel;
    protected $ptModel;
    protected $cabanglombaModel;

    public function __construct()
    {
        $this->ptModel = new PtModel();
        $this->cabanglombaModel = new CabangLombaModel();
        $this->pendampingModel = new PendampingModel();
    }

    public function index()
    {
        $data = [

            'pendamping' => $this->pendampingModel->pendampingbypt()
        ];

        echo view('konten/pendamping/pendamping/index', $data);
    }

    public function addPendamping()
    {
        $data = [
            'pendamping' => $this->pendampingModel->getAllPendamping(),

            'pt' => $this->ptModel->getAllPt(),
        ];
        return view('konten/pendamping/pendamping/add', $data);
    }

    public function addPendampingPost()
    {
        // Validasi input
        $validationRules = [
            'kode_pendamping' => 'required',
            'nama_pendamping' => 'required',
            'pt_id' => 'required',
            'status' => 'required',
            'jk' => 'required',
            'uk_kaos' => 'required',
            'no_wa' => 'required|numeric',
            'foto' => 'max_size[foto,5120]|ext_in[foto,jpg,jpeg,png]',
        ];

        $validationMessages = [
            'kode_pendamping' => [
                'required' => 'Kolom Kode pendamping harus diisi',
            ],
            'nama_pendamping' => [
                'required' => 'Kolom Nama pendamping harus diisi',
            ],
            'pt_id' => [
                'required' => 'Kolom Perguruan Tinggi harus diisi',
            ],
            'status' => [
                'required' => 'Kolom Status harus diisi',
            ],
            'jk' => [
                'required' => 'Kolom Jenis Kelamin harus diisi',
            ],
            'uk_kaos' => [
                'required' => 'Kolom Ukuran Kaos harus diisi',
            ],
            'no_wa' => [
                'required' => 'Kolom No. WA harus diisi',
                'numeric' => 'No. WA harus berupa angka',
            ],
            'foto' => [
                'max_size' => 'Ukuran foto tidak boleh lebih dari 5.120 KB',
                'ext_in' => 'Format foto harus JPG,JPEG, PNG',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }
        // dd($validationMessages);

        // Ambil data input
        $data = [
            'id' => Uuid::uuid4()->toString(),
            'nama_pendamping' => $this->request->getPost('nama_pendamping'),
            'kode_pendamping' => $this->request->getPost('kode_pendamping'),
            'pt_id' => $this->request->getPost('pt_id'),
            'status' => $this->request->getPost('status'),
            'jk' => $this->request->getPost('jk'),
            'uk_kaos' => $this->request->getPost('uk_kaos'),
            'no_wa' => $this->request->getPost('no_wa'),
        ];

        // Upload file foto
        $Foto = $this->request->getFile('foto');
        if ($Foto && $Foto->isValid() && !$Foto->hasMoved()) {
            $namaFoto = $Foto->getRandomName();
            $Foto->move(FCPATH . '/uploads/pendamping', $namaFoto);
            $data['foto'] = $namaFoto;
        }

        // Insert data ke database
        $this->pendampingModel->insert($data);

        // Set flashdata dan redirect
        session()->setFlashdata('primary', 'Data berhasil disimpan.');
        return redirect()->to('/pendamping/pendamping');
    }

    public function editPendamping($id)
    {
        $pendamping = $this->pendampingModel->find($id);
        if (!$pendamping) {
            throw new \RuntimeException('Data pendamping tidak ditemukan');
        }

        $data = [
            'pendamping' => $pendamping,

            'pt' => $this->ptModel->getAllPt(),
        ];

        return view('konten/pendamping/pendamping/edit', $data);
    }

    public function editPendampingPost($id)
    {
        $pendamping = $this->pendampingModel->find($id);
        if (!$pendamping) {
            throw new \RuntimeException('Data pendamping tidak ditemukan');
        }

        $validationRules = [
            'kode_pendamping' => 'required',
            'nama_pendamping' => 'required',
            'pt_id' => 'required',


        ];

        $validationMessages = [
            'kode_pendamping' => [
                'required' => 'Kolom Kode pendamping harus diisi',
            ],
            'nama_pendamping' => [
                'required' => 'Kolom Nama pendamping harus diisi',
            ],
            'pt_id' => [
                'required' => 'Kolom Perguruan Tinggi harus diisi',
            ],


        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => $id,
            'nama_pendamping' => $this->request->getPost('nama_pendamping'),
            'pt_id' => $this->request->getPost('pt_id'),


        ];

        $this->pendampingModel->update($id, $data);
        session()->setFlashdata('primary', 'Data berhasil diupdate.');
        return redirect()->to('/pendamping/pendamping');
    }
    public function deletePendamping($id)
    {
        // Check if the record exists
        $pendamping = $this->pendampingModel->find($id);
        if ($pendamping) {
            // Delete the record
            $this->pendampingModel->deleteById($id);
            return redirect()->to('/pendamping/pendamping')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/pendamping/pendamping')->with('danger', 'Record not found');
        }
    }
}
