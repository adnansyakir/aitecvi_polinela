<?php

namespace App\Controllers;

use App\Models\Admin\JuriModel;
use App\Models\Admin\PtModel;
use App\Models\Admin\CabangLombaModel;
use Ramsey\Uuid\Uuid;

class JuriJuri extends BaseController
{
    protected $juriModel;
    protected $ptModel;
    protected $cabanglombaModel;

    public function __construct()
    {
        $this->ptModel = new PtModel();
        $this->cabanglombaModel = new CabangLombaModel();
        $this->juriModel = new JuriModel();
    }

    public function index()
    {
        $data = [
            
            'juri' => $this->juriModel->JuribyPt()
        ];

        echo view('konten/juri/juri/index', $data);
    }

    // public function addJuri()
    // {
    //     $data = [
    //         'juri' => $this->juriModel->getAllJuri(),
    //         'cabang_perlombaan' => $this->cabanglombaModel->getAllLomba(),
    //         'pt' => $this->ptModel->getAllPt(),
    //     ];
    //     return view('konten/juri/juri/add', $data);
    // }

    // public function addJuriPost()
    // {
    //     $validationRules = [
    //         'kode_juri' => 'required',
    //         'nama_juri' => 'required',
    //         'pt_id' => 'required',
    //         'cabang_perlombaan_id' => 'required',
    //         'keterangan' => 'required',
    //     ];

    //     $validationMessages = [
    //         'kode_juri' => [
    //             'required' => 'Kolom Kode Juri harus diisi',
    //         ],
    //         'nama_juri' => [
    //             'required' => 'Kolom Nama Juri harus diisi',
    //         ],
    //         'pt_id' => [
    //             'required' => 'Kolom Perguruan Tinggi harus diisi',
    //         ],
    //         'cabang_perlombaan_id' => [
    //             'required' => 'Kolom Nama Perlombaan harus diisi',
    //         ],
    //         'keterangan' => [
    //             'required' => 'Kolom Keterangan harus diisi',
    //         ],
    //     ];

    //     if (!$this->validate($validationRules, $validationMessages)) {
    //         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    //     }

    //     $data = [
    //         'id' => Uuid::uuid4()->toString(),
    //         'nama_juri' => $this->request->getPost('nama_juri'),
    //         'kode_juri' => $this->request->getPost('kode_juri'),
    //         'pt_id' => $this->request->getPost('pt_id'),
    //         'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
    //         'keterangan' => $this->request->getPost('keterangan'),
    //     ];

    //     $this->juriModel->insert($data);
    //     session()->setFlashdata('primary', 'Data berhasil disimpan.');
    //     return redirect()->to('/juri/juri');
    // }

    // public function editJuri($id)
    // {
    //     $juri = $this->juriModel->find($id);
    //     if (!$juri) {
    //         throw new \RuntimeException('Data juri tidak ditemukan');
    //     }

    //     $data = [
    //         'juri' => $juri,
    //         'cabang_perlombaan' => $this->cabanglombaModel->getAllLomba(),
    //         'pt' => $this->ptModel->getAllPt(),
    //     ];

    //     return view('konten/juri/juri/edit', $data);
    // }

    // public function editJuriPost($id)
    // {
    //     $juri = $this->juriModel->find($id);
    //     if (!$juri) {
    //         throw new \RuntimeException('Data juri tidak ditemukan');
    //     }

    //     $validationRules = [
    //         'kode_juri' => 'required',
    //         'nama_juri' => 'required',
    //         'pt_id' => 'required',
    //         'cabang_perlombaan_id' => 'required',
    //         'keterangan' => 'required',
    //     ];

    //     $validationMessages = [
    //         'kode_juri' => [
    //             'required' => 'Kolom Kode Juri harus diisi',
    //         ],
    //         'nama_juri' => [
    //             'required' => 'Kolom Nama Juri harus diisi',
    //         ],
    //         'pt_id' => [
    //             'required' => 'Kolom Perguruan Tinggi harus diisi',
    //         ],
    //         'cabang_perlombaan_id' => [
    //             'required' => 'Kolom Nama Perlombaan harus diisi',
    //         ],
    //         'keterangan' => [
    //             'required' => 'Kolom Keterangan harus diisi',
    //         ],
    //     ];

    //     if (!$this->validate($validationRules, $validationMessages)) {
    //         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    //     }

    //     $data = [
    //         'id' => $id,
    //         'nama_juri' => $this->request->getPost('nama_juri'),        
    //         'pt_id' => $this->request->getPost('pt_id'),
    //         'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
    //         'keterangan' => $this->request->getPost('keterangan'),
    //     ];

    //     $this->juriModel->update($id, $data);
    //     session()->setFlashdata('primary', 'Data berhasil diupdate.');
    //     return redirect()->to('/juri/juri');
    // }
    // public function deleteJuri($id)
    // {
    //     // Check if the record exists
    //     $juri = $this->juriModel->find($id);
    //     if ($juri) {
    //         // Delete the record
    //         $this->juriModel->deleteById($id);
    //         return redirect()->to('/juri/juri')->with('danger', 'deleted successfully');
    //     } else {
    //         return redirect()->to('/juri/juri')->with('status', 'Record not found');
    //     }
    // }
}
