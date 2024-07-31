<?php

namespace App\Controllers;

use App\Models\Admin\PendampingModel;
use App\Models\Admin\PtModel;
use App\Models\Admin\CabangLombaModel;
use Ramsey\Uuid\Uuid;

class AdminPendamping extends BaseController
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

        echo view('konten/admin/pendamping/index', $data);
    }

    public function addPendamping()
    {
        $data = [
            'pendamping' => $this->pendampingModel->getAllPendamping(),

            'pt' => $this->ptModel->getAllPt(),
        ];
        return view('konten/admin/pendamping/add', $data);
    }

    public function addPendampingPost()
    {
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
            'id' => Uuid::uuid4()->toString(),
            'nama_pendamping' => $this->request->getPost('nama_pendamping'),
            'kode_pendamping' => $this->request->getPost('kode_pendamping'),
            'pt_id' => $this->request->getPost('pt_id'),

            
        ];

        $this->pendampingModel->insert($data);
        session()->setFlashdata('primary', 'Data berhasil disimpan.');
        return redirect()->to('/admin/pendamping');
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

        return view('konten/admin/pendamping/edit', $data);
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
        return redirect()->to('/admin/pendamping');
    }
    public function deletePendamping($id)
    {
        // Check if the record exists
        $pendamping = $this->pendampingModel->find($id);
        if ($pendamping) {
            // Delete the record
            $this->pendampingModel->deleteById($id);
            return redirect()->to('/admin/pendamping')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/admin/pendamping')->with('danger', 'Record not found');
        }
    }
}
