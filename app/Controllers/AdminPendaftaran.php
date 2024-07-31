<?php

namespace App\Controllers;

use App\Models\Admin\PtModel;
use App\Models\Admin\CabangLombaModel;
use App\Models\Admin\PendaftaranModel;
use App\Models\Admin\PesertaModel;
use Ramsey\Uuid\Uuid;

class Adminpendaftaran extends BaseController
{
    protected $pendaftaranModel;
    protected $ptModel;
    protected $cabanglombaModel;
    protected $pesertaModel;
    public function __construct()
    {
        $this->ptModel = new PtModel();
        $this->pesertaModel = new PesertaModel();
        $this->cabanglombaModel = new CabangLombaModel();
        $this->pendaftaranModel = new PendaftaranModel();
    }
    public function index()
    {
        $data = [
            'pendaftaran' => $this->pendaftaranModel->PendaftaranbyPeserta()
        ];

        echo view('konten/admin/pendaftaran/index', $data);
    }
    public function addPendaftaran()
    {
        $data = [
            'pendaftaran' => $this->pendaftaranModel->getAllPendaftaran(),
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'cabang_perlombaan' => $this->cabanglombaModel->getAllLomba(),
            'pt' => $this->ptModel->getAllPt(),
        ];
        return view('konten/admin/pendaftaran/add', $data);
    }

    public function addPendaftaranPost()
    {
        $validationRules = [
            
            'pt_id' => 'required',
            'cabang_perlombaan_id' => 'required',
            'nama_team' => 'required',
            'peserta_id' => 'required',
            'kode_peserta' => 'required',
            'keterangan' => 'required',
        ];

        $validationMessages = [
            
            'pt_id' => [
                'required' => 'Kolom Perguruan Tinggi harus diisi',
            ],
            'cabang_perlombaan_id' => [
                'required' => 'Kolom Nama Perlombaan harus diisi',
            ],
            'nama_team' => [
                'required' => 'Kolom Kode pendaftaran harus diisi',
            ],
            'peserta_id' => [
                'required' => 'Kolom Kode pendaftaran harus diisi',
            ],
            'kode_peserta' => [
                'required' => 'Kolom Nama pendaftaran harus diisi',
            ],
            'keterangan' => [
                'required' => 'Kolom Keterangan harus diisi',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => Uuid::uuid4()->toString(),
            'pt_id' => $this->request->getPost('pt_id'),
            'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
            'nama_team' => $this->request->getPost('nama_team'),
            'peserta_id' => $this->request->getPost('peserta_id'),
            'kode_peserta' => $this->request->getPost('kode_peserta'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->pendaftaranModel->insert($data);
        session()->setFlashdata('primary', 'Data berhasil disimpan.');
        return redirect()->to('/admin/pendaftaran');
    }

    public function editPendaftaran($id)
    {
        $pendaftaran = $this->pendaftaranModel->find($id);
        if (!$pendaftaran) {
            throw new \RuntimeException('Data pendaftaran tidak ditemukan');
        }

        $data = [
            'pendaftaran' => $pendaftaran,
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'cabang_perlombaan' => $this->cabanglombaModel->getAllLomba(),
            'pt' => $this->ptModel->getAllPt(),
        ];

        return view('konten/admin/pendaftaran/edit', $data);
    }

    public function editPendaftaranPost($id)
    {
        $pendaftaran = $this->pendaftaranModel->find($id);
        if (!$pendaftaran) {
            throw new \RuntimeException('Data pendaftaran tidak ditemukan');
        }

        $validationRules = [
            'pt_id' => 'required',
            'cabang_perlombaan_id' => 'required',
            'nama_team' => 'required',
            'peserta_id' => 'required',
            'kode_peserta' => 'required',
            'keterangan' => 'required',
        ];

        $validationMessages = [
            
            'pt_id' => [
                'required' => 'Kolom Perguruan Tinggi harus diisi',
            ],
            'cabang_perlombaan_id' => [
                'required' => 'Kolom Nama Perlombaan harus diisi',
            ],
            'nama_team' => [
                'required' => 'Kolom Kode pendaftaran harus diisi',
            ],
            'peserta_id' => [
                'required' => 'Kolom Kode pendaftaran harus diisi',
            ],
            'kode_peserta' => [
                'required' => 'Kolom Nama pendaftaran harus diisi',
            ],
            'keterangan' => [
                'required' => 'Kolom Keterangan harus diisi',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => $id,
            'pt_id' => $this->request->getPost('pt_id'),
            'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
            'nama_team' => $this->request->getPost('nama_team'),
            'peserta_id' => $this->request->getPost('peserta_id'),
            'kode_peserta' => $this->request->getPost('kode_peserta'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->pendaftaranModel->update($id, $data);
        session()->setFlashdata('primary', 'Data berhasil diupdate.');
        return redirect()->to('/admin/pendaftaran');
    }
    public function deletePendaftaran($id)
    {
        // Check if the record exists
        $pendaftaran = $this->pendaftaranModel->find($id);
        if ($pendaftaran) {
            // Delete the record
            $this->pendaftaranModel->deleteById($id);
            return redirect()->to('/admin/pendaftaran')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/admin/pendaftaran')->with('status', 'Record not found');
        }
    }
}
