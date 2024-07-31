<?php
namespace App\Controllers;

use App\Models\Koordinator\KoordinatorModel;

class AdminKoordinator extends BaseController
{
    protected $koordinatorModel;

    public function __construct()
    {
        $this->cekPeran(['Admin']);
        $this->koordinatorModel = new KoordinatorModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'koordinator' => $this->koordinatorModel->findAll(),
        ];
        echo view('konten/admin/koordinator/index', $data);
    }

    public function add()
    {
        echo view('konten/admin/koordinator/add');
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
                'kode_koordinator' => 'required',
                'nama_koordinator' => 'required',
            ])) {
            $this->koordinatorModel->save([
                'kode_koordinator' => $this->request->getPost('kode_koordinator'),
                'nama_koordinator' => $this->request->getPost('nama_koordinator'),
            ]);

            return redirect()->to('/admin/koordinator')->with('success', 'Koordinator berhasil ditambahkan.');
        }

        return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
    }

    public function edit($id)
    {
        $data = [
            'koordinator' => $this->koordinatorModel->find($id),
        ];
        echo view('konten/admin/koordinator/edit', $data);
    }

    public function update($id)
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
                'kode_koordinator' => 'required',
                'nama_koordinator' => 'required',
            ])) {
            $this->koordinatorModel->update($id, [
                'kode_koordinator' => $this->request->getPost('kode_koordinator'),
                'nama_koordinator' => $this->request->getPost('nama_koordinator'),
            ]);

            return redirect()->to('/admin/koordinator')->with('success', 'Koordinator berhasil diubah.');
        }

        return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
    }

    public function delete($id)
    {
        $this->koordinatorModel->delete($id);
        return redirect()->to('/admin/koordinator')->with('danger', 'Koordinator berhasil dihapus.');
    }
}

