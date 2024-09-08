<?php

namespace App\Controllers;


use App\Models\Pendamping\FinalisasiModel;
use Ramsey\Uuid\Uuid;

class PendampingFinalisasi extends BaseController
{
   
    protected $finalisasiModel;
    public function __construct()
    {
        
        $this->finalisasiModel = new FinalisasiModel();
       
    }
    public function finalisasi()
    {
        $data = [
            'finalisasi' =>$this->finalisasiModel->getAllfinalisasi(),
        ];
        
        echo view('konten/pendamping/finalisasi/index', $data);
    }

    public function addFinalisasi()
    {
        $data = [
            'finalisasi' =>$this->finalisasiModel->getAllfinalisasi(),
        ];
        return view('konten/pendamping/finalisasi/add', $data);
    }

    public function addFinalisasiPost()
    {
        $validationRules = [
            'surat_tugas' =>  'max_size[surat_tugas,5120]|ext_in[surat_tugas,pdf,doc,docx, png]',
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
            // dd($errors);
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

        $this->finalisasiModel->insertData($data);
        session()->setFlashdata('primary', 'Data berhasil disimpan.');
        return redirect()->to('pendamping/finalisasi');
    }



    public function editFinalisasi($id)
    {
        $data = [
            'finalisasi' => $this->finalisasiModel->getPt($id),
        ];
        return view('konten/pendamping/finalisasi/edit', $data);
    }

    public function editFinalisasiPost($id)
    {
        $validationRules = [
            'surat_tugas' => 'max_size[surat_tugas,5120]|ext_in[surat_tugas,pdf,doc,docx,png]',
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
        $data = [];
        $suratTugas = $this->request->getFile('surat_tugas');
        if ($suratTugas && $suratTugas->isValid() && !$suratTugas->hasMoved()) {
            $data['surat_tugas'] = $suratTugas->getRandomName();
            $suratTugas->move(FCPATH . '/uploads/surat_tugas', $data['surat_tugas']);
        }

        $invoice = $this->request->getFile('invoice');
        if ($invoice && $invoice->isValid() && !$invoice->hasMoved()) {
            $data['invoice'] = $invoice->getRandomName();
            $invoice->move(FCPATH . '/uploads/invoice', $data['invoice']);
        }

        $buktiTransfer = $this->request->getFile('bukti_transfer');
        if ($buktiTransfer && $buktiTransfer->isValid() && !$buktiTransfer->hasMoved()) {
            $data['bukti_transfer'] = $buktiTransfer->getRandomName();
            $buktiTransfer->move(FCPATH . '/uploads/bukti_transfer', $data['bukti_transfer']);
        }

        $this->finalisasiModel->updateData($id, $data);
        session()->setFlashdata('primary', 'Data berhasil diupdate.');
        return redirect()->to('/pendamping/finalisasi');
    }


    public function deleteFinalisasi($id)
    {
        // Check if the record exists
        $pt = $this->finalisasiModel->find($id);
        if ($pt) {
            // Delete the record
            $this->finalisasiModel->deleteById($id);
            return redirect()->to('/pendamping/finalisasi')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/pendamping/finalisasi')->with('danger', 'Record not found');
        }
    }
}
