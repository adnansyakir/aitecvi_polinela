<?php

namespace App\Controllers;


use App\Models\Pendamping\FinalisasiModel;
use App\Models\Admin\PtModel;
use Ramsey\Uuid\Uuid;

class AdminFinalisasi extends BaseController
{
   
    protected $finalisasiModel;
    protected $PtModel;
    public function __construct()
    {$this->session = \Config\Services::session();
        
        $this->finalisasiModel = new FinalisasiModel();
        $this->PtModel = new PtModel();
       
    }
    public function finalisasi()
    {
        $data = [
            'finalisasi' =>$this->finalisasiModel->getAllfinalisasi(),
        ];
        
        echo view('konten/admin/finalisasi/index', $data);
    }

    public function addFinalisasi()
{
    $proposalModel = new \App\Models\Pendamping\ProposalModel();
    $proposalData = $proposalModel->findAll();

    $data = [
        'finalisasi' => $this->finalisasiModel->getAllfinalisasi(),
        'pt' => $this->PtModel->getAllPt(),
    ];
    return view('konten/admin/finalisasi/add', $data);
}


public function addFinalisasiPost()
{
    $data = $this->request->getPost();

    // Validation rules
    $validationRules = [
        'surat_tugas' =>  'max_size[surat_tugas,5120]|ext_in[surat_tugas,pdf,doc,docx,png]',
        'invoice' => 'max_size[invoice,5120]|ext_in[invoice,pdf,doc,docx,png]',
        'bukti_transfer' => 'max_size[bukti_transfer,5120]|ext_in[bukti_transfer,pdf,doc,docx,png]',
    ];

    $validationMessages = [
        'surat_tugas' => [
            'max_size' => 'Ukuran Surat Tugas tidak boleh lebih dari 5.120 KB',
            'ext_in' => 'Format Surat Tugas harus PDF, DOC, DOCX, PNG',
        ],
        'invoice' => [
            'max_size' => 'Ukuran file invoice tidak boleh lebih dari 5120 KB',
            'ext_in' => 'Format file invoice harus PDF, DOC, DOCX, PNG',
        ],
        'bukti_transfer' => [
            'max_size' => 'Ukuran bukti transfer tidak boleh lebih dari 5.120 KB',
            'ext_in' => 'Format bukti transfer harus PDF, DOC, DOCX, PNG',
        ],
    ];

    $validation = $this->validate($validationRules, $validationMessages);
    if (!$validation) {
        $errors = \Config\Services::validation()->getErrors();
        return redirect()->back()->withInput()->with('errors', $errors);
    }

    // Handle file uploads
    $suratTugas = $this->request->getFile('surat_tugas');
    if ($suratTugas && $suratTugas->isValid() && !$suratTugas->hasMoved()) {
        $namasuratTugas = $suratTugas->getRandomName();
        $suratTugas->move(FCPATH . '/uploads/surat_tugas', $namasuratTugas);
        $data['surat_tugas'] = $namasuratTugas;
    }

    $Invoice = $this->request->getFile('invoice');
    if ($Invoice && $Invoice->isValid() && !$Invoice->hasMoved()) {
        $namaInvoice = $Invoice->getRandomName();
        $Invoice->move(FCPATH . '/uploads/invoice', $namaInvoice);
        $data['invoice'] = $namaInvoice;
    }

    $buktiTransfer = $this->request->getFile('bukti_transfer');
    if ($buktiTransfer && $buktiTransfer->isValid() && !$buktiTransfer->hasMoved()) {
        $namabuktiTransfer = $buktiTransfer->getRandomName();
        $buktiTransfer->move(FCPATH . '/uploads/bukti_transfer', $namabuktiTransfer);
        $data['bukti_transfer'] = $namabuktiTransfer;
    }

    // Tambahkan nilai keterangan
    $data['keterangan'] = 2;

    // Simpan data ke database
    $this->finalisasiModel->insertData($data);
    session()->setFlashdata('primary', 'Data berhasil disimpan.');
    return redirect()->to('admin/finalisasi');
}



    public function editFinalisasi($id)
    {
        $proposalModel = new \App\Models\admin\ProposalModel();
        $proposalData = $proposalModel->findAll();
    
        $data = [
            'finalisasi' => $this->finalisasiModel->getPt($id),
            'pt' => $this->PtModel->getAllPt(),
        ];
        return view('konten/admin/finalisasi/edit', $data);
    }
    



    public function editFinalisasiPost($id)
{
    $data = $this->request->getPost();

    // Validation rules
    $validationRules = [
        'surat_tugas' =>  'max_size[surat_tugas,5120]|ext_in[surat_tugas,pdf,doc,docx,png]',
        'invoice' => 'max_size[invoice,5120]|ext_in[invoice,pdf,doc,docx,png]',
        'bukti_transfer' => 'max_size[bukti_transfer,5120]|ext_in[bukti_transfer,pdf,doc,docx,png]',
    ];

    $validationMessages = [
        'surat_tugas' => [
            'max_size' => 'Ukuran Surat Tugas tidak boleh lebih dari 5.120 KB',
            'ext_in' => 'Format Surat Tugas harus PDF, DOC, DOCX, PNG',
        ],
        'invoice' => [
            'max_size' => 'Ukuran file invoice tidak boleh lebih dari 5120 KB',
            'ext_in' => 'Format file invoice harus PDF, DOC, DOCX, PNG',
        ],
        'bukti_transfer' => [
            'max_size' => 'Ukuran bukti transfer tidak boleh lebih dari 5.120 KB',
            'ext_in' => 'Format bukti transfer harus PDF, DOC, DOCX, PNG',
        ],
    ];

    $validation = $this->validate($validationRules, $validationMessages);
    if (!$validation) {
        $errors = \Config\Services::validation()->getErrors();
        return redirect()->back()->withInput()->with('errors', $errors);
    }

    // Handle file uploads
    $suratTugas = $this->request->getFile('surat_tugas');
    if ($suratTugas && $suratTugas->isValid() && !$suratTugas->hasMoved()) {
        $namasuratTugas = $suratTugas->getRandomName();
        $suratTugas->move(FCPATH . '/uploads/surat_tugas', $namasuratTugas);
        $data['surat_tugas'] = $namasuratTugas;
    }

    $Invoice = $this->request->getFile('invoice');
    if ($Invoice && $Invoice->isValid() && !$Invoice->hasMoved()) {
        $namaInvoice = $Invoice->getRandomName();
        $Invoice->move(FCPATH . '/uploads/invoice', $namaInvoice);
        $data['invoice'] = $namaInvoice;
    }

    $buktiTransfer = $this->request->getFile('bukti_transfer');
    if ($buktiTransfer && $buktiTransfer->isValid() && !$buktiTransfer->hasMoved()) {
        $namabuktiTransfer = $buktiTransfer->getRandomName();
        $buktiTransfer->move(FCPATH . '/uploads/bukti_transfer', $namabuktiTransfer);
        $data['bukti_transfer'] = $namabuktiTransfer;
    }

    // Tambahkan nilai keterangan
    $data['keterangan'] = 2;

    // Update the record with the new data
    $this->finalisasiModel->updateData($id, $data);
    session()->setFlashdata('primary', 'Data berhasil diupdate.');
    return redirect()->to('/admin/finalisasi');
}
public function updateStatus($keterangan, $id)
{
    $data = [
        'keterangan' => $keterangan
    ];

    if ($this->finalisasiModel->update($id, $data)) {
        $user = $this->finalisasiModel->find($id);
        $userEmail = $user['id'];

        $finalisasiModel = $this->finalisasiModel->where('id', $userEmail)->first();

        if ($finalisasiModel) {
            $finalisasiModelData = ['keterangan' => $keterangan];
            $this->finalisasiModel->update($finalisasiModel['id'], $finalisasiModelData);
        }

        if ($keterangan == 1) {
            $this->session->setFlashdata('success', 'Pengguna berhasil diaktifkan.');
        } else {
            $this->session->setFlashdata('success', 'Pengguna berhasil dinonaktifkan.');
        }
    } else {
        $this->session->setFlashdata('error', 'Gagal memperbarui keterangan pengguna.');
    }

    return redirect()->to('/admin/finalisasi');
}


    public function deleteFinalisasi($id)
    {
        // Check if the record exists
        $pt = $this->finalisasiModel->find($id);
        if ($pt) {
            // Delete the record
            $this->finalisasiModel->deleteById($id);
            return redirect()->to('/admin/finalisasi')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/admin/finalisasi')->with('danger', 'Record not found');
        }
    }
}
