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
            'errors' => session('errors'), // Add validation errors to data
        ];
        // dd($data);

        return view('konten/admin/sertifikat/add', $data);
    }

    public function addSertifikatPost()
    {
        $validationRules = [

            'pt_id' => 'required',
            'file_sertifikat' => 'required',
        ];

        $validationMessages = [
            'pt_id' => ['required' => 'Kolom Perguruan Tinggi Harus diisi'],

            'file_sertifikat' => [
                'required' => 'Kolom file sertifikat Harus diisi',
            ],
        ];

        $validation = $this->validate($validationRules, $validationMessages);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $data = [
            'id' => Uuid::uuid4()->toString(),
            'pt_id' => $this->request->getPost('pt_id'),
            'file_sertifikat' => $this->request->getPost('file_sertifikat'),

        ];

        $this->sertifikatModel->insert($data);
        session()->setFlashdata('primary', 'Data berhasil disimpan.');
        return redirect()->to('/admin/sertifikat');
    }

    public function editSertifikat($id)
    {
        $sertifikat = $this->sertifikatModel->find($id);
        if (!$sertifikat) {
            throw new \RuntimeException('Data sertifikat tidak ditemukan');
        }

        $data = [
            'sertifikat' => $sertifikat,
            'pt' => $this->ptModel->getAllPt(),
            'errors' => session('errors'), // Add validation errors to data
        ];
        // dd($data);

        return view('konten/admin/sertifikat/edit', $data);
    }
    public function editSertifikatPost($id)
    {

        $validationRules = [

            'pt_id' => 'required',
            'file_sertifikat' => 'required',
        ];

        $validationMessages = [
            'pt_id' => ['required' => 'Kolom Perguruan Tinggi Harus diisi'],

            'file_sertifikat' => [
                'required' => 'Kolom file sertifikat Harus diisi',
            ],
        ];

        $validation = $this->validate($validationRules, $validationMessages);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $data = [
            'pt_id' => $this->request->getPost('pt_id'),
            'file_sertifikat' => $this->request->getPost('file_sertifikat'),

        ];
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
